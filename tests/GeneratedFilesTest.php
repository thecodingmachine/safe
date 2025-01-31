<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Safe\Exceptions\DatetimeException;

final class GeneratedFilesTest extends TestCase
{
    public function testRequireModules(): void
    {
        self::expectNotToPerformAssertions();

        $files = \glob(__DIR__.'/../generated/*.php');
        if ($files === false) {
            throw new \RuntimeException('Failed to require the generated file');
        }

        foreach ($files as $file) {
            require_once($file);
        }
    }

    public function testRequireExceptions(): void
    {
        self::expectNotToPerformAssertions();

        $files = \glob(__DIR__.'/../generated/Exceptions/*.php');
        if ($files === false) {
            throw new \RuntimeException('Failed to require the generated exception file');
        }
        foreach ($files as $file) {
            require_once($file);
        }
    }

    public function testRequireExceptionInterface(): void
    {
        self::expectNotToPerformAssertions();

        require_once __DIR__.'/../lib/Exceptions/SafeExceptionInterface.php';
    }

    public function testPregMatch(): void
    {
        $url = 'https://open.spotify.com/track/0nCqpKBrvDchO1BIvt7DTR?si=iLUKDfkLSy-IpnLA7qImnw';
        $spotifyRegex = "/https?:\/\/(?:embed\.|open\.)(?:spotify\.com\/)(?:track\/|\?uri=spotify:track:)((\w|-){22})/";
        \Safe\preg_match($spotifyRegex, $url, $matches);
        \preg_match($spotifyRegex, $url, $originalMatches);
        $this->assertSame($originalMatches, $matches);
    }

    public function testObjects(): void
    {
        $xmlStr = <<<XML
<?xml version='1.0' standalone='yes'?>
<movies>
 <movie>
  <title>PHP: Behind the Parser</title>
 </movie>
</movies>
XML;

        $movies = \Safe\simplexml_load_string($xmlStr);

        $this->assertInstanceOf(SimpleXMLElement::class, $movies);

        $domImplementation = new \DOMImplementation();
        $doc = $domImplementation->createDocument(null, 'foo');

        $xmlElem = \Safe\simplexml_import_dom($doc);
        $this->assertInstanceOf(SimpleXMLElement::class, $xmlElem);
    }

    /**
     * Tests that the limit parameter is nullable.
     * See https://github.com/thecodingmachine/safe/issues/56
     */
    public function testPregSplit(): void
    {
        $keywords = \Safe\preg_split("/[\s,]+/", "hypertext language, programming", null);
        $this->assertSame(['hypertext', 'language', 'programming'], $keywords);
    }


    /**
     * Tests that parameters with "time()" default value are correctly handled.
     */
    public function testStrtotime(): void
    {
        $this->assertSame(\strtotime('+1 day'), \Safe\strtotime('+1 day'));

        set_error_handler(function (): void {
        });
        try {
            $this->expectException(DatetimeException::class);
            \Safe\strtotime('nonsense');
        } finally {
            restore_error_handler();
        }
    }

    /**
     * Tests that parameters signature can be not passed. See https://github.com/thecodingmachine/safe/issues/86
     */
    public function testOpenSslSign(): void
    {
        \openssl_sign('foo', $signature, file_get_contents(__DIR__ . '/fixtures/id_rsa'));
        \Safe\openssl_sign('foo', $signatureSafe, file_get_contents(__DIR__ . '/fixtures/id_rsa'));

        $this->assertSame($signature, $signatureSafe);
    }

    public function testOpenSslEncrypt(): void
    {
        $result = \openssl_encrypt(
            'test',
            'aes-256-cbc',
            pack('H*', 'a2e8ccd0e7985cc0b6213a55815a1034afc252980e970ca90e5202689f9473b0'),
            \OPENSSL_RAW_DATA,
            pack('H*', '123ce954203b7caaaa9da67f59839456')
        );

        $resultSafe = \Safe\openssl_encrypt(
            'test',
            'aes-256-cbc',
            pack('H*', 'a2e8ccd0e7985cc0b6213a55815a1034afc252980e970ca90e5202689f9473b0'),
            \OPENSSL_RAW_DATA,
            pack('H*', '123ce954203b7caaaa9da67f59839456')
        );

        $this->assertSame($result, $resultSafe);
    }
}

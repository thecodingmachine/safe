<?php

namespace Safe;

use PHPUnit\Framework\TestCase;
use function restore_error_handler;
use Safe\Exceptions\StringsException;
use SimpleXMLElement;

/**
 * This test must be called AFTER generation of files has occurred
 */
class GeneratedFilesTest extends TestCase
{
    public function testSprintf()
    {
        require_once __DIR__ . '/../../generated/strings.php';
        require_once __DIR__ . '/../../lib/Exceptions/SafeExceptionInterface.php';
        require_once __DIR__ . '/../../lib/Exceptions/AbstractSafeException.php';
        require_once __DIR__ . '/../../generated/Exceptions/StringsException.php';

        $this->assertSame('foo', sprintf('foo'));
        $this->assertSame('foobar', sprintf('foo%s', 'bar'));
        $this->assertSame('foobarbaz', sprintf('foo%s%s', 'bar', 'baz'));

        set_error_handler(function () {
        });
        try {
            $this->expectException(StringsException::class);
            sprintf('foo%s%s', 'bar');
        } finally {
            restore_error_handler();
        }
    }

    public function testPregMatch()
    {
        require_once __DIR__ . '/../../generated/pcre.php';
        require_once __DIR__ . '/../../lib/Exceptions/SafeExceptionInterface.php';
        require_once __DIR__ . '/../../lib/Exceptions/AbstractSafeException.php';
        require_once __DIR__ . '/../../lib/Exceptions/PcreException.php';


        $url = 'https://open.spotify.com/track/0nCqpKBrvDchO1BIvt7DTR?si=iLUKDfkLSy-IpnLA7qImnw';
        $spotifyRegex = "/https?:\/\/(?:embed\.|open\.)(?:spotify\.com\/)(?:track\/|\?uri=spotify:track:)((\w|-){22})/";
        preg_match($spotifyRegex, $url, $matches);
        \preg_match($spotifyRegex, $url, $originalMatches);
        $this->assertSame($originalMatches, $matches);
    }

    public function testObjects()
    {
        require_once __DIR__ . '/../../generated/simplexml.php';
        require_once __DIR__ . '/../../lib/Exceptions/SafeExceptionInterface.php';
        require_once __DIR__ . '/../../lib/Exceptions/AbstractSafeException.php';
        require_once __DIR__ . '/../../generated/Exceptions/SimplexmlException.php';

        $xmlStr = <<<XML
<?xml version='1.0' standalone='yes'?>
<movies>
 <movie>
  <title>PHP: Behind the Parser</title>
 </movie>
</movies>
XML;

        $movies = simplexml_load_string($xmlStr);

        $this->assertInstanceOf(SimpleXMLElement::class, $movies);

        $domImplementation = new \DOMImplementation();
        $doc = $domImplementation->createDocument(null, 'foo');

        $xmlElem = simplexml_import_dom($doc);
        $this->assertInstanceOf(SimpleXMLElement::class, $xmlElem);
    }

    /**
     * Tests that the limit parameter is nullable.
     * See https://github.com/thecodingmachine/safe/issues/56
     */
    public function testPregSplit()
    {
        require_once __DIR__ . '/../../generated/pcre.php';
        require_once __DIR__ . '/../../lib/Exceptions/SafeExceptionInterface.php';
        require_once __DIR__ . '/../../lib/Exceptions/AbstractSafeException.php';
        require_once __DIR__ . '/../../lib/Exceptions/PcreException.php';

        $keywords = preg_split("/[\s,]+/", "hypertext language, programming", null);
        $this->assertSame(['hypertext', 'language', 'programming'], $keywords);
    }


    /**
     * Tests that parameters with "time()" default value are correctly handled.
     */
    public function testStrtotime()
    {
        require_once __DIR__ . '/../../generated/datetime.php';
        require_once __DIR__ . '/../../lib/Exceptions/SafeExceptionInterface.php';
        require_once __DIR__ . '/../../lib/Exceptions/AbstractSafeException.php';
        require_once __DIR__ . '/../../generated/Exceptions/DatetimeException.php';

        $this->assertSame(\strtotime('+1 day'), strtotime('+1 day'));
    }

    /**
     * Tests that parameters signature can be not passed. See https://github.com/thecodingmachine/safe/issues/86
     */
    public function testOpenSslSign()
    {
        require_once __DIR__ . '/../../generated/openssl.php';
        require_once __DIR__ . '/../../lib/Exceptions/SafeExceptionInterface.php';
        require_once __DIR__ . '/../../lib/Exceptions/AbstractSafeException.php';
        require_once __DIR__ . '/../../generated/Exceptions/OpensslException.php';

        \openssl_sign('foo', $signature, file_get_contents(__DIR__ . '/fixtures/id_rsa'));
        openssl_sign('foo', $signatureSafe, file_get_contents(__DIR__ . '/fixtures/id_rsa'));

        $this->assertSame($signature, $signatureSafe);
    }

    public function testOpenSslEncrypt()
    {
        $result = \openssl_encrypt(
            'test',
            'aes-256-cbc',
            pack('H*', 'a2e8ccd0e7985cc0b6213a55815a1034afc252980e970ca90e5202689f9473b0'),
            \OPENSSL_RAW_DATA,
            pack('H*', '123ce954203b7caaaa9da67f59839456')
        );

        $resultSafe = openssl_encrypt(
            'test',
            'aes-256-cbc',
            pack('H*', 'a2e8ccd0e7985cc0b6213a55815a1034afc252980e970ca90e5202689f9473b0'),
            \OPENSSL_RAW_DATA,
            pack('H*', '123ce954203b7caaaa9da67f59839456')
        );

        $this->assertSame($result, $resultSafe);
    }
}

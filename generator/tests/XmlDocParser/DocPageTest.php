<?php

declare(strict_types=1);

namespace Safe\XmlDocParser;

use PHPUnit\Framework\TestCase;

class DocPageTest extends TestCase
{
    // take a documentation XML file path and return an ErrorType
    private function d2e(string $path): ErrorType
    {
        return (new DocPage(DocPage::findReferenceDir() . "/" . $path))->getErrorType();
    }

    public function testErrorTypeDetection(): void
    {
        // falsy
        $this->assertEquals($this->d2e('pcre/functions/preg-match.xml'), ErrorType::FALSY);
        $this->assertEquals($this->d2e('dir/functions/getcwd.xml'), ErrorType::FALSY);
        $this->assertEquals($this->d2e('datetime/datetime/createfromformat.xml'), ErrorType::FALSY);
        $this->assertEquals($this->d2e('filesystem/functions/filesize.xml'), ErrorType::FALSY);
        $this->assertEquals($this->d2e('network/functions/fsockopen.xml'), ErrorType::FALSY);
        $this->assertEquals($this->d2e('spl/functions/class-implements.xml'), ErrorType::FALSY);
        $this->assertEquals($this->d2e('url/functions/get-headers.xml'), ErrorType::FALSY);
        $this->assertEquals($this->d2e('zlib/functions/gzopen.xml'), ErrorType::FALSY);

        // nullsy
        $this->assertEquals($this->d2e('pcre/functions/preg-replace-callback-array.xml'), ErrorType::NULLSY);

        // empty
        $this->assertEquals($this->d2e('pgsql/functions/pg-host.xml'), ErrorType::EMPTY);

        // unknown
        $this->assertEquals($this->d2e('array/functions/array-replace.xml'), ErrorType::UNKNOWN);
    }
}

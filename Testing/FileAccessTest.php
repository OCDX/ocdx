<?php

include_once 'PHPUnit/phpunit-5.6.2.phar';
include_once '../Framework/FileAccess/FileAccess.php';

use PHPUnit\Framework\TestCase;
use FileAccess\FileAccess;

class FileAccessTest extends TestCase {

    public function testUpload() {
        $_FILES = array(
            'test' => array(
                'name' => 'FileAccessTestFile.txt',
                'type' => 'text/plain',
                'size' => 58,
                'tmp_name' => 'FileAccessTestFile.txt',
                'error' => 0
            )
        );

        $fileAccess = new FileAccess();
        $this->assertEquals($fileAccess->uploadFile($_FILES["test"]), true);
        unset($_FILES);
    }

    public function testGet() {
        $fileAccess = new FileAccess();
        $this->assertNotEquals($fileAccess->getFile("FileAccessTestFile.txt"), false);
    }

    public function testUploadEmptyFile(){
        $fileAccess = new FileAccess();
        $this->assertEquals($fileAccess->uploadFile(null), false);
    }

    public function testLargeFile()
    {
        $_FILES = array(
            'test' => array(
                'name' => 'FileAccessTestFile.txt',
                'type' => 'text/plain',
                'size' => 525588001,
                'tmp_name' => 'FileAccessTestFile.txt',
                'error' => 0
            )
        );

        $fileAccess = new FileAccess();
        $this->assertEquals($fileAccess->uploadFile($_FILES["test"]), false);
        unset($_FILES);
    }

}

<?php

class FileInfoTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->finfo = new FileInfo('/path/to/file.txt');
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testExceptionIsThrownWhenANonStringIsProvided()
    {
        $finfo = new FileInfo(423);
    }
    
    /**
     * @expectedException Exception
     */
    public function testExceptionIsThrownWhenFileDoesNotExist()
    {
        $finfo = new FileInfo('path/to/file.txt', true);
    }
    
    public function testGetDirectoryUsingClassMethod()
    {
        $this->assertEquals('/path/to', $this->finfo->getDirectory());
    }
    
    public function testGetBaseNameUsingClassMethod()
    {
        $this->assertEquals('file.txt', $this->finfo->getBaseName());
    }
    
    public function testGetExtensionUsingClassMethod()
    {
        $this->assertEquals('txt', $this->finfo->getExtension());
    }
    
    public function testGetFileNameUsingClassMethod()
    {
        $this->assertEquals('file', $this->finfo->getFileName());
    }
    
    public function testGetMimeTypeUsingClassMethod()
    {
        $this->assertEquals('text/plain', $this->finfo->getMimeType());
    }
    
    public function testGetClassPropertyWithMixedCaseInsideMagicGetMethod()
    {
        $this->assertEquals('text/plain', $this->finfo->mImETypE);
    }
    
    public function testGetDirectoryUsingMagicGetMethod()
    {
        $this->assertEquals('/path/to', $this->finfo->directory);
    }
    
    public function testGetBaseNameUsingMagicGetMethod()
    {
        $this->assertEquals('file.txt', $this->finfo->basename);
    }
    
    public function testGetExtensionUsingMagicGetMethod()
    {
        $this->assertEquals('txt', $this->finfo->extension);
    }
    
    public function testGetFileNameUsingMagicGetMethod()
    {
        $this->assertEquals('file', $this->finfo->filename);
    }
    
    public function testGetMimeTypeUsingMagicGetMethod()
    {
        $this->assertEquals('text/plain', $this->finfo->mimetype);
    }
    
    public function testReturnNullUsingMagicGetMethodIfPropertyNotDefined()
    {
        $this->assertNull($this->finfo->nonExistantProperty);
    }
}

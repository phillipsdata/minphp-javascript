<?php
namespace minphp\Javascript;

use \PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass \minphp\Javascript\Javascript
 */
class JavascriptTest extends PHPUnit_Framework_TestCase
{
    private $javascript;
    
    public function setUp()
    {
        $this->javascript = new Javascript();
    }
    
    /**
     * @covers ::__construct
     * @uses \minphp\Javascript\Javascript::setDefaultPath
     */
    public function testConstruct()
    {
        $this->assertInstanceOf('\minphp\Javascript\Javascript', new Javascript('path/to/js'));
    }
    
    /**
     * @covers ::setDefaultPath
     */
    public function testDefaultPath()
    {
        $new_path = 'new/path/';
        $this->assertNull($this->javascript->setDefaultPath($new_path));
        $this->assertEquals($new_path, $this->javascript->setDefaultPath($new_path));
    }
    
    /**
     * @covers ::setFile
     * @covers ::getFiles
     */
    public function testSetFile()
    {
        $this->assertInstanceOf(
            '\minphp\Javascript\Javascript',
            $this->javascript->setFile('something.js', 'head')
        );
        $this->assertNotEmpty($this->javascript->getFiles('head'));
    }
    
    /**
     * @covers ::setInline
     * @covers ::getInline
     */
    public function testSetInline()
    {
        $this->assertInstanceOf(
            '\minphp\Javascript\Javascript',
            $this->javascript->setInline('var a = [];')
        );
        $this->assertNotEmpty($this->javascript->getInline());
    }
    
    /**
     * @covers ::unsetFiles
     * @uses \minphp\Javascript\Javascript::setFile
     * @uses \minphp\Javascript\Javascript::getFiles
     */
    public function testUnsetFiles()
    {
        $this->javascript->setFile('something.js', 'head');
        $this->assertNotEmpty($this->javascript->getFiles('head'));
        $this->assertInstanceOf('\minphp\Javascript\Javascript', $this->javascript->unsetFiles());
        $this->assertEmpty($this->javascript->getFiles('head'));
    }
    
    /**
     * @covers ::unsetInline
     * @uses \minphp\Javascript\Javascript::setInline
     * @uses \minphp\Javascript\Javascript::getInline
     */
    public function testUnsetInline()
    {
        $this->javascript->setInline('var a = [];');
        $this->assertNotEmpty($this->javascript->getInline());
        $this->assertInstanceOf('\minphp\Javascript\Javascript', $this->javascript->unsetInline());
        $this->assertEmpty($this->javascript->getInline());
    }
}

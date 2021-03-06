<?php

namespace PEAR\Calendar\Test;

use PEAR\Calendar\ValidationError;
use PHPUnit_Framework_TestCase;

class ValidatorErrorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \PEAR\Calendar\ValidationError
     */
    var $vError;

    function setUp()
    {
        $this->vError = new ValidationError('foo', 20, 'bar');
    }

    function testGetUnit()
    {
        $this->assertEquals($this->vError->getUnit(), 'foo');
    }

    function testGetValue()
    {
        $this->assertEquals($this->vError->getValue(), 20);
    }

    function testGetMessage()
    {
        $this->assertEquals($this->vError->getMessage(), 'bar');
    }

    function testToString()
    {
        $this->assertEquals($this->vError->toString(), 'foo = 20 [bar]');
    }
}

<?php

namespace Pear\Calendar\Test;

use Pear\Calendar\Minute;
use Pear\Calendar\Second;
use PHPUnit_Framework_TestCase;

class MinuteTest extends PHPUnit_Framework_TestCase
{
    function setUp() {
        $this->cal = new Minute(2003,10,25,13,32);
    }
    function testPrevDay_Array () {
        $this->assertEquals(
            array(
                'year'   => 2003,
                'month'  => 10,
                'day'    => 24,
                'hour'   => 0,
                'minute' => 0,
                'second' => 0),
            $this->cal->prevDay('array'));
    }
    function testPrevSecond () {
        $this->assertEquals(59,$this->cal->prevSecond());
    }
    function testThisSecond () {
        $this->assertEquals(0,$this->cal->thisSecond());
    }
    function testThisSecond_Timestamp () {
        $this->assertEquals($this->cal->cE->dateToStamp(
                2003, 10, 25, 13, 32, 0),
            $this->cal->thisSecond('timestamp'));
    }
    function testNextSecond () {
        $this->assertEquals(1,$this->cal->nextSecond());
    }
    function testNextSecond_Timestamp () {
        $this->assertEquals($this->cal->cE->dateToStamp(
                2003, 10, 25, 13, 32, 1),
            $this->cal->nextSecond('timestamp'));
    }
    function testGetTimeStamp() {
        $stamp = mktime(13,32,0,10,25,2003);
        $this->assertEquals($stamp,$this->cal->getTimeStamp());
    }
    function testSize() {
        $this->cal->build();
        $this->assertEquals(60,$this->cal->size());
    }
    function testFetch() {
        $this->cal->build();
        $i=0;
        while ( $Child = $this->cal->fetch() ) {
            $i++;
        }
        $this->assertEquals(60,$i);
    }
    function testFetchAll() {
        $this->cal->build();
        $children = array();
        $i = 0;
        while ( $Child = $this->cal->fetch() ) {
            $children[$i]=$Child;
            $i++;
        }
        $this->assertEquals($children,$this->cal->fetchAll());
    }
    function testSelection() {
        $selection = array(new Second(2003,10,25,13,32,43));
        $this->cal->build($selection);
        $i = 0;
        while ( $Child = $this->cal->fetch() ) {
            if ( $i == 43 )
                break;
            $i++;
        }
        $this->assertTrue($Child->isSelected());
    }
}

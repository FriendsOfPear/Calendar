<?php

namespace PEAR\Calendar\Test;

use PEAR\Calendar\Util\Uri;
use PHPUnit_Framework_TestCase;

class UtilUriTest extends PHPUnit_Framework_TestCase
{
    var $MockCal;

    function setUp()
    {
        $mockEngine = $this->getMockBuilder('PEAR\Calendar\Engine\CalendarEngineInterface')
            ->getMock();
        $this->MockCal = $this->getMockBuilder('\PEAR\Calendar\Day')
            ->disableOriginalConstructor()
            ->getMock();
        $this->MockCal->method('getEngine')->willReturn($mockEngine);
    }

    function testFragments()
    {
        $Uri = new Uri('y', 'm', 'd', 'h', 'm', 's');
        $Uri->setFragments('year', 'month', 'day', 'hour', 'minute', 'second');
        $this->assertEquals(
            'year=&amp;month=&amp;day=&amp;hour=&amp;minute=&amp;second=',
            $Uri->this($this->MockCal, 'second')
        );
    }

    function testScalarFragments()
    {
        $Uri = new Uri('year', 'month', 'day', 'hour', 'minute', 'second');
        $Uri->scalar = true;
        $this->assertEquals(
            '&amp;&amp;&amp;&amp;&amp;',
            $Uri->this($this->MockCal, 'second')
        );
    }

    function testSetSeperator()
    {
        $Uri = new Uri('year', 'month', 'day', 'hour', 'minute', 'second');
        $Uri->separator = '/';
        $this->assertEquals(
            'year=/month=/day=/hour=/minute=/second=',
            $Uri->this($this->MockCal, 'second')
        );
    }

}

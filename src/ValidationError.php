<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

/**
 * Contains the Calendar_Validator class
 *
 * PHP versions 4 and 5
 *
 * LICENSE: Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 * 1. Redistributions of source code must retain the above copyright
 *    notice, this list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 * 3. The name of the author may not be used to endorse or promote products
 *    derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE AUTHOR "AS IS" AND ANY EXPRESS OR IMPLIED
 * WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
 * IN NO EVENT SHALL THE FREEBSD PROJECT OR CONTRIBUTORS BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF
 * THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category  Date and Time
 * @package   Calendar
 * @author    Harry Fuecks <hfuecks@phppatterns.com>
 * @copyright 2003-2007 Harry Fuecks
 * @license   http://www.debian.org/misc/bsd.license  BSD License (3 Clause)
 * @version   CVS: $Id$
 * @link      http://pear.php.net/package/Calendar
 */
namespace PEAR\Calendar;

/**
 * Validation Error Messages
 */
if (!defined('CALENDAR_VALUE_TOOSMALL')) {
    define('CALENDAR_VALUE_TOOSMALL', 'Too small: min = ');
}
if (!defined('CALENDAR_VALUE_TOOLARGE')) {
    define('CALENDAR_VALUE_TOOLARGE', 'Too large: max = ');
}

/**
 * For Validation Error messages
 *
 * @category  Date and Time
 * @package   Calendar
 * @author    Harry Fuecks <hfuecks@phppatterns.com>
 * @copyright 2003-2007 Harry Fuecks
 * @license   http://www.debian.org/misc/bsd.license  BSD License (3 Clause)
 * @link      http://pear.php.net/package/Calendar
 * @see       Calendar::fetch()
 * @access    public
 */
class ValidationError
{
    /**
     * Date unit (e.g. month,hour,second) which failed test
     * @var string
     * @access private
     */
    var $unit;

    /**
     * Value of unit which failed test
     * @var int
     * @access private
     */
    var $value;

    /**
     * Validation error message
     * @var string
     * @access private
     */
    var $message;

    /**
     * Constructs Calendar_Validation_Error
     *
     * @param string $unit    Date unit (e.g. month,hour,second)
     * @param int    $value   Value of unit which failed test
     * @param string $message Validation error message
     *
     * @access protected
     */
    function __construct($unit, $value, $message)
    {
        $this->unit    = $unit;
        $this->value   = $value;
        $this->message = $message;
    }

    /**
     * Returns the Date unit
     *
     * @return string
     * @access public
     */
    function getUnit()
    {
        return $this->unit;
    }

    /**
     * Returns the value of the unit
     *
     * @return int
     * @access public
     */
    function getValue()
    {
        return $this->value;
    }

    /**
     * Returns the validation error message
     *
     * @return string
     * @access public
     */
    function getMessage()
    {
        return $this->message;
    }

    /**
     * Returns a string containing the unit, value and error message
     *
     * @return string
     * @access public
     */
    function toString ()
    {
        return $this->unit.' = '.$this->value.' ['.$this->message.']';
    }
}

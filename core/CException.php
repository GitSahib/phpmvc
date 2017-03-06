<?php
/**
 * A class to use the exception
 */
class CException
{
    public $var;

    const THROW_NONE    = 0;
    const THROW_CUSTOM  = 1;
    const THROW_DEFAULT = 2;

    function __construct($message,$avalue = self::THROW_NONE) {

        switch ($avalue) {
            case self::THROW_CUSTOM:
                // throw custom exception
                echo ($message);
                break;

            case self::THROW_DEFAULT:
                // throw default one.
                echo ($message);
                break;

            default: 
                // No exception, object will be created.
                $this->var = $avalue;
                break;
        }
    }
}
/**
 * A custom exception class
 */
class MyException extends Exception
{
    // Redefine the exception so message isn't optional
    public function __construct($message, $code = 0, Exception $previous = null) {
        // some code
    
        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }

    // custom string representation of object
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function customFunction() {
        echo "A custom function for this type of exception\n";
    }
}
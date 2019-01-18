<?php

namespace Traycommerce\Exceptions;

use Exception;

class TrayCommerceException extends Exception {

    public function __construct($info, $message, $code = 0, Exception $previous = null) {
        $message = $this->process($info, $message);
        parent::__construct($message, $code, $previous);
    }

    private function process($info, $message) {
        if (is_string($message))
            return $info . " " . $message;
        
        if(is_object($message)){
            if (isset($message->causes)) {
                if (is_array($message->causes)) {
                    return $info . " " . $message->name . ", Causes: (" . implode($message->causes) . ")";
                }

                if (is_object($message->causes)) {
                    $objectName = key($message->causes);
                    $properties = get_object_vars($message->causes->{$objectName});

                    $msg = array();
                    foreach ($properties as $key => $value) {
                        $msg[] = $key . ": " . implode(", ", $value);
                    }

                    return $info . " " . $message->name . ", " . $objectName . " causes: (" . implode(" and ", $msg) . ")";
                }
            } elseif (isset($message->message)) {
                return $info . " " . $message->name . ", Causes: (" . $message->message . ")";
            }

            return $info . " " . $message->name . ", Causes: (not explained)";
        }
        
        return $info . ", Causes: (not explained)";
    }

}
<?php

namespace Traycommerce\Exceptions;

use Exception;

class TrayCommerceException extends Exception {
    public function __construct($info, $message, $code = 0, Exception $previous = null) {
        parent::__construct($info." ".$message, $code, $previous);
    }
}
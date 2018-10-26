<?php

include __DIR__ . "/Helpers.php";
include __DIR__ . "/../Exceptions/TrayCommerceException.php";

class TrayEndpoints extends TrayCommerce {

    protected $auth;

    public function __construct(Auth $auth) {
        parent::__construct();
        parent::setBaseUrlApi($auth->getBaseUrlApi());
        $this->auth = $auth;
    }

}

<?php

include __DIR__ . "/Helpers.php";
include __DIR__ . "/../Exceptions/TrayCommerceException.php";

class TrayEndpoints extends TrayCommerce {

    protected $auth;

    protected $attrs = array();

    public function __construct(Auth $auth) {
        parent::__construct();
        parent::setBaseUrlApi($auth->getBaseUrlApi());
        $this->auth = $auth;

        $self = $this;
        
        parent::afterSend(function() use ($self){
        	$this->attrs = array();
        });
    }

    public function setAttrs($attrs = ""){
    	$this->attrs = array(
    		"attrs" => $attrs
    	);
    	return $this;
    }

    public function getAttrs(){
    	return $this->attrs;
    }
}

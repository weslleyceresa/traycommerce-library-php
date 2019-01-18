<?php
namespace Traycommerce\Library;

class BaseEndpoints extends HttpTray{
    protected $trayCommerceController;
    
    public function __construct() {
        parent::__construct();
        
        $this->trayCommerceController = TrayCommerceController::getInstance();
        
        parent::setBaseUrlApi($this->trayCommerceController->getApiUrl());
    }
    
}

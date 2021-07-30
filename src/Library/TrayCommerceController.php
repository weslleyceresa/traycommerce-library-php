<?php
namespace Traycommerce\Library;

use Exception;
use Traycommerce\Auth;
use Traycommerce\Entity\Token;
use Traycommerce\Exceptions\TrayCommerceException;

class TrayCommerceController {
    private $token;
    
    public static $instance;
    
    private $eventsOnBeforeRefreshToken = array();
    private $eventsOnRefreshedToken = array();
    private $eventsOnInvalidToken = array();
    
    private $consumerKey;
    private $consumerSecret;
    private $callBackUrl;
    private $storeUrl;
    private $apiUrl;
    private $code;
    
    private $readOnly;
    
    private function __construct() {
        $this->readOnly = false;
    }
    
    public static function getInstance() : TrayCommerceController{
        if (!isset(self::$instance)) {
            self::$instance = new TrayCommerceController();
        }
        
        return self::$instance;
    }
    
    public function checkValidToken(){
        if($this->readOnly){            
            if(empty($this->apiUrl))
                throw new TrayCommerceException("[TrayCommerceController][checkValidToken]", "Inform a apiUrl no controller do SDK!");
            
            if(empty($this->token))
                throw new TrayCommerceException("[TrayCommerceController][checkValidToken]", "Em modo leitura é necessário informar um token!");
                                    
            if($this->token->isValid() != Token::VALID){
                $this->triggerEvent("invalidToken");
                throw new TrayCommerceException("[TrayCommerceController][checkValidToken]", "Token inválido ou expirado!");
            }
        }
        else{
            if(empty($this->getConsumerKey()) || empty($this->getConsumerSecret()) || empty($this->getCode()) || empty($this->getApiUrl()))
                throw new TrayCommerceException("[TrayCommerceController][checkValidToken]", "Consumer key, secret, code e apiUrl são obrigatórios!");
            
            if(empty($this->token)){
                $this->triggerEvent("beforeRefreshToken"); 

                $auth = new Auth();

                $this->token = $auth->gerarChaveAcesso($this->getConsumerKey(), $this->getConsumerSecret(), $this->getCode(), $this->getApiUrl());

                $this->triggerEvent("refreshedToken");
            }
            elseif($this->token->isValid() != Token::VALID){
                $auth = new Auth();

                $this->triggerEvent("beforeRefreshToken");

                if($this->token->isValid() == Token::VALID_REFRESH_TOKEN){
                    $this->token = $auth->atualizarChaveAcesso($this->token->getRefresh_token(), $this->getApiUrl());
                }
                elseif($this->token->isValid() == Token::VALID_REQUIRE_NEW_TOKEN){
                    $this->token = $auth->gerarChaveAcesso($this->getConsumerKey(), $this->getConsumerSecret(), $this->getCode(), $this->getApiUrl());
                }

                $this->triggerEvent("refreshedToken");
            }
        }               
    }
    
    private function triggerEvent($eventName){
        switch($eventName){
            case "beforeRefreshToken":
                foreach($this->eventsOnBeforeRefreshToken as $callback){
                    $callback($this->token);
                }
                
                $this->eventsOnBeforeRefreshToken = [];
            break;
        
            case "refreshedToken":
                foreach($this->eventsOnRefreshedToken as $callback){
                    $callback($this->token);
                }
                
                $this->eventsOnRefreshedToken = [];
            break;
            
            case "invalidToken":
                foreach($this->eventsOnInvalidToken as $callback){
                    $callback();
                }
            break;
        }
    }
    
    public function clearEvents(){
        $this->eventsOnRefreshedToken = [];
        $this->eventsOnBeforeRefreshToken = [];
        $this->eventsOnInvalidToken = [];
        return $this;
    }
    
    public function onBeforeRefreshToken($callback){
        $this->eventsOnBeforeRefreshToken[] = $callback;
    }
    
    public function onRefreshedToken($callback){
        $this->eventsOnRefreshedToken[] = $callback;
    }
    
    public function onInvalidToken($callback){
        $this->eventsOnInvalidToken[] = $callback;
    }
    
    public function getToken(){
        return $this->token;
    }
    
    public function setToken($token){
        if($token != null){
            if(($token instanceof Token) == false){
                $this->token = null;
                throw new TrayCommerceException("[TrayCommerceController][setToken]", "Valor passado por parâmentro não parece ser uma instância de \TrayCommerce\Entity\Token");
            }
            
            $this->token = $token;
            
            $this->setApiUrl($this->token->getApi_host());
        }
        else{
            $this->token = null;
        }
                
        return $this;
    }
    
    public function authorizeApplication($returnUrlAuthorization = false){
        if($this->readOnly)
            return;
        
        if(empty($this->getConsumerKey()) || empty($this->getConsumerSecret()))
            throw new TrayCommerceException("[TrayCommerceController][authorizeApplication]", "Consumer key e secret são obrigatórios!");
        
        $auth = new Auth();
        
        if(empty($this->getCode()))
            return $auth->solicitarAutorizacao($this->getConsumerKey(), $this->getCallBackUrl(), $this->getStoreUrl(), $returnUrlAuthorization);
        
        $this->triggerEvent("beforeRefreshToken");
            
        $this->token = $auth->gerarChaveAcesso($this->getConsumerKey(), $this->getConsumerSecret(), $this->getCode(), $this->getApiUrl());

        $this->triggerEvent("refreshedToken");
    }
    
    public function getConsumerKey() {
        return $this->consumerKey;
    }

    public function getConsumerSecret() {
        return $this->consumerSecret;
    }

    public function getCallBackUrl() {
        return $this->callBackUrl;
    }

    public function getStoreUrl() {
        return $this->storeUrl;
    }

    public function getApiUrl() {
        return $this->apiUrl;
    }

    public function getCode() {
        return $this->code;
    }

    public function setConsumerKey($consumerKey) {
        $this->consumerKey = $consumerKey;
        return $this;
    }

    public function setConsumerSecret($consumerSecret) {
        $this->consumerSecret = $consumerSecret;
        return $this;
    }

    public function setCallBackUrl($callBackUrl) {
        $this->callBackUrl = $callBackUrl;
        return $this;
    }

    public function setStoreUrl($storeUrl) {
        if($storeUrl[strlen($storeUrl) - 1] != "/")
            $storeUrl .= "/";
        
        $this->storeUrl = $storeUrl;
        
        return $this;
    }

    public function setApiUrl($apiUrl) {
        if($apiUrl[strlen($apiUrl) - 1] != "/")
            $apiUrl .= "/";
        
        $this->apiUrl = $apiUrl;
        
        return $this;
    }

    public function setCode($code) {
        $this->code = $code;
        return $this;
    }
    
    public function enableReadOnly() {
        $this->readOnly = true;
        return $this;
    }
    
    public function disableReadOnly() {
        $this->readOnly = false;
        return $this;
    }
}

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
    
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new TrayCommerceController();
        }
        
        return self::$instance;
    }
    
    public function checkValidToken(){
        if(empty($this->token)){
            if($this->readOnly)
                throw new TrayCommerceException("[TrayCommerceController][checkValidToken]", "Em modo leitura é necessário informar um token!");
            
            $this->triggerEvent("beforeRefreshToken");
            
            $auth = new Auth();
            
            $this->token = $auth->gerarChaveAcesso($this->getConsumerKey(), $this->getConsumerSecret(), $this->getCode(), $this->getApiUrl());
            
            $this->triggerEvent("refreshedToken");
        }
        elseif($this->token->isValid() != Token::VALID){
            if($this->readOnly)
                throw new TrayCommerceException("[TrayCommerceController][checkValidToken]", "Token inválido ou expirado!");
            
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
        }
    }
    
    public function clearEvents(){
        $this->eventsOnRefreshedToken = [];
        $this->eventsOnBeforeRefreshToken = [];
        return $this;
    }
    
    public function onBeforeRefreshToken($callback){
        $this->eventsOnBeforeRefreshToken[] = $callback;
    }
    
    public function onRefreshedToken($callback){
        $this->eventsOnRefreshedToken[] = $callback;
    }
    
    public function getToken(){
        return $this->token;
    }
    
    public function setToken(Token $token){
        $this->token = $token;
        return $this;
    }
    
    public function authorizeApplication(){
        if($this->readOnly)
            return;
        
        $auth = new Auth();
        
        try{
            if(empty($this->getCode()))
                throw new Exception("Informe o código da aplicação");
            
            $this->triggerEvent("beforeRefreshToken");
            
            $this->token = $auth->gerarChaveAcesso($this->getConsumerKey(), $this->getConsumerSecret(), $this->getCode(), $this->getApiUrl());
            
            $this->triggerEvent("refreshedToken");
            
        } catch (Exception $ex) {
            $auth->solicitarAutorizacao($this->getConsumerKey(), $this->getCallBackUrl(), $this->getStoreUrl());
            exit;
        }
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
        $this->storeUrl = $storeUrl;
        return $this;
    }

    public function setApiUrl($apiUrl) {
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

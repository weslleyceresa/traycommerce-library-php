<?php
namespace Traycommerce\Entity;

class Token {
    private $code;
    private $message;
    private $date_activated;
    private $api_host;
    private $access_token;
    private $refresh_token;
    private $date_expiration_access_token;
    private $date_expiration_refresh_token;
    private $store_id;
    
    private $addTimeToNow;
    
    const VALID = 1;
    const VALID_REFRESH_TOKEN = 2;
    const VALID_REQUIRE_NEW_TOKEN = 3;
    
    public function __construct($tokenString = null) {
        if(!empty($tokenString)){
            $tokenString = json_decode($tokenString);
            
            $this->setAccess_token($tokenString->access_token)
                ->setApi_host($tokenString->api_host)
                ->setCode($tokenString->code)
                ->setDate_activated($tokenString->date_activated)
                ->setDate_expiration_access_token($tokenString->date_expiration_access_token)
                ->setDate_expiration_refresh_token($tokenString->date_expiration_refresh_token)
                ->setMessage($tokenString->message)
                ->setRefresh_token($tokenString->refresh_token)
                ->setStore_id($tokenString->store_id);  
        }
    }

    public function isValid(){
        $now = strtotime(date("Y-m-d H:i:s"));
        
        if($this->addTimeToNow)
            $now = strtotime($this->addTimeToNow, $now);

        if($now > $this->date_expiration_refresh_token)
            return Token::VALID_REQUIRE_NEW_TOKEN;
        
        if($now > $this->date_expiration_access_token)
            return Token::VALID_REFRESH_TOKEN;
        
        return Token::VALID;
    }
    
    public function setAddTimeToNow($addTimeToNow){
        $this->addTimeToNow = $addTimeToNow;
        return $this;
    }

    public function getStore_id() {
        return $this->store_id;
    }

    public function getAccess_token() {
        return $this->access_token;
    }

    public function getRefresh_token() {
        return $this->refresh_token;
    }

    public function getDate_expiration_access_token() {
        return !empty($this->date_expiration_access_token) ? date("Y-m-d H:i:s", $this->date_expiration_access_token) : null;
    }

    public function getDate_expiration_refresh_token() {
        return !empty($this->date_expiration_refresh_token) ? date("Y-m-d H:i:s", $this->date_expiration_refresh_token) : null;
    }
    
    public function getCode(){
        return $this->code;
    }
    
    public function getMessage(){
        return $this->message;
    }
    
    public function getDate_activated(){
        return !empty($this->date_activated) ? date("Y-m-d H:i:s", $this->date_activated) : null;
    }
    
    public function getApi_host(){
        return $this->api_host;
    }

    public function setStore_id($store_id) {
        $this->store_id = $store_id;
        return $this;
    }

    public function setAccess_token($access_token) {
        $this->access_token = $access_token;
        return $this;
    }

    public function setRefresh_token($refresh_token) {
        $this->refresh_token = $refresh_token;
        return $this;
    }

    public function setDate_expiration_access_token($date_expiration_access_token) {
        $this->date_expiration_access_token = strtotime($date_expiration_access_token);
        $this->date_expiration_access_token = strtotime("-5 minutes", $this->date_expiration_access_token);
        return $this;
    }

    public function setDate_expiration_refresh_token($date_expiration_refresh_token) {
        $this->date_expiration_refresh_token = strtotime($date_expiration_refresh_token);
        $this->date_expiration_refresh_token = strtotime("-5 minutes", $this->date_expiration_refresh_token);
        return $this;
    }
    
    public function setCode($code) {
        $this->code = $code;
        return $this;
    }
    
    public function setMessage($message) {
        $this->message = $message;
        return $this;
    }
    
    public function setDate_activated($date_activated) {
        $this->date_activated = strtotime($date_activated);
        return $this;
    }
    
    public function setApi_host($api_host) {
        $this->api_host = $api_host;
        return $this;
    }
    
    public function __toString(){
        $vars = get_object_vars($this);
        
        foreach($vars as $key => $value){
            if(preg_match("/date/i", $key))
                $vars[$key] = date("Y-m-d H:i:s", $value);
        }
        
        return json_encode($vars);
    }
}

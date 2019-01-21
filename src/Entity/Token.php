<?php
namespace Traycommerce\Entity;

class Token {
    private $store_id;
    private $access_token;
    private $refresh_token;
    private $date_expiration_access_token;
    private $date_expiration_refresh_token;    
    
    const VALID = 1;
    const VALID_REFRESH_TOKEN = 2;
    const VALID_REQUIRE_NEW_TOKEN = 3;
    
    public function isValid(){
        $now = strtotime(date("Y-m-d H:i:s"));
        
        if($now > $this->getDate_expiration_refresh_token())
            return Token::VALID_REQUIRE_NEW_TOKEN;
        
        if($now > $this->getDate_expiration_access_token())
            return Token::VALID_REFRESH_TOKEN;
        
        return Token::VALID;
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
        return $this->date_expiration_access_token;
    }

    public function getDate_expiration_refresh_token() {
        return $this->date_expiration_refresh_token;
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
        return $this;
    }

    public function setDate_expiration_refresh_token($date_expiration_refresh_token) {
        $this->date_expiration_refresh_token = strtotime($date_expiration_refresh_token);
        return $this;
    }
}

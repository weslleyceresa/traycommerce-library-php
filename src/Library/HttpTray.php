<?php
namespace Traycommerce\Library;

include __DIR__ . "/../Helpers/Global.php";

use Exception;
use Traycommerce\Exceptions\TrayCommerceException;
use function getCurlErrorByCode;

class HttpTray {
    private $base_url_api;

    private $eventsBeforeSend = array();
    private $eventsAfterSend = array();

    public function __construct() {   
    }

    public function getBaseUrlApi() {
        return $this->base_url_api;
    }

    public function setBaseUrlApi($baseUrlApi) {
        return $this->base_url_api = $baseUrlApi . "/";
    }

    public function post($action, $params = array(), $query = array()) {
        if (empty($this->base_url_api))
            throw new TrayCommerceException("[TrayCommerce][post]", "base_url_api deve ser fornecido.");

        return $this->curlPost(
            $this->base_url_api . $action, $params, $query, "POST"
        );
    }
    
    public function postJson($action, $params = array(), $query = array()) {
        if (empty($this->base_url_api))
            throw new TrayCommerceException("[TrayCommerce][postJson]", "base_url_api deve ser fornecido.");

        return $this->curlPut(
            $this->base_url_api . $action, $params, $query, "POST"
        );
    }

    public function get($action, $params = array(), $query = array()) {
        if (empty($this->base_url_api))
            throw new Exception("base_url_api deve ser fornecido.");

        return $this->curlPost(
            $this->base_url_api . $action, $params, $query, "GET"
        );
    }

    public function put($action, $params = array(), $query = array()) {
        if (empty($this->base_url_api))
            throw new Exception("base_url_api deve ser fornecido.");

        return $this->curlPut(
            $this->base_url_api . $action, $params, $query, "PUT"
        );
    }

    public function delete($action, $params = array(), $query = array()) {
        if (empty($this->base_url_api))
            throw new Exception("base_url_api deve ser fornecido.");

        return $this->curlPut(
            $this->base_url_api . $action, $params, $query, "DELETE"
        );
    }

    public function beforeSend($callback){
        $this->eventsBeforeSend[] = $callback;
        return $this;
    }

    public function afterSend($callback){
        $this->eventsAfterSend[] = $callback;
        return $this;
    }

    private function triggerEvent($time){
        switch($time){
            case "before":
                foreach ($this->eventsBeforeSend as $callback) {
                    $callback();
                }
            break;

            case "after":
                foreach ($this->eventsAfterSend as $callback) {
                    $callback();
                }
            break;
        }
    }

    private function curlPost($url, $postParams = array(), $getParams = array(), $type = "POST") {
        $params = http_build_query($getParams);
        
        $postParams = http_build_query($postParams);

        $url = $url . "?" . $params;

        $this->triggerEvent("before");

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postParams);
        curl_setopt($ch, CURLOPT_SSLVERSION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        // JSON de retorno 
        $jsonRetorno = trim(curl_exec($ch));
        $resposta = json_decode($jsonRetorno);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $errCode = curl_errno($ch);
        $errText = curl_error($ch);

        curl_close($ch);

        $this->triggerEvent("after");

        return array(
            "responseText" => $jsonRetorno,
            "code" => $code,
            "data" => $resposta,
            "err" => getCurlErrorByCode($errCode)." - ".$errText
        );
    }

    private function curlPut($url, $postParams = array(), $getParams = array(), $type = "PUT") {
        $url = $url . "?" . http_build_query($getParams);

        $this->triggerEvent("before");

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postParams));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen(json_encode($postParams)))
        );
        curl_setopt($ch, CURLOPT_SSLVERSION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        // JSON de retorno 
        $jsonRetorno = trim(curl_exec($ch));
        $resposta = json_decode($jsonRetorno);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $errCode = curl_errno($ch);
        $errText = curl_error($ch);

        curl_close($ch);

        $this->triggerEvent("after");

        return array(
            "responseText" => $jsonRetorno,
            "code" => $code,
            "data" => $resposta,
            "err" => getCurlErrorByCode($errCode)." - ".$errText
        );
    }
}
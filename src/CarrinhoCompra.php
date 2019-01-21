<?php
namespace Traycommerce;

use Traycommerce\Exceptions\TrayCommerceException;
use Traycommerce\Library\BaseEndpoints;
use function success;

class CarrinhoCompra extends BaseEndpoints {
    const uri = "carts/";

    public function __construct() {
        parent::__construct();
    }
    
    /**
     * 
     * @param type $sessionId
     * @return type object
     * @throws Exception
     */
    public function consultarDados($sessionId) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->get(self::uri . $sessionId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CarrinhoCompra][consultarDados]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param type $sessionId
     * @return type object
     * @throws Exception
     */
    public function consultarCompleto($sessionId) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->get(self::uri . $sessionId . "/complete", array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CarrinhoCompra][consultarCompleto]", $resposta["data"], $resposta["code"]);
    }
    
    /*
        $data["Cart"]["session_id"] = "123ABC456DEF789GHI";
        $data["Cart"]["product_id"] = "123";
        $data["Cart"]["variant_id"] = "";
        $data["Cart"]["quantity"] = "1";
        $data["Cart"]["price"] = "50.00";
        $data["Cart"]["additional_information"] = "Informações adicionais";
        $data["Cart"]["Shipping"]["id_shipping"] = "123";
        $data["Cart"]["Shipping"]["name"] = "Sedex";
        $data["Cart"]["Shipping"]["min_period"] = "1";
        $data["Cart"]["Shipping"]["max_period"] = "3";
        $data["Cart"]["Shipping"]["zip_code"] = "04001001";
        $data["Cart"]["Shipping"]["price"] = "16.85";
        $data["Cart"]["Shipping"]["tax_name"] = "Acréscimo";
        $data["Cart"]["Shipping"]["tax_value"] = "2.00";
        $data["Cart"]["Shipping"]["city"] = "São Paulo";
        $data["Cart"]["Shipping"]["state"] = "SP";     
     */
    
    /**
     * 
     * @param type $data
     * @return type object
     * @throws Exception
     */
    public function criarNovo($data = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->post(self::uri, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CarrinhoCompra][criarNovo]", $resposta["data"], $resposta["code"]);
    }
    
    /*
        $data["Cart"]["product_id"] = "123";
        $data["Cart"]["variant_id"] = "";
        $data["Cart"]["quantity"] = "1";
        $data["Cart"]["price"] = "50.00";
        $data["Cart"]["Shipping"]["id_shipping"] = "123";
        $data["Cart"]["Shipping"]["name"] = "Sedex";
        $data["Cart"]["Shipping"]["min_period"] = "1";
        $data["Cart"]["Shipping"]["max_period"] = "3";
        $data["Cart"]["Shipping"]["zip_code"] = "04001001";
        $data["Cart"]["Shipping"]["price"] = "16.85";
        $data["Cart"]["Shipping"]["tax_name"] = "Acréscimo";
        $data["Cart"]["Shipping"]["tax_value"] = "2.00";
        $data["Cart"]["Shipping"]["city"] = "São Paulo";
        $data["Cart"]["Shipping"]["state"] = "SP";
     */
    
    /**
     * 
     * @param type $sessionId
     * @param type $post
     * @return type object
     * @throws Exception
     */
    public function atualizarDados($sessionId, $data = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->put(self::uri . $sessionId, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CarrinhoCompra][atualizarDados]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param type $sessionId
     * @return type object
     * @throws Exception
     */
    public function excluir($sessionId) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->delete(self::uri . $sessionId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CarrinhoCompra][excluir]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param type $sessionId
     * @param type $productId
     * @param type $variantId
     * @return type object
     * @throws Exception
     */
    public function consultarProduto($sessionId, $productId, $variantId = null){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $url = self::uri . $sessionId . "/" . $productId;
        
        if(!empty($variantId))
            $url += "/" . $variantId;

        $resposta = $this->get($url, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CarrinhoCompra][consultarProduto]", $resposta["data"], $resposta["code"]);
    }
    
    /*
        $data["Cart"]["quantity"] = "5";
        $data["Cart"]["price"] = "54.00";
     */
    
    /**
     * 
     * @param type $sessionId
     * @param type $productId
     * @param type $data
     * @param type $variantId
     * @return type object
     * @throws Exception
     */
    public function atualizarProduto($sessionId, $productId, $data = array(), $variantId = null){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $url = self::uri . $sessionId . "/" . $productId;
        
        if(!empty($variantId))
            $url += "/" . $variantId;

        $resposta = $this->put($url, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CarrinhoCompra][atualizarProduto]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param type $sessionId
     * @param type $productId
     * @param type $variantId
     * @return type object
     * @throws Exception
     */
    public function excluirProduto($sessionId, $productId, $variantId = null){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $url = self::uri . $sessionId . "/" . $productId;
        
        if(!empty($variantId))
            $url .= "/" . $variantId;

        $resposta = $this->delete($url, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CarrinhoCompra][excluirProduto]", $resposta["data"], $resposta["code"]);
    }
}
?>
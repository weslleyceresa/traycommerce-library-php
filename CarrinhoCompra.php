<?php
class CarrinhoCompra extends TrayEndpoints {

    const uri = "carts/";

    public function __construct(Auth $auth) {
        parent::__construct($auth);
    }
    
    /**
     * 
     * @param type $sessionId
     * @return type object
     * @throws Exception
     */
    public function consultarDados($sessionId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->get(self::uri . $sessionId, array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param type $sessionId
     * @return type object
     * @throws Exception
     */
    public function consultarCompleto($sessionId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->get(self::uri . $sessionId . "/complete", array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
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
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->post(self::uri, $data, $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
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
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->put(self::uri . $sessionId, $data, $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param type $sessionId
     * @return type object
     * @throws Exception
     */
    public function excluir($sessionId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->put(self::uri . $sessionId, array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
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
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $url = self::uri . $sessionId . "/" . $productId;
        
        if(!empty($variantId))
            $url += "/" . $variantId;

        $resposta = $this->get($url, array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
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
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $url = self::uri . $sessionId . "/" . $productId;
        
        if(!empty($variantId))
            $url += "/" . $variantId;

        $resposta = $this->put($url, $data, $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
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
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $url = self::uri . $sessionId . "/" . $productId;
        
        if(!empty($variantId))
            $url += "/" . $variantId;

        $resposta = $this->delete($url, array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
}
?>
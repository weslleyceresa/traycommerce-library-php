<?php
class CarrinhoCompra extends TrayEndpoints {

    const uri = "carts/";

    public function __construct(Auth $auth) {
        parent::__construct($auth);
    }

    public function consultarDados($sessionId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->get(self::uri . $sessionId, $post);

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
    public function consultarCarrinhoCompleto($sessionId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->get(self::uri . $sessionId . "/complete", $post);

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
    public function criarNovoCarrinho($data = array()) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $post = array_merge($post, $data);

        $resposta = $this->post(self::uri, $post);

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
    public function atualizarDadosCarrinho($sessionId, $data) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $post = array_merge($post, $data);

        $resposta = $this->put(self::uri . $sessionId, $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }

    public function excluirCarrinho() {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $post = array_merge($post, $data);

        $resposta = $this->put(self::uri . $sessionId, $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }

}
?>
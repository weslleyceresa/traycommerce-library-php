<?php
class Frete extends TrayEndpoints{
    const uri = "shippings/";
    
    public function __construct(\Auth $auth) {
        parent::__construct($auth);
    }
    
    /**
     * 
     * @param array $filtros
     * @return object
     * @throws Exception/
     */
    public function listagemFormasEnvio($filtros = array()){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri, array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /*
        $filtros["zipcode"] = "04001001";
        $filtros["products[0][product_id]"] = "123";
        $filtros["products[0][price]"] = "58.50";
        $filtros["products[0][quantity]"] = "2";
        $filtros["products[1][product_id]"] = "456";
        $filtros["products[1][price]"] = "85.50";
        $filtros["products[1][quantity]"] = "1";
     */
    
    /**
     * 
     * @param array $filtros
     * @return object
     * @throws Exception/
     */
    public function calculo($filtros = array()){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri . "cotation/", array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
}

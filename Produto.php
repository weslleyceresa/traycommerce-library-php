<?php
class Produto extends TrayEndpoints{
    const uri = "products/";
    
    public function __construct(\Auth $auth) {
        parent::__construct($auth);
    }
    
    public function listagemCaracterísticasProdutos($filtros = array()){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $query = array_merge($post, $filtros);

        $resposta = $this->get(self::uri . "properties/", array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
}
<?php
class Produto extends TrayEndpoints{
    const uri = "products/";
    
    public function __construct(\Auth $auth) {
        parent::__construct($auth);
    }
    
    public function ListagemCaracterísticasProdutos($filtros = array()){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $post = array_merge($post, $filtros);

        $resposta = $this->get(self::uri . "properties/", $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
}
<?php
class Parceiro extends TrayEndpoints{
    const uri = "partners/";
    
    public function __construct(\Auth $auth) {
        parent::__construct($auth);
    }

    public function dados($partnerId){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->get(self::uri . $partnerId, array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
}
<?php
class Produto extends TrayEndpoints{
    const uri = "info/";
    
    public function __construct(\Auth $auth) {
        parent::__construct($auth);
    }
    
    /**
     * 
     * @return object
     * @throws Exception/
     */
    public function dados(){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->get(self::uri, array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
}

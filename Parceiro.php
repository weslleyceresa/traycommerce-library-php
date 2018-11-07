<?php
class Parceiro extends TrayEndpoints{
    const uri = "partners/";
    
    public function __construct(\Auth $auth) {
        parent::__construct($auth);
    }

    /**
     * 
     * @param array $filtros
     * @return object
     * @throws Exception/
     */
    public function listagem($filtros = array()){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Parceiro][listagem]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $partnerId
     * @return object
     * @throws Exception/
     */
    public function dados($partnerId){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->get(self::uri . $partnerId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Parceiro][dados]", $resposta["data"], $resposta["code"]);
    }
    
    /*
        $data["Partner"]["name"] = "Nome do Parceiro";
        $data["Partner"]["site"] = "http://www.sitedoparceiro.com.br";
        $data["Partner"]["commission"] = "0.20";
     */
    
    /**
     * 
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function cadastrar($data = array()) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->put(self::uri, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Parceiro][cadastrar]", $resposta["data"], $resposta["code"]);
        
    }
    
    /*
        $data["Partner"]["name"] = "Nome do Parceiro";
        $data["Partner"]["site"] = "http://www.sitedoparceiro.com.br";
        $data["Partner"]["commission"] = "0.20";
     */
    
    /**
     * 
     * @param int $partnerId
     * @return object
     * @throws Exception
     */
    public function atualizarDados($partnerId, $data = array()) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->put(self::uri . $partnerId, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Parceiro][atualizarDados]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $partnerId
     * @return object
     * @throws Exception
     */
    public function excluir($partnerId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->delete(self::uri . $partnerId, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Parceiro][excluir]", $resposta["data"], $resposta["code"]);
    }
}
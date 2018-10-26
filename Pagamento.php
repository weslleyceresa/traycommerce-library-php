<?php
class Pagamento extends TrayEndpoints{
    const uri = "payments/";
    
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

        throw new TrayCommerceException($resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $paymentId
     * @return object
     * @throws Exception/
     */
    public function dados($paymentId){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->get(self::uri . $paymentId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException($resposta["data"], $resposta["code"]);
    }
    
    /*
        $data["Payment"]["order_id"] = "123";
        $data["Payment"]["method"] = "Cartão de Crédito";
        $data["Payment"]["value"] = "50.85";
        $data["Payment"]["date"] = "2016-08-15";
        $data["Payment"]["note"] = "Pagamento realizado com sucesso";
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

        throw new TrayCommerceException($resposta["data"], $resposta["code"]);
    }
    
    /*
        $data["Payment"]["order_id"] = "123";
        $data["Payment"]["method"] = "Cartão de Crédito";
        $data["Payment"]["value"] = "50.85";
        $data["Payment"]["date"] = "2016-08-15";
        $data["Payment"]["note"] = "Pagamento realizado com sucesso";
     */
    
    /**
     * 
     * @param int $paymentId
     * @return object
     * @throws Exception
     */
    public function atualizarDados($paymentId, $data = array()) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->put(self::uri . $paymentId, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException($resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $paymentId
     * @return object
     * @throws Exception
     */
    public function excluir($paymentId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->delete(self::uri . $paymentId, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException($resposta["data"], $resposta["code"]);
    }
    
    /*
        $filtros["order_id"] = "123";
     */
    
    /**
     * 
     * @param array $filtros
     * @return object
     * @throws Exception/
     */
    public function opcoes($filtros = array()){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri . "options", array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException($resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @return object
     * @throws Exception/
     */
    public function configuracoes(){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->get(self::uri . "settings", array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException($resposta["data"], $resposta["code"]);
    }
}

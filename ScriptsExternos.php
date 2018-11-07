<?php
class Produto extends TrayEndpoints{
    const uri = "external_scripts/";
    
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

        throw new TrayCommerceException("[ScriptsExternos][listagem]", $resposta["data"], $resposta["code"]);
    }
    
    /*
        $data["ExternalScript"]["source"] = "http://localhost/assets/store/css/script.css";
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

        throw new TrayCommerceException("[ScriptsExternos][cadastrar]", $resposta["data"], $resposta["code"]);
    }
    
    /*
        $data["ExternalScript"]["source"] = "http://localhost/assets/store/css/script.css";
     */
    
    /**
     * 
     * @param int $scriptId
     * @return object
     * @throws Exception
     */
    public function atualizarDados($scriptId, $data = array()) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->put(self::uri . $scriptId, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[ScriptsExternos][atualizarDados]", $resposta["data"], $resposta["code"]);
    }
}

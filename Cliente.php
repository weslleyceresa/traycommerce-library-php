<?php
class Cliente extends TrayEndpoints{
    const uri = "customers/";
    const uri_address = "customers/addresses/";
    const uri_profile = "customers/profiles/";

    const GENDER_MASCULINO = "0";
    const GENDER_FEMININO = "0";

    const TYPE_PESSOA_FISICA = "0";
    const TYPE_PESSOA_JURIDICA = "1";

    const BLOCKED_CLIENTE_DESBLOQUEADO = "0";
    const BLOCKED_CLIENTE_BLOQUEADO = "1";

    const ADDRESS_TYPE_COBRANCA = "0";
    const ADDRESS_TYPE_ENTREGA = "1";

    const ADDRESS_ACTIVE_INDISPONIVEL = "0";
    const ADDRESS_ACTIVE_DISPONIVEL = "1";
    
    public function __construct(\Auth $auth) {
        parent::__construct($auth);
    }

    /*
        $data["email"] = "email@email.com";
        $data["password"] = "*****";
     */
    
    /**
     * 
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function login($data = array()) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->post(self::uri . "login", $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Cliente][login]", $resposta["data"], $resposta["code"]);
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

        throw new TrayCommerceException("[Cliente][listagem]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $customerId
     * @return object
     * @throws Exception/
     */
    public function dados($customerId){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->get(self::uri . $customerId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Cliente][dados]", $resposta["data"], $resposta["code"]);
    }
    
    /*
        $data["Customer"]["name"] = "Nome do Cliente";
        $data["Customer"]["rg"] = "00.000.000-0";
        $data["Customer"]["cpf"] = "00000000000";
        $data["Customer"]["phone"] = "1133330000";
        $data["Customer"]["cellphone"] = "11999990000";
        $data["Customer"]["birth_date"] = "0000-00-00";
        $data["Customer"]["gender"] = "0";
        $data["Customer"]["email"] = "emaildo@cliente.com.br";
        $data["Customer"]["nickname"] = "";
        $data["Customer"]["observation"] = "";
        $data["Customer"]["type"] = "1";
        $data["Customer"]["company_name"] = "Razão Social do Cliente";
        $data["Customer"]["cnpj"] = "00.000.000/0000-00";
        $data["Customer"]["state_inscription"] = "Isento";
        $data["Customer"]["reseller"] = "0";
        $data["Customer"]["discount"] = "0";
        $data["Customer"]["blocked"] = "0";
        $data["Customer"]["credit_limit"] = "0";
        $data["Customer"]["indicator_id"] = "0";
        $data["Customer"]["profile_customer_id"] = "1";
        $data["Customer"]["address"] = "Endereço do Cliente";
        $data["Customer"]["zip_code"] = "04001-001";
        $data["Customer"]["number"] = "123";
        $data["Customer"]["complement"] = "Sala 123";
        $data["Customer"]["neighborhood"] = "Bairro do Cliente";
        $data["Customer"]["city"] = "Cidade do Cliente";
        $data["Customer"]["state"] = "SP";
        $data["Customer"]["newsletter"] = "1";
        $data["Customer"]["CustomerAddress"][0]["recipient"] = "Nome do Cliente";
        $data["Customer"]["CustomerAddress"][0]["address"] = "Outro Endereço do Cliente";
        $data["Customer"]["CustomerAddress"][0]["number"] = "456";
        $data["Customer"]["CustomerAddress"][0]["complement"] = "Sala 456";
        $data["Customer"]["CustomerAddress"][0]["neighborhood"] = "Bairro do Cliente";
        $data["Customer"]["CustomerAddress"][0]["city"] = "Cidade do Cliente";
        $data["Customer"]["CustomerAddress"][0]["state"] = "SP";
        $data["Customer"]["CustomerAddress"][0]["zip_code"] = "04001-001";
        $data["Customer"]["CustomerAddress"][0]["country"] = "BRA";
        $data["Customer"]["CustomerAddress"][0]["type"] = "1";
        $data["Customer"]["CustomerAddress"][0]["active"] = "1";
        $data["Customer"]["CustomerAddress"][0]["description"] = "";
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
        
        $resposta = $this->post(self::uri, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Cliente][cadastrar]", $resposta["data"], $resposta["code"]);
    }
    
    /*
        $data["Customer"]["name"] = "Nome do Cliente";
        $data["Customer"]["rg"] = "00.000.000-0";
        $data["Customer"]["cpf"] = "00000000000";
        $data["Customer"]["phone"] = "1133330000";
        $data["Customer"]["cellphone"] = "11999990000";
        $data["Customer"]["birth_date"] = "0000-00-00";
        $data["Customer"]["gender"] = "0";
        $data["Customer"]["email"] = "emaildo@cliente.com.br";
        $data["Customer"]["nickname"] = "";
        $data["Customer"]["observation"] = "";
        $data["Customer"]["type"] = "1";
        $data["Customer"]["company_name"] = "Razão Social do Cliente";
        $data["Customer"]["cnpj"] = "00.000.000/0000-00";
        $data["Customer"]["state_inscription"] = "Isento";
        $data["Customer"]["reseller"] = "0";
        $data["Customer"]["discount"] = "0";
        $data["Customer"]["blocked"] = "0";
        $data["Customer"]["credit_limit"] = "0";
        $data["Customer"]["indicator_id"] = "0";
        $data["Customer"]["profile_customer_id"] = "1";
        $data["Customer"]["newsletter"] = "1";
     */
    
    /**
     * 
     * @param int $customerId
     * @return object
     * @throws Exception
     */
    public function atualizarDados($customerId, $data = array()) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->put(self::uri . $customerId, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Cliente][atualizarDados]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $customerId
     * @return object
     * @throws Exception
     */
    public function excluir($customerId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->delete(self::uri . $customerId, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Cliente][excluir]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param array $filtros
     * @return object
     * @throws Exception/
     */
    public function listagemEnderecos($filtros = array()){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_address, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Cliente][listagemEnderecos]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $addressId
     * @return object
     * @throws Exception/
     */
    public function dadosEndereco($addressId){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->get(self::uri_address . $addressId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Cliente][dadosEndereco]", $resposta["data"], $resposta["code"]);
    }
    
    /*
        $data["CustomerAddress"]["customer_id"] = "123";
        $data["CustomerAddress"]["recipient"] = "";
        $data["CustomerAddress"]["address"] = "Endereço do Cliente";
        $data["CustomerAddress"]["number"] = "123";
        $data["CustomerAddress"]["complement"] = "Sala 123";
        $data["CustomerAddress"]["neighborhood"] = "Bairro do Cliente";
        $data["CustomerAddress"]["city"] = "Cidade do Cliente";
        $data["CustomerAddress"]["state"] = "SP";
        $data["CustomerAddress"]["zip_code"] = "04001001";
        $data["CustomerAddress"]["country"] = "BRA";
        $data["CustomerAddress"]["type"] = "1";
        $data["CustomerAddress"]["active"] = "1";
        $data["CustomerAddress"]["description"] = "1";
     */
    
    /**
     * 
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function cadastrarEndereco($data = array()) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->post(self::uri_address, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Cliente][cadastrarEndereco]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $addressId
     * @return object
     * @throws Exception
     */
    public function excluirEndereco($addressId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->delete(self::uri_address . $addressId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Cliente][excluirEndereco]", $resposta["data"], $resposta["code"]);
    }

    /**
     * 
     * @param int $addressId
     * @return object
     * @throws Exception
     */
    public function relacionarPerfil($data = array()) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->post(self::uri_profile . "relation", $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Cliente][relacionarPerfil]", $resposta["data"], $resposta["code"]);
    }
}

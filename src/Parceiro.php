<?php
namespace Traycommerce;

use Exception;
use Traycommerce\Entity\Token;
use Traycommerce\Exceptions\TrayCommerceException;
use Traycommerce\Library\BaseEndpoints;
use function success;

class Parceiro extends BaseEndpoints{
    const uri = "partners/";
    
    public function __construct(Token $token) {
        parent::__construct($token);
    }

    /**
     * 
     * @param array $filtros
     * @return object
     * @throws Exception/
     */
    public function listagem($filtros = array()){
        $this->checkValidToken();

        $query = array(
            "access_token" => $this->token->getAccess_token()
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
        $this->checkValidToken();

        $query = array(
            "access_token" => $this->token->getAccess_token()
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
        $this->checkValidToken();

        $query = array(
            "access_token" => $this->token->getAccess_token()
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
        $this->checkValidToken();

        $query = array(
            "access_token" => $this->token->getAccess_token()
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
        $this->checkValidToken();

        $query = array(
            "access_token" => $this->token->getAccess_token()
        );
        
        $resposta = $this->delete(self::uri . $partnerId, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Parceiro][excluir]", $resposta["data"], $resposta["code"]);
    }
}
<?php
namespace Traycommerce;

use Exception;
use Traycommerce\Entity\Token;
use Traycommerce\Exceptions\TrayCommerceException;
use Traycommerce\Library\BaseEndpoints;
use function success;

class Produto extends BaseEndpoints{
    const uri = "newsletter/";
    
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

        throw new TrayCommerceException("[Newsletter][listagem]", $resposta["data"], $resposta["code"]);
    }
    
    /*
        $data["Newsletter"]["name"] = "Nome do Cliente";
        $data["Newsletter"]["email"] = "emaildo@cliente.com.br";
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

        throw new TrayCommerceException("[Newsletter][cadastrar]", $resposta["data"], $resposta["code"]);
    }
    
    /*
        $data["email"] = "emaildo@cliente.com.br";
     */
    
    /**
     * 
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function confirmar($data = array()) {
        $this->checkValidToken();

        $query = array(
            "access_token" => $this->token->getAccess_token()
        );
        
        $resposta = $this->post(self::uri . "confirmation/", $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Newsletter][confirmar]", $resposta["data"], $resposta["code"]);
    }
}

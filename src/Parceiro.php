<?php
namespace Traycommerce;

use Exception;
use Traycommerce\Exceptions\TrayCommerceException;
use Traycommerce\Library\BaseEndpoints;
use Traycommerce\Helpers\GlobalHelper;

class Parceiro extends BaseEndpoints{
    const uri = "partners/";
    
    public function __construct() {
        parent::__construct();
    }

    /**
     * 
     * @param array $filtros
     * @return object
     * @throws Exception/
     */
    public function listagem(array $filtros = array()){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Parceiro][listagem]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $partnerId
     * @return object
     * @throws Exception/
     */
    public function dados($partnerId, array $filtros = array()){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri . $partnerId, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Parceiro][dados]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
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
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->put(self::uri, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Parceiro][cadastrar]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
        
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
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->put(self::uri . $partnerId, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Parceiro][atualizarDados]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $partnerId
     * @return object
     * @throws Exception
     */
    public function excluir($partnerId) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->delete(self::uri . $partnerId, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Parceiro][excluir]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
}
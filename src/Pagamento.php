<?php
namespace Traycommerce;

use Exception;
use Traycommerce\Exceptions\TrayCommerceException;
use Traycommerce\Library\BaseEndpoints;
use function success;

class Pagamento extends BaseEndpoints{
    const uri = "payments/";
    
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

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pagamento][listagem]", $resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $paymentId
     * @return object
     * @throws Exception/
     */
    public function dados($paymentId, array $filtros = array()){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri . $paymentId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pagamento][dados]", $resposta["responseText"], $resposta["code"]);
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
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->put(self::uri, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pagamento][cadastrar]", $resposta["responseText"], $resposta["code"]);
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
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->put(self::uri . $paymentId, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pagamento][atualizarDados]", $resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $paymentId
     * @return object
     * @throws Exception
     */
    public function excluir($paymentId) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->delete(self::uri . $paymentId, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pagamento][excluir]", $resposta["responseText"], $resposta["code"]);
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
    public function opcoes(array $filtros = array()){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri . "options", array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pagamento][opcoes]", $resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @return object
     * @throws Exception/
     */
    public function configuracoes(){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->get(self::uri . "settings", array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pagamento][configuracoes]", $resposta["responseText"], $resposta["code"]);
    }
}

<?php
namespace Traycommerce;

use Traycommerce\Exceptions\TrayCommerceException;
use Traycommerce\Library\BaseEndpoints;
use function success;

class Frete extends BaseEndpoints{
    const uri = "shippings/";
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * 
     * @param array $filtros
     * @return object
     * @throws Exception/
     */
    public function listagemFormasEnvio(array $filtros = array()){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Frete][listagemFormasEnvio]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /*
        $filtros["zipcode"] = "04001001";
        $filtros["products[0][product_id]"] = "123";
        $filtros["products[0][price]"] = "58.50";
        $filtros["products[0][quantity]"] = "2";
        $filtros["products[1][product_id]"] = "456";
        $filtros["products[1][price]"] = "85.50";
        $filtros["products[1][quantity]"] = "1";
     */
    
    /**
     * 
     * @param array $filtros
     * @return object
     * @throws Exception/
     */
    public function calculo(array $filtros = array()){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri . "cotation/", array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Frete][calculo]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
}

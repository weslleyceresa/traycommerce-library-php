<?php

namespace Traycommerce;

use Traycommerce\Exceptions\TrayCommerceException;
use Traycommerce\Library\BaseEndpoints;
use function success;

class CupomDisconto extends BaseEndpoints{
    const uri = "discount_coupons/";
    const uri_customer_relationship = "discount_coupons/customer_relationship/";
    const uri_product_relationship = "discount_coupons/product_relationship/";
    const uri_category_relationship = "discount_coupons/category_relationship/";
    const uri_brand_relationship = "discount_coupons/brand_relationship/";
    const uri_shipping_relationship = "discount_coupons/shipping_relationship/";
    const uri_delete_relationship = "discount_coupons/delete_relationship/";
    const uri_create_relationship = "discount_coupons/create_relationship/";
        
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
        
        $resposta = $this->postJson(self::uri, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CupomDisconto][cadastrar]", $resposta["data"], $resposta["code"]);
    }
        
    /**
     * 
     * @param int $couponId
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function limitar($couponId, $data = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->put(self::uri_create_relationship . $couponId, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CupomDisconto][limitar]", $resposta["data"], $resposta["code"]);
    }
        
    /**
     * 
     * @param int $couponId
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function setarComoTroca($couponId, $data = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->put(self::uri_create_relationship . $couponId, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CupomDisconto][setarComoTroca]", $resposta["data"], $resposta["code"]);
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

        throw new TrayCommerceException("[CupomDisconto][listagem]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $couponId
     * @return object
     * @throws Exception/
     */
    public function dados($couponId, array $filtros = array()){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri . $couponId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CupomDisconto][dados]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $couponId
     * @return object
     * @throws Exception/
     */
    public function clientesRelacionados($couponId, array $filtros = array()){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_customer_relationship . $couponId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CupomDisconto][clientesRelacionados]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $couponId
     * @return object
     * @throws Exception/
     */
    public function produtosRelacionados($couponId, array $filtros = array()){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_product_relationship . $couponId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CupomDisconto][produtosRelacionados]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $couponId
     * @return object
     * @throws Exception/
     */
    public function categoriasRelacionadas($couponId, array $filtros = array()){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_category_relationship . $couponId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CupomDisconto][categoriasRelacionadas]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $couponId
     * @return object
     * @throws Exception/
     */
    public function marcasRelacionadas($couponId, array $filtros = array()){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_brand_relationship . $couponId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CupomDisconto][marcasRelacionadas]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $couponId
     * @return object
     * @throws Exception/
     */
    public function fretesRelacionados($couponId, array $filtros = array()){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_shipping_relationship . $couponId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CupomDisconto][fretesRelacionados]", $resposta["data"], $resposta["code"]);
    }
        
    /**
     * 
     * @param int $couponId
     * @param array $data
     * @return object
     * @throws Exception/
     */
    public function excluirRelacionados($couponId, array $data){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->put(self::uri_delete_relationship . $couponId, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CupomDisconto][excluirRelacionados]", $resposta["data"], $resposta["code"]);
    }

    /**
     * 
     * @param int $couponId
     * @return object
     * @throws Exception/
     */
    public function excluir($couponId){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->delete(self::uri . $couponId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[CupomDisconto][excluir]", $resposta["data"], $resposta["code"]);
    }    
}

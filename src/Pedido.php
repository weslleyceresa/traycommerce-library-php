<?php
namespace Traycommerce;

use Exception;
use Traycommerce\Exceptions\TrayCommerceException;
use Traycommerce\Library\BaseEndpoints;
use Traycommerce\Helpers\GlobalHelper;

class Pedido extends BaseEndpoints{
    const uri = "orders/";
    const uri_status = "orders/statuses/";
    const uri_tracking = "tracking_labels/";
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * 
     * @param array $filtros
     * @return object     
     * @throws Exception
     */
    public function listagem(array $filtros = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][listagem]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param type $orderId
     * @return type object
     * @throws Exception
     */
    public function dados($orderId, array $filtros = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri . $orderId, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][dados]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param type $orderId
     * @return type object
     * @throws Exception
     */
    public function dadosCompleto($orderId) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->get(self::uri . $orderId . "/complete", array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][dadosCompleto]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /*
        $data["Order"]["point_sale"] = "PARTICULAR";
        $data["Order"]["shipment"] = "Sedex";
        $data["Order"]["shipment_value"] = "10.44";
        $data["Order"]["payment_form"] = "Boleto - TrayCheckout";
        $data["Order"]["Customer"]["type"] = "0";
        $data["Order"]["Customer"]["name"] = "Nome do Cliente";
        $data["Order"]["Customer"]["cpf"] = "00000000000";
        $data["Order"]["Customer"]["email"] = "email@docliente.com";
        $data["Order"]["Customer"]["rg"] = "00.000.000-X";
        $data["Order"]["Customer"]["gender"] = "M";
        $data["Order"]["Customer"]["phone"] = "1133330001";
        $data["Order"]["Customer"]["CustomerAddress"][0]["address"] = "Endereço do Cliente";
        $data["Order"]["Customer"]["CustomerAddress"][0]["zip_code"] = "04001001";
        $data["Order"]["Customer"]["CustomerAddress"][0]["number"] = "123";
        $data["Order"]["Customer"]["CustomerAddress"][0]["complement"] = "Sala 123";
        $data["Order"]["Customer"]["CustomerAddress"][0]["neighborhood"] = "Bairro do Cliente";
        $data["Order"]["Customer"]["CustomerAddress"][0]["city"] = "Cidade do Cliente";
        $data["Order"]["Customer"]["CustomerAddress"][0]["state"] = "SP";
        $data["Order"]["Customer"]["CustomerAddress"][0]["country"] = "BRA";
        $data["Order"]["Customer"]["CustomerAddress"][0]["type"] = "1";
        $data["Order"]["Customer"]["ProductsSold"][0]["product_id"] = "1";
        $data["Order"]["Customer"]["ProductsSold"][0]["variant_id"] = "12";
        $data["Order"]["Customer"]["ProductsSold"][0]["price"] = "42.90";
        $data["Order"]["Customer"]["ProductsSold"][0]["original_price"] = "42.90";
        $data["Order"]["Customer"]["ProductsSold"][0]["quantity"] = "1";
     */
    
    /**
     * 
     * @param type $data
     * @return type object
     * @throws Exception
     */
    public function cadastrar($data = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->post(self::uri, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][cadastrar]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /*
        $data["Order"]["status_id"] = "16";
        $data["Order"]["taxes"] = "0.01";
        $data["Order"]["shipment"] = "Sedex";
        $data["Order"]["shipment_value"] = "5.58";
        $data["Order"]["discount"] = "0.01";
        $data["Order"]["sending_code"] = "123456";
        $data["Order"]["sending_date"] = "2015-04-20";
        $data["Order"]["store_note"] = "Pedido em 1 vez de R$ 51,85 através do Boleto.";
        $data["Order"]["customer_note"] = "";
        $data["Order"]["partner_id"] = "2";
     */
    
    /**
     * 
     * @param type $orderId
     * @param type $data
     * @return type object
     * @throws Exception
     */
    public function atualizarDados($orderId, $data = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->put(self::uri . $orderId, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][atualizarDados]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param type $orderId
     * @return type object
     * @throws Exception
     */
    public function cancelar($orderId) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->put(self::uri . "cancel/" . $orderId, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][cancelar]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param type $orderId
     * @return type object
     * @throws Exception
     */
    public function excluir($orderId) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->delete(self::uri . $orderId, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][excluir]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param type $filtros
     * @return type object
     * @throws Exception
     */
    public function listagemNotasFiscais(array $filtros = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);
        
        $resposta = $this->get(self::uri . "invoices", array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][listagemNotasFiscais]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param type $orderId
     * @param type $invoiceId
     * @return type object
     * @throws Exception
     */
    public function consultarDadosNotaFiscal($orderId, $invoiceId, array $filtros = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);
        
        $resposta = $this->get(self::uri . $orderId . "/" . "invoices/" . $invoiceId, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][consultarDadosNotaFiscal]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param type $orderId
     * @return type object
     * @throws Exception
     */
    public function consultarNotaPorPedido($orderId, array $filtros = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);
        
        $resposta = $this->get(self::uri . $orderId . "/" . "invoices/", array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][consultarNotaPorPedido]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /*
        $data["issue_date"] = "2016-08-15";
        $data["number"] = "213123213213";
        $data["serie"] = "123";
        $data["value"] = "50.85";
        $data["key"] = "12345678901234567890123456789012345678901234";
        $data["link"] = "http://www.link.com.br/12345678901234567890123456789012345678901234";
        $data["xml_danfe"] = "### XML DANFE ###";
        $data["ProductCfop"]["product_id"] = "123";
        $data["ProductCfop"]["variation_id"] = "0";
        $data["ProductCfop"]["cfop"] = "1234";
     */
    
    /**
     * 
     * @param type $orderId
     * @param type $data
     * @return type object
     * @throws Exception
     */
    public function cadastrarNotaFiscal($orderId, $data = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->post(self::uri . $orderId . "/" . "invoices/", $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][cadastrarNotaFiscal]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /*
        $data["issue_date"] = "2016-08-15";
        $data["number"] = "213123213213";
        $data["serie"] = "123";
        $data["value"] = "50.85";
        $data["key"] = "12345678901234567890123456789012345678901234";
        $data["link"] = "http://www.link.com.br/12345678901234567890123456789012345678901234";
        $data["xml_danfe"] = "### XML DANFE ###";
        $data["ProductCfop"]["product_id"] = "123";
        $data["ProductCfop"]["variation_id"] = "0";
        $data["ProductCfop"]["cfop"] = "1234";
     */
    
    /**
     * 
     * @param int $orderId
     * @param int $invoiceId
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function atualizarNotaFiscal($orderId, $invoiceId, $data = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->put(self::uri . $orderId . "/" . "invoices/" . $invoiceId, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][atualizarNotaFiscal]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /*
        $data["ProductsSold"]["product_id"] = "9999";
        $data["ProductsSold"]["variant_id"] = "123";
        $data["ProductsSold"]["price"] = "55.80";
        $data["ProductsSold"]["original_price"] = "55.80";
        $data["ProductsSold"]["quantity"] = "1";
     */
    
    /**
     * 
     * @param int $orderId
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function incluirProduto($orderId, $data = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->post(self::uri . "includeProduct/" . $orderId, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][incluirProduto]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $orderId
     * @param int $productId
     * @return object
     * @throws Exception
     */
    public function excluirProduto($orderId, $productId) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->put(self::uri . "excludeProduct/" . $orderId . "/" . $productId, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][excluirProduto]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param array $filtros
     * @return object     
     * @throws Exception
     */
    public function listagemStatus(array $filtros = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_status, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][listagemStatus]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $statusId
     * @return array object
     * @throws Exception
     */
    public function dadosStatus($statusId, array $filtros = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_status . $statusId, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][dadosStatus]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /*
        $data["OrderStatus"]["status"] = "NOVO STATUS";
        $data["OrderStatus"]["default"] = "0";
     */
    
    /**
     * 
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function cadastrarStatus($data = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->post(self::uri_status, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][cadastrarStatus]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /*
        $data["OrderStatus"]["status"] = "STATUS ALTERADO";
        $data["OrderStatus"]["default"] = "0";
     */
    
    /**
     * 
     * @param int $statusId
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function atualizarDadosStatus($statusId, $data = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->put(self::uri_status . $statusId, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][atualizarDadosStatus]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $statusId
     * @return object
     * @throws Exception
     */
    public function excluirStatus($statusId) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->delete(self::uri_status . $statusId, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][excluirStatus]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /*
        $filtros["orders"] = "1,2,3,4";
    */
    
    /**
     * 
     * @param array $filtros
     * @return object
     * @throws Exception
     */
    public function etiquetasMercadoLivre(array $filtros = array()) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);
        
        $resposta = $this->get(self::uri_tracking, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Pedido][etiquetasMercadoLivre]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
}


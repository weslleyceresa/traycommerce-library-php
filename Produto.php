<?php
class Produto extends TrayEndpoints{
    const uri = "products/";
    const uri_brands = "products/brands/";
    const uri_properties = "products/properties/";
    const uri_solds = "products_solds/";
    const uri_variants = "products/variants/";
    
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

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param int $productId
     * @return object
     * @throws Exception/
     */
    public function dados($productId){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->get(self::uri . $productId, array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /*
        $data["Product"]["ean"] = "9999";
        $data["Product"]["name"] = "Produto Teste API";
        $data["Product"]["description"] = "Descrição do Produto de Teste da API";
        $data["Product"]["description_small"] = "Produto de Teste da API";
        $data["Product"]["price"] = 10.01;
        $data["Product"]["cost_price"] = 10.01;
        $data["Product"]["promotional_price"] = 10.01;
        $data["Product"]["start_promotion"] = "25-09-2014";
        $data["Product"]["end_promotion"] = "01-09-2015";
        $data["Product"]["brand"] = "Marca";
        $data["Product"]["model"] = "Modelo";
        $data["Product"]["weight"] = 1000;
        $data["Product"]["length"] = 10;
        $data["Product"]["width"] = 10;
        $data["Product"]["height"] = 10;
        $data["Product"]["stock"] = 100;
        $data["Product"]["category_id"] = "2";
        $data["Product"]["available"] = 1;
        $data["Product"]["reference"] = "111";
        $data["Product"]["payment_option"] = "";
        $data["Product"]["related_categories"] = "3,5,7";
        $data["Product"]["release_date"] = "";
        $data["Product"]["shortcut"] = "";
        $data["Product"]["virtual_product"] = "0";
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

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
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
     * @param int $productId
     * @return object
     * @throws Exception
     */
    public function atualizarDados($productId, $data = array()) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->put(self::uri . $productId, $data, $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param int $productId
     * @return object
     * @throws Exception
     */
    public function excluir($productId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->delete(self::uri . $productId, $data, $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param array $filtros
     * @return object 
     * @throws Exception
     */
    public function listagemMarcas($filtros = array()){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_brands, array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param int $brandId
     * @return object
     * @throws Exception/
     */
    public function dadosMarca($brandId){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->get(self::uri_brands . $brandId, array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /*
        $data["Brand"]["slug"] = "new-brand";
        $data["Brand"]["brand"] = "Nova Marca";
     */
    
    /**
     * 
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function cadastrarMarca($data = array()) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->put(self::uri_brands, $data, $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /*
        $data["Brand"]["slug"] = "new-brand";
        $data["Brand"]["brand"] = "Nova Marca";
     */
    
    /**
     * 
     * @param int $brandId
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function atualizarDadosMarca($brandId, $data = array()) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->put(self::uri_brands . $brandId, $data, $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param int $brandId
     * @return object
     * @throws Exception
     */
    public function excluirMarca($brandId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->delete(self::uri_brands . $brandId, $data, $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param array $filtros
     * @return object 
     * @throws Exception
     */
    public function listagemCaracterísticasProdutos($filtros = array()){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_properties, array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /*
        $data[] = ["property_id" => "1", "value" => "Branco", "index" => "0"];
        $data[] = ["property_id" => "2", "value" => "220v", "index" => "1"];
        $data[] = ["property_id" => "3", "value" => "Teste"];
     */
    
    /**
     * 
     * @param int $productId
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function cadastrarCaracterísticasProdutos($productId, $data = array()) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->put(self::uri . $productId . "/properties", $data, $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param array $filtros
     * @return object
     * @throws Exception/
     */
    public function listagemProdutosVendidos($filtros = array()){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_solds, array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param array $filtros
     * @return object
     * @throws Exception/
     */
    public function listagemVariacoes($filtros = array()){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_variants, array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param int $variantId
     * @return object
     * @throws Exception/
     */
    public function dadosVariacao($variantId){
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->get(self::uri_variants . $variantId, array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /*
        $data["Variant"]["product_id"] = 123;
        $data["Variant"]["type_1"] = "Cor";
        $data["Variant"]["value_1"] = "Preto";
        $data["Variant"]["type_2"] = "Tamanho";
        $data["Variant"]["value_2"] = "XG";
        $data["Variant"]["price"] = 12.00;
        $data["Variant"]["stock"] = 200;
        $data["Variant"]["reference"] = "";
        $data["Variant"]["weight"] = 1000;
        $data["Variant"]["length"] = 10;
        $data["Variant"]["width"] = 10;
        $data["Variant"]["height"] = 10;
        $data["Variant"]["start_promotion"] = "2014-09-25";
        $data["Variant"]["end_promotion"] = "2015-09-01";
        $data["Variant"]["promotional_price"] = 10.00;
     */
    
    /**
     * 
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function cadastrarVariacao($data = array()) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->put(self::uri_variants, $data, $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
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
     * @param int $variantId
     * @return object
     * @throws Exception
     */
    public function atualizarDadosVariacao($variantId, $data = array()) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->put(self::uri_variants . $variantId, $data, $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param int $variantId
     * @return object
     * @throws Exception
     */
    public function excluirVariacao($variantId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $query = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $resposta = $this->delete(self::uri_variants . $variantId, $data, $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
}
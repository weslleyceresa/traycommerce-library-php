<?php

namespace Traycommerce;

use Exception;
use Traycommerce\Exceptions\TrayCommerceException;
use Traycommerce\Library\BaseEndpoints;
use Traycommerce\Helpers\GlobalHelper;

class Produto extends BaseEndpoints
{
    const uri = "products/";
    const uri_brands = "products/brands/";
    const uri_properties = "products/properties/";
    const uri_solds = "products_solds/";
    const uri_variants = "products/variants/";
    const uri_imagem = "products/{id_do_produto}/images";

    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     * @param array $filtros
     * @return object
     * @throws Exception/
     */
    public function listagem(array $filtros = array())
    {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Produto][listagem]", "(" . $resposta["err"] . ") - " . $resposta["responseText"], $resposta["code"]);
    }

    /**
     *
     * @param int $productIddd
     * @return object
     * @throws Exception/
     */
    public function dados($productId, array $filtros = array())
    {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri . $productId, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Produto][dados]", "(" . $resposta["err"] . ") - " . $resposta["responseText"], $resposta["code"]);
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
    public function cadastrar($data = array())
    {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->post(self::uri, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Produto][cadastrar]", "(" . $resposta["err"] . ") - " . $resposta["responseText"], $resposta["code"]);
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
    public function atualizarDados($productId, $data = array())
    {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->put(self::uri . $productId, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Produto][atualizarDados]", "(" . $resposta["err"] . ") - " . $resposta["responseText"], $resposta["code"]);
    }

    /**
     *
     * @param int $productId
     * @return object
     * @throws Exception
     */
    public function excluir($productId)
    {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->delete(self::uri . $productId, [], $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Produto][excluir]", "(" . $resposta["err"] . ") - " . $resposta["responseText"], $resposta["code"]);
    }

    /**
     *
     * @param array $filtros
     * @return object
     * @throws Exception
     */
    public function listagemMarcas(array $filtros = array())
    {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_brands, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Produto][listagemMarcas]", "(" . $resposta["err"] . ") - " . $resposta["responseText"], $resposta["code"]);
    }

    /**
     *
     * @param int $brandId
     * @return object
     * @throws Exception/
     */
    public function dadosMarca($brandId, array $filtros = array())
    {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_brands . $brandId, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Produto][dadosMarca]", "(" . $resposta["err"] . ") - " . $resposta["responseText"], $resposta["code"]);
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
    public function cadastrarMarca($data = array())
    {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->put(self::uri_brands, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Produto][cadastrarMarca]", "(" . $resposta["err"] . ") - " . $resposta["responseText"], $resposta["code"]);
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
    public function atualizarDadosMarca($brandId, $data = array())
    {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->put(self::uri_brands . $brandId, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Produto][atualizarDadosMarca]", "(" . $resposta["err"] . ") - " . $resposta["responseText"], $resposta["code"]);
    }

    /**
     *
     * @param int $brandId
     * @return object
     * @throws Exception
     */
    public function excluirMarca($brandId)
    {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->delete(self::uri_brands . $brandId, [], $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Produto][excluirMarca]", "(" . $resposta["err"] . ") - " . $resposta["responseText"], $resposta["code"]);
    }

    /**
     *
     * @param array $filtros
     * @return object
     * @throws Exception
     */
    public function listagemCaracteristicasProdutos(array $filtros = array())
    {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_properties, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Produto][listagemCaracterísticasProdutos]", "(" . $resposta["err"] . ") - " . $resposta["responseText"], $resposta["code"]);
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
    public function cadastrarCaracteristicasProdutos($productId, $data = array())
    {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->post(self::uri . $productId . "/properties", $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Produto][cadastrarCaracterísticasProdutos]", "(" . $resposta["err"] . ") - " . $resposta["responseText"], $resposta["code"]);
    }

    /**
     *
     * @param array $filtros
     * @return object
     * @throws Exception/
     */
    public function listagemProdutosVendidos(array $filtros = array())
    {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_solds, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Produto][listagemProdutosVendidos]", "(" . $resposta["err"] . ") - " . $resposta["responseText"], $resposta["code"]);
    }

    /**
     *
     * @param array $filtros
     * @return object
     * @throws Exception/
     */
    public function listagemVariacoes(array $filtros = array())
    {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_variants, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Produto][listagemVariacoes]", "(" . $resposta["err"] . ") - " . $resposta["responseText"], $resposta["code"]);
    }

    /**
     *
     * @param int $variantId
     * @return object
     * @throws Exception/
     */
    public function dadosVariacao($variantId, array $filtros = array())
    {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_variants . $variantId, array(), $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Produto][dadosVariacao]", "(" . $resposta["err"] . ") - " . $resposta["responseText"], $resposta["code"]);
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
    public function cadastrarVariacao($data = array())
    {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->post(self::uri_variants, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Produto][cadastrarVariacao]", "(" . $resposta["err"] . ") - " . $resposta["responseText"], $resposta["code"]);
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
    public function atualizarDadosVariacao($variantId, $data = array())
    {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->put(self::uri_variants . $variantId, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Produto][atualizarDadosVariacao]", "(" . $resposta["err"] . ") - " . $resposta["responseText"], $resposta["code"]);
    }

    /**
     *
     * @param int $variantId
     * @return object
     * @throws Exception
     */
    public function excluirVariacao($variantId)
    {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->delete(self::uri_variants . $variantId, $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Produto][excluirVariacao]", "(" . $resposta["err"] . ") - " . $resposta["responseText"], $resposta["code"]);
    }


    /**
     *
     * @param array $data
     * @return object
     * @throws Exception
     */
    public function cadastrarImagens($productId, $data = array())
    {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $resposta = $this->post(str_replace('{id_do_produto}', $productId, self::uri_imagem), $data, $query);

        if (GlobalHelper::success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Produto][cadastrar]['imagens]", "(" . $resposta["err"] . ") - " . $resposta["responseText"], $resposta["code"]);
    }
}
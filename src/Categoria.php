<?php
namespace Traycommerce;

use Traycommerce\Exceptions\TrayCommerceException;
use Traycommerce\Library\BaseEndpoints;
use function success;

class Categoria extends BaseEndpoints {

    const uri = "categories/";
    const uri_tree = "categories/tree/";

    public function __construct() {
        parent::__construct();
    }

    public function consultarCategorias($filtros = []) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()
        );

        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Categoria][consultarCategorias]", $resposta["data"], $resposta["code"]);
    }

    public function consultarArvoreCategorias($filtros = []) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()
        );

        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_tree, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Categoria][consultarArvoreCategorias]", $resposta["data"], $resposta["code"]);
    }

    public function consultarDadosCategoria($categoriaId, $filtros = []) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()
        );

        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri . $categoriaId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Categoria][consultarDadosCategoria]", $resposta["data"], $resposta["code"]);
    }

    public function cadastrarCategoria($data = []) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()
        );
        
        $resposta = $this->post(self::uri, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Categoria][cadastrarCategoria]", $resposta["data"], $resposta["code"]);
    }
    
    public function atualizarCategoria($data = []) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()
        );
        
        $resposta = $this->put(self::uri, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Categoria][atualizarCategoria]", $resposta["data"], $resposta["code"]);
    }
    
    public function excluirCategoria($idCategoria) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()
        );
        
        $resposta = $this->delete(self::uri, array(), $query);
        
        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Categoria][excluirCategoria]", $resposta["data"], $resposta["code"]);
    }

}

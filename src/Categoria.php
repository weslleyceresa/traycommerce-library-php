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

    public function consultarCategorias(array $filtros = []) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Categoria][consultarCategorias]", $resposta["responseText"], $resposta["code"]);
    }

    public function consultarArvoreCategorias(array $filtros = []) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_tree, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Categoria][consultarArvoreCategorias]", $resposta["responseText"], $resposta["code"]);
    }

    public function consultarDadosCategoria($categoriaId, array $filtros = []) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );

        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri . $categoriaId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Categoria][consultarDadosCategoria]", $resposta["responseText"], $resposta["code"]);
    }

    public function cadastrarCategoria($data = []) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->post(self::uri, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Categoria][cadastrarCategoria]", $resposta["responseText"], $resposta["code"]);
    }
    
    public function atualizarCategoria($data = []) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->put(self::uri, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Categoria][atualizarCategoria]", $resposta["responseText"], $resposta["code"]);
    }
    
    public function excluirCategoria($idCategoria) {
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $resposta = $this->delete(self::uri, array(), $query);
        
        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Categoria][excluirCategoria]", $resposta["responseText"], $resposta["code"]);
    }

}

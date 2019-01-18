<?php
namespace Traycommerce;

use Traycommerce\Entity\Token;
use Traycommerce\Exceptions\TrayCommerceException;
use Traycommerce\Library\BaseEndpoints;
use function success;

class Categoria extends BaseEndpoints {

    const uri = "categories/";
    const uri_tree = "categories/tree/";

    public function __construct(Token $token) {
        parent::__construct($token);
    }

    public function consultarCategorias($filtros = []) {
        $this->checkValidToken();

        $query = array(
            "access_token" => $this->token->getAccess_token()
        );

        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Categoria][consultarCategorias]", $resposta["data"], $resposta["code"]);
    }

    public function consultarArvoreCategorias($filtros = []) {
        $this->checkValidToken();

        $query = array(
            "access_token" => $this->token->getAccess_token()
        );

        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri_tree, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Categoria][consultarArvoreCategorias]", $resposta["data"], $resposta["code"]);
    }

    public function consultarDadosCategoria($categoriaId, $filtros = []) {
        $this->checkValidToken();

        $query = array(
            "access_token" => $this->token->getAccess_token()
        );

        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri . $categoriaId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Categoria][consultarDadosCategoria]", $resposta["data"], $resposta["code"]);
    }

    public function cadastrarCategoria($data = []) {
        $this->checkValidToken();

        $query = array(
            "access_token" => $this->token->getAccess_token()
        );
        
        $resposta = $this->post(self::uri, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Categoria][cadastrarCategoria]", $resposta["data"], $resposta["code"]);
    }
    
    public function atualizarCategoria($data = []) {
        $this->checkValidToken();

        $query = array(
            "access_token" => $this->token->getAccess_token()
        );
        
        $resposta = $this->put(self::uri, $data, $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Categoria][atualizarCategoria]", $resposta["data"], $resposta["code"]);
    }
    
    public function excluirCategoria($idCategoria) {
        $this->checkValidToken();

        $query = array(
            "access_token" => $this->token->getAccess_token()
        );
        
        $resposta = $this->delete(self::uri, array(), $query);
        
        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[Categoria][excluirCategoria]", $resposta["data"], $resposta["code"]);
    }

}

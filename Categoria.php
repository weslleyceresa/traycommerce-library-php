<?php

class Categoria extends TrayEndpoints {

    const uri = "categories/";

    public function __construct(Auth $auth) {
        parent::__construct($auth);
    }

    public function consultarCategorias($filtros = []) {
        if (!$this->auth->estaAutorizado()) {
            throw Exception("A API não foi autorizada");
        }

        $query = array_merge(["access_token" => $this->auth->getAccessToken()], $filtros);

        $resposta = $this->get(self::uri, array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        } else {
            throw new Exception($resposta['data']->causes[0], $resposta['code']);
        }
    }

    public function consultarArvoreCategorias($filtros = []) {
        $uri = self::uri . "tree/";

        if (!$this->auth->estaAutorizado()) {
            throw Exception("A API não foi autorizada");
        }

        $query = array_merge(["access_token" => $this->auth->getAccessToken()], $filtros);

        $resposta = $this->get($uri . $categoriaId, array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        } else {
            throw new Exception($resposta['data']->causes[0], $resposta['code']);
        }
    }

    public function consultarDadosCategoria($categoriaId, $filtros = []) {
        if (!$this->auth->estaAutorizado()) {
            throw Exception("A API não foi autorizada");
        }

        $query = array_merge(["access_token" => $this->auth->getAccessToken()], $filtros);

        $resposta = $this->get(self::uri . $categoriaId, array(), $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        } else {
            throw new Exception($resposta['data']->causes[0], $resposta['code']);
        }
    }

    public function cadastrarCategoria($data = []) {
        if (!$this->auth->estaAutorizado()) {
            throw Exception("A API não foi autorizada");
        }
        
        $query = [
            "access_token" => $this->auth->getAccessToken()
        ];
        
        $resposta = $this->post(self::uri, $data, $query);

        if ($resposta["code"] == 201) {
            return $resposta["data"];
        } else {
            throw new Exception('Erro ao cadastrar categoria');
        }
    }
    
    public function atualizarCategoria($data = []) {
        if (!$this->auth->estaAutorizado()) {
            throw Exception("A API não foi autorizada");
        }
        
        $query = [
            "access_token" => $this->auth->getAccessToken()
        ];
        
        $resposta = $this->put(self::uri, $data, $query);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        } else {
            throw new Exception('Erro ao atualizar categoria');
        }
    }
    
    public function excluirCategoria($idCategoria) {
        if (!$this->auth->estaAutorizado()) {
            throw Exception("A API não foi autorizada");
        }
        
        $query = [
            "access_token" => $this->auth->getAccessToken()
        ];
        
        $resposta = $this->delete(self::uri, array(), $query);
        
        if ($resposta["code"] == 200) {
            return $resposta["data"];
        } else {
            throw new Exception('Erro ao excluir categoria');
        }
    }

}

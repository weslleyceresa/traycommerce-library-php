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

        $get = array_merge(["access_token" => $this->auth->getAccessToken()], $filtros);

        $resposta = $this->get(self::uri, $get);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        } else {
            throw new Exception($resposta['data']->causes[0], $resposta['code']);
        }
    }

    public function consultarArvoreCategorias($categoriaId = "") {
        $uri = self::uri . "tree/";

        if (!$this->auth->estaAutorizado()) {
            throw Exception("A API não foi autorizada");
        }

        $get = [
            "access_token" => $this->auth->getAccessToken()
        ];

        $resposta = $this->get($uri . $categoriaId, $get);

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

        $get = array_merge(["access_token" => $this->auth->getAccessToken()], $filtros);

        $resposta = $this->get(self::uri . $categoriaId, $get);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        } else {
            throw new Exception($resposta['data']->causes[0], $resposta['code']);
        }
    }

    public function cadastrarCategoria($data) {
        if (!$this->auth->estaAutorizado()) {
            throw Exception("A API não foi autorizada");
        }
        
        $post = array_merge(["access_token" => $this->auth->getAccessToken()], $data);
        
        $resposta = $this->post(self::uri, $post);

        if ($resposta["code"] == 201) {
            return $resposta["data"];
        } else {
            throw new Exception('Erro ao cadastrar categoria');
        }
    }
    
    public function atualizarCategoria($data) {
        if (!$this->auth->estaAutorizado()) {
            throw Exception("A API não foi autorizada");
        }
        
        $put = array_merge(["access_token" => $this->auth->getAccessToken()], $data);
        
        $resposta = $this->put(self::uri, $put);

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
        
        $delete = array_merge(["access_token" => $this->auth->getAccessToken()], $idCategoria);
        
        $resposta = $this->delete(self::uri, $delete);
        
        if ($resposta["code"] == 200) {
            return $resposta["data"];
        } else {
            throw new Exception('Erro ao excluir categoria');
        }
    }

}

<?php
class Pedido extends TrayEndpoints{
    const uri = "orders/";
    
    public function __construct(\Auth $auth) {
        parent::__construct($auth);
    }
    
    /**
     * 
     * @param type $filtros
     * @return type object
     * @throws Exception
     */
    public function listagem($filtros = array()) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );
        
        $post = array_merge($post, $filtros);

        $resposta = $this->get(self::uri, $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param type $pedidoId
     * @return type object
     * @throws Exception
     */
    public function dados($pedidoId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->get(self::uri . $pedidoId, $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
    
    /**
     * 
     * @param type $pedidoId
     * @return type object
     * @throws Exception
     */
    public function dadosCompleto($pedidoId) {
        if (!$this->auth->estaAutorizado())
            throw new Exception("A API não foi autorizada");

        $post = array(
            "access_token" => $this->auth->getAccessToken()
        );

        $resposta = $this->get(self::uri . $pedidoId . "/complete", $post);

        if ($resposta["code"] == 200) {
            return $resposta["data"];
        }

        return null;
    }
}
?>


<?php
namespace Traycommerce;

class PalavrasChave extends BaseEndpoints{
    const uri = "words/";
    
    public function __construct(Token $token) {
        parent::__construct($token);
    }
    
    /**
     * 
     * @param array $filtros
     * @return object
     * @throws Exception/
     */
    public function listagem($filtros = array()){
        $this->checkValidToken();

        $query = array(
            "access_token" => $this->token->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[PalavrasChave][listagem]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $wordId
     * @return object
     * @throws Exception/
     */
    public function dados($wordId){
        $this->checkValidToken();

        $query = array(
            "access_token" => $this->token->getAccess_token()
        );

        $resposta = $this->get(self::uri . $wordId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[PalavrasChave][dados]", $resposta["data"], $resposta["code"]);
    }
}

<?php
namespace Traycommerce;

use Traycommerce\Entity\Token;
use Traycommerce\Exceptions\TrayCommerceException;
use Traycommerce\Library\BaseEndpoints;
use function success;

class Produto extends BaseEndpoints{
    const uri = "custom_pages/";
    
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

        throw new TrayCommerceException("[PaginasLoja][listagem]", $resposta["data"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $pageId
     * @return object
     * @throws Exception/
     */
    public function dados($pageId){
        $this->checkValidToken();

        $query = array(
            "access_token" => $this->token->getAccess_token()
        );

        $resposta = $this->get(self::uri . $pageId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[PaginasLoja][dados]", $resposta["data"], $resposta["code"]);
    }
}

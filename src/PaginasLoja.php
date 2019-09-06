<?php
namespace Traycommerce;

use Traycommerce\Exceptions\TrayCommerceException;
use Traycommerce\Library\BaseEndpoints;
use function success;

class PaginasLoja extends BaseEndpoints{
    const uri = "custom_pages/";
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * 
     * @param array $filtros
     * @return object
     * @throws Exception/
     */
    public function listagem(array $filtros = array()){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[PaginasLoja][listagem]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
    
    /**
     * 
     * @param int $pageId
     * @return object
     * @throws Exception/
     */
    public function dados($pageId, array $filtros = array()){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri . $pageId, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[PaginasLoja][dados]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
}

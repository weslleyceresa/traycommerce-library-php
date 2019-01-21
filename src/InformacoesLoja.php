<?php
namespace Traycommerce;

use Traycommerce\Exceptions\TrayCommerceException;
use Traycommerce\Library\BaseEndpoints;
use function success;

class InformacoesLoja extends BaseEndpoints{
    const uri = "info/";
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * 
     * @return object
     * @throws Exception/
     */
    public function dados(array $filtros = array()){
        $this->trayCommerceController->checkValidToken();

        $query = array(
            "access_token" => $this->trayCommerceController->getToken()->getAccess_token()
        );
        
        $query = array_merge($query, $filtros);

        $resposta = $this->get(self::uri, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[InformacoesLoja][dados]", $resposta["data"], $resposta["code"]);
    }
}

<?php
namespace Traycommerce;

use Traycommerce\Entity\Token;
use Traycommerce\Exceptions\TrayCommerceException;
use Traycommerce\Library\BaseEndpoints;
use function success;

class Produto extends BaseEndpoints{
    const uri = "info/";
    
    public function __construct(Token $token) {
        parent::__construct($token);
    }
    
    /**
     * 
     * @return object
     * @throws Exception/
     */
    public function dados(){
        $this->checkValidToken();

        $query = array(
            "access_token" => $this->token->getAccess_token()
        );

        $resposta = $this->get(self::uri, array(), $query);

        if (success($resposta["code"])) {
            return $resposta["data"];
        }

        throw new TrayCommerceException("[InformacoesLoja][dados]", $resposta["data"], $resposta["code"]);
    }
}

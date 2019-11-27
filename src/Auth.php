<?php
namespace Traycommerce;

use Traycommerce\Entity\Token;
use Traycommerce\Exceptions\TrayCommerceException;
use Traycommerce\Library\HttpTray;
use function success;

class Auth extends HttpTray {
    const uri_authorize = "auth.php"; 
    const uri = "auth/";
    
    public function __construct() {
        parent::__construct();
    }

    public function solicitarAutorizacao($consumerKey, $callbackUrl, $storeUrl) {
        $get = array(
            "response_type" => "code",
            "consumer_key" => $consumerKey,
            "callback" => $callbackUrl
        );

        header("Location: " . $storeUrl . self::uri_authorize . "?" . http_build_query($get));
    }

    public function gerarChaveAcesso($consumerKey, $consumerSecret, $code, $apiAddress) {
        parent::setBaseUrlApi($apiAddress);

        $data = array(
            "consumer_key" => $consumerKey,
            "consumer_secret" => $consumerSecret,
            "code" => $code
        );

        $resposta = $this->post(self::uri, $data, array());

        if (!success($resposta["code"])) {
            throw new TrayCommerceException("[Auth][gerarChaveAcesso]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
        }
        
        $token = new Token();
        $token
            ->setDate_activated($resposta["data"]->date_activated)
            ->setCode($resposta["data"]->code)
            ->setMessage($resposta["data"]->message)
            ->setAccess_token($resposta["data"]->access_token)
            ->setRefresh_token($resposta["data"]->refresh_token)
            ->setDate_expiration_access_token($resposta["data"]->date_expiration_access_token)
            ->setDate_expiration_refresh_token($resposta["data"]->date_expiration_refresh_token)
            ->setStore_id($resposta["data"]->store_id);
        
        return $token;
    }

    public function atualizarChaveAcesso($refreshToken, $apiAddress) {
        $query = array(
            "refresh_token" => $refreshToken
        );

        parent::setBaseUrlApi($apiAddress);

        $resposta = $this->get(self::uri, array(), $query);

        if (success($resposta["code"])) {
            $token = new Token();

            $token
                ->setDate_activated($resposta["data"]->date_activated)
                ->setCode($resposta["data"]->code)
                ->setMessage($resposta["data"]->message)
                ->setAccess_token($resposta["data"]->access_token)
                ->setRefresh_token($resposta["data"]->refresh_token)
                ->setDate_expiration_access_token($resposta["data"]->date_expiration_access_token)
                ->setDate_expiration_refresh_token($resposta["data"]->date_expiration_refresh_token)
                ->setStore_id($resposta["data"]->store_id);

            return $token;
        }

        throw new TrayCommerceException("[Auth][atualizarChaveAcesso]", "(".$resposta["err"].") - ".$resposta["responseText"], $resposta["code"]);
    }
}

?>
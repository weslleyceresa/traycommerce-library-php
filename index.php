<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('America/Sao_Paulo');

include "./src/TrayCommerce.php";
include "./src/TrayEndpoints.php";
include "./Auth.php";
include "./CarrinhoCompra.php";
include "./Pedido.php";

try {

    $auth = new Auth(array(
        "callback" => "http://xxxxxxxxxxxxx/index.php",
        "consumer_key" => "xxxxxxxxxxxxxxxxxxxx",
        "consumer_secret" => "xxxxxxxxxxxxxxxxxxxxxxxx",
        "store_url" => "https://www.xxxxxxxxxx.com.br/",
    ));

    if (isset($_GET["code"])) {
        $auth->gerarChaveAcesso($_GET["code"], $_GET["api_address"]);

        $carrinho = new CarrinhoCompra($auth);
        
        $pedido = new Pedido($auth);        

        echo '<pre>';
        print_r($carrinho->consultarDados("c8qk221u7bn3pu8qngh2bhcc46"));
        echo '</pre>';
    } else {
        $auth->solicitarAutorizacao();
    }
} catch (Exception $ex) {
    print_r($ex);
}
?>
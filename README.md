# Biblioteca TrayCommerce
Biblioteca PHP v5.6 para manipulação da API da Tray

# Como utilizar

```php
<?php

use Traycommerce\CarrinhoCompra;
use Traycommerce\Library\TrayCommerceController;
use Traycommerce\Pedido;

error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('America/Sao_Paulo');

//criar instancia do controlador da api
$trayCommerceController = TrayCommerceController::getInstance();

//carregar informações do controlador
$trayCommerceController
        ->setConsumerKey("")
        ->setConsumerSecret("")
        ->setCallBackUrl("")
        ->setStoreUrl("");

//verificar se a loja ja autorizou a aplicação e 
//setar as configurações de autorização
if($_GET["code"]){
    $trayCommerceController
            ->setCode($_GET["code"])
            ->setApiUrl($_GET["base_url_api"]);
}

//autorizar a aplicação para gerar um token
$trayCommerceController->authorizeApplication();

$trayCommerceController->onBeforeRefreshToken(function($currentToken){
    
});

$trayCommerceController->onRefreshedToken(function($newToken){
    
});

//somente apos os passos anteriores carregar os metodos da api
$apiCarrinhoCompra = new CarrinhoCompra();

$cartData = $apiCarrinhoCompra->consultarDados("asdsdasdad");

$apiCarrinhoCompra->atualizarDados();

$apiPedido = new Pedido();

$apiPedido->atualizarDados($orderId);
```

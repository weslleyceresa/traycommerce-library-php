# Biblioteca TrayCommerce
Biblioteca PHP v5.6 para manipulação da API da Tray

# Como utilizar

```php
<?php

use Traycommerce\CarrinhoCompra;
use Traycommerce\Library\TrayCommerceController;

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
            ->setApiUrl($_GET["api_address"]);
}

$trayCommerceController->onBeforeRefreshToken(function($currentToken){
    
});

$trayCommerceController->onRefreshedToken(function($newToken){
    //atualizar banco
});

//autorizar a aplicação para gerar um token
$trayCommerceController->authorizeApplication();

//somente apos os passos anteriores carregar os metodos da api
$apiCarrinhoCompra = new CarrinhoCompra();

$cartData = $apiCarrinhoCompra->consultarDados("asdsdasdad");

var_dump($cartData);
```

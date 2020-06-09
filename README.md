# SDK Api TrayCommerce
SDK para manipulação da API da Tray em PHP

#### Como instalar - Via composer

```bash
$ composer require traycommerce/traycommerce
```

#### Exemplo para gerar autorizar a aplicação

```php
<?php
require __DIR__."/../vendor/autoload.php";

use Traycommerce\Library\TrayCommerceController;

error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('America/Sao_Paulo');

//criar instancia do controlador da api
$trayCommerceController = TrayCommerceController::getInstance();

//carregar informações do controlador
$trayCommerceController
    ->setConsumerKey("SEU CONSUMER KEY")
    ->setConsumerSecret("SEU CONSUMER SECRET")
    ->setCallBackUrl("URL QUE A TRAY VAI VOLTAR DEPOIS DO LOGISTA AUTORIZAR SUA APLICAÇÂO")
    ->setStoreUrl("URL DA LOJA QUE SERA EXECUTADA SUA APLICAÇÂO");

$trayCommerceController->onBeforeRefreshToken(function($currentToken){
    //Evento disparado ANTES de gerar o token
});

$trayCommerceController->onRefreshedToken(function($newToken){
    //Evento disparado DEPOIS de gerar o token
    
    //Aqui você poder guardar o token no banco ou em arquivo
    
    //Ex arquivo se usar um cast (string) a entidade do token vira um json
    //{"code":200,"message":"Token already exists.","date_activated":"2020-04-03 09:50:02","api_host":"https:\/\/www.XXXXXXX.com.br\/web_api","access_token":"XXXXXXXXXXXXXXXXXXXXXXX","refresh_token":"XXXXXXXXXXXXXXXXXXXXXXXXX","date_expiration_access_token":"2020-04-03 12:45:02","date_expiration_refresh_token":"2020-05-03 09:45:02","store_id":"XXXXXX","addTimeToNow":null}
    $tokenString = (string)$newToken;
    file_put_contents("./token/token.json", $tokenString);
    
    //ex banco voce percisa guardar todo o token
});

//verificar se a loja ja autorizou a aplicação e 
//setar as configurações de autorização
if(isset($_GET["code"])){

    try{
        $trayCommerceController
            ->setCode($_GET["code"])
            ->setApiUrl($_GET["api_address"])
            ->checkValidToken();
    }catch(\Exception $ex){

    }
    
}
else{
    //autorizar a aplicação para gerar um token
    $trayCommerceController->authorizeApplication();
}
```
    
#### GETTERS e SETTERS do objeto de Token

```php
//todos os dados do token sao obrigatorios na SDK

$tokenString = json_decode($tokenString);

$token = new Token();

$token->setAccess_token($tokenString->access_token)
    ->setApi_host($tokenString->api_host)
    ->setCode($tokenString->code)
    ->setDate_activated($tokenString->date_activated)
    ->setDate_expiration_access_token($tokenString->date_expiration_access_token)
    ->setDate_expiration_refresh_token($tokenString->date_expiration_refresh_token)
    ->setMessage($tokenString->message)
    ->setRefresh_token($tokenString->refresh_token)
    ->setStore_id($tokenString->store_id);

// ou passar direto a string do token por parametro do objeto

$token = new Token($tokenString);

$this->getAccess_token();
$this->getApi_host();
$this->getCode();
$this->getDate_expiration_refresh_token();
$this->getMessage();
$this->getRefresh_token();
$this->getStore_id();
```
    
#### Usando o SDK - Exemplo a partir do arquivo do token

```php
<?php
require __DIR__."/../vendor/autoload.php";

use Traycommerce\Entity\Token;
use Traycommerce\Library\TrayCommerceController;

error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('America/Sao_Paulo');

$tokenString = @file_get_contents("./token/token.json");

if(empty($tokenString))
    throw new Exception("Token não foi gerado!!!");

//criar instancia do controlador da api
$trayCommerceController = TrayCommerceController::getInstance();

$token = new Token($tokenString);

//carregar informações do controlador
$trayCommerceController
    ->enableReadOnly() //importante sempre setar que o modo de uso de leitura
    ->setToken($token);
```
    
#### Usando o SDK - Exemplo a partir do banco

```php
<?php
require __DIR__."/../vendor/autoload.php";

use Traycommerce\Entity\Token;
use Traycommerce\Library\TrayCommerceController;

error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('America/Sao_Paulo');

$tokenDb = $this->db->get("token")->row();

//criar instancia do controlador da api
$trayCommerceController = TrayCommerceController::getInstance();

$token = new Token();
        
$token
    ->setCode($tokenDb->code)
    ->setMessage($tokenDb->message)
    ->setApi_host($tokenDb->apiHost)
    ->setDate_activated($tokenDb->dateActivated)
    ->setAccess_token($tokenDb->accessToken)
    ->setRefresh_token($tokenDb->refreshToken)
    ->setDate_expiration_access_token($tokenDb->dateExpirationAccessToken)
    ->setDate_expiration_refresh_token($tokenDb->dateExpirationRefreshToken)
    ->setStore_id($tokenDb->storeId);

//carregar informações do controlador
$trayCommerceController
    ->enableReadOnly() //importante sempre setar que o modo de uso de leitura
    ->setToken($token);
```

#### Usando o SDK - Buscando detalhes de um produto

```php
<?php
require __DIR__."/../vendor/autoload.php";

use Traycommerce\Entity\Token;
use Traycommerce\Library\TrayCommerceController;

error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('America/Sao_Paulo');

$tokenDb = $this->db->get("token")->row();

//criar instancia do controlador da api
$trayCommerceController = TrayCommerceController::getInstance();

$token = new Token();
        
$token
    ->setCode($tokenDb->code)
    ->setMessage($tokenDb->message)
    ->setApi_host($tokenDb->apiHost)
    ->setDate_activated($tokenDb->dateActivated)
    ->setAccess_token($tokenDb->accessToken)
    ->setRefresh_token($tokenDb->refreshToken)
    ->setDate_expiration_access_token($tokenDb->dateExpirationAccessToken)
    ->setDate_expiration_refresh_token($tokenDb->dateExpirationRefreshToken)
    ->setStore_id($tokenDb->storeId);

//carregar informações do controlador
$trayCommerceController
    ->enableReadOnly() //importante sempre setar que o modo de uso de leitura
    ->setToken($token);

//---

$apiProduto = new Traycommerce\Produto();

$apiProdutoResponse = $apiProduto->dados("CODIGO DO PRODUTO");

echo '<pre>';
print_r($apiProdutoResponse);
echo '</pre>';

```
    
#### Manual dos metodos

[Acessar manual das classes](https://github.com/weslleyceresa/traycommerce-library-php/tree/master/src "Acessar manual das classes")
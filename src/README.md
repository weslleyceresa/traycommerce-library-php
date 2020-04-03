# Manual técnico do SDK

## Parametros base
```php

//Parametro array $data=array()

//Utilizar para passar os dados de entrada da API

//Exemplo - https://traydevelopers.zendesk.com/hc/pt-br/articles/360016108373-Products-Cadastrar-Produto

$apiProduto = new Traycommerce\Produto();

$apiProdutoResponse = $apiProduto->cadastrar(array(
    "name" => "PRODUTO ABC"
));

//Parametro array $filtros=array()

//Utilizar para passar os dados na url da API

//Exemplo - https://traydevelopers.zendesk.com/hc/pt-br/articles/360015937534-Products-Consultar-Dados-do-Produto

$apiProduto = new Traycommerce\Produto();

$apiProdutoResponse = $apiProduto->dados("CODIGO DO PRODUTO", array(
    "attrs" => "Product.id,Product.name"
));

//é utilizado http_build_query

//vai resultar em https://{api_address}/products/:id?attrs=Product.id,Product.name

```

## Table of contents

- [\Traycommerce\Categoria](#class-traycommercecategoria)
- [\Traycommerce\AdditionalInformation](#class-traycommerceadditionalinformation)
- [\Traycommerce\Pagamento](#class-traycommercepagamento)
- [\Traycommerce\CupomDisconto](#class-traycommercecupomdisconto)
- [\Traycommerce\Newsletter](#class-traycommercenewsletter)
- [\Traycommerce\Parceiro](#class-traycommerceparceiro)
- [\Traycommerce\Frete](#class-traycommercefrete)
- [\Traycommerce\InformacoesLoja](#class-traycommerceinformacoesloja)
- [\Traycommerce\ProgressiveDiscount](#class-traycommerceprogressivediscount)
- [\Traycommerce\Auth](#class-traycommerceauth)
- [\Traycommerce\Produto](#class-traycommerceproduto)
- [\Traycommerce\LocaisVenda](#class-traycommercelocaisvenda)
- [\Traycommerce\CarrinhoCompra](#class-traycommercecarrinhocompra)
- [\Traycommerce\PaginasLoja](#class-traycommercepaginasloja)
- [\Traycommerce\PalavrasChave](#class-traycommercepalavraschave)
- [\Traycommerce\Pedido](#class-traycommercepedido)
- [\Traycommerce\ScriptsExternos](#class-traycommercescriptsexternos)
- [\Traycommerce\Cliente](#class-traycommercecliente)
- [\Traycommerce\Library\HttpTray](#class-traycommercelibraryhttptray)
- [\Traycommerce\Library\BaseEndpoints](#class-traycommercelibrarybaseendpoints)

<hr />

### Class: \Traycommerce\Categoria

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>atualizarCategoria(</strong><em>array</em> <strong>$data=array()</strong>)</strong> : <em>void</em> |
| public | <strong>cadastrarCategoria(</strong><em>array</em> <strong>$data=array()</strong>)</strong> : <em>void</em> |
| public | <strong>consultarArvoreCategorias(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>void</em> |
| public | <strong>consultarCategorias(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>void</em> |
| public | <strong>consultarDadosCategoria(</strong><em>mixed</em> <strong>$categoriaId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>void</em> |
| public | <strong>excluirCategoria(</strong><em>mixed</em> <strong>$categoriaId</strong>)</strong> : <em>void</em> |

*This class extends [\Traycommerce\Library\BaseEndpoints](#class-traycommercelibrarybaseendpoints)*

<hr />

### Class: \Traycommerce\AdditionalInformation

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>criar(</strong><em>array</em> <strong>$data</strong>)</strong> : <em>object</em> |
| public | <strong>detalhes(</strong><em>int</em> <strong>$additionInfoId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>editar(</strong><em>mixed</em> <strong>$additionInfoId</strong>, <em>array</em> <strong>$data</strong>)</strong> : <em>object</em> |
| public | <strong>listar(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>remover(</strong><em>int</em> <strong>$additionInfoId</strong>)</strong> : <em>object</em> |

*This class extends [\Traycommerce\Library\BaseEndpoints](#class-traycommercelibrarybaseendpoints)*

<hr />

### Class: \Traycommerce\Pagamento

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>atualizarDados(</strong><em>int</em> <strong>$paymentId</strong>, <em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>cadastrar(</strong><em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>configuracoes()</strong> : <em>object</em> |
| public | <strong>dados(</strong><em>int</em> <strong>$paymentId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>excluir(</strong><em>int</em> <strong>$paymentId</strong>)</strong> : <em>object</em> |
| public | <strong>listagem(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>opcoes(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |

*This class extends [\Traycommerce\Library\BaseEndpoints](#class-traycommercelibrarybaseendpoints)*

<hr />

### Class: \Traycommerce\CupomDisconto

| Visibility | Function |
|:-----------|:---------|
| public | <strong>cadastrar(</strong><em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>categoriasRelacionadas(</strong><em>int</em> <strong>$couponId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>clientesRelacionados(</strong><em>int</em> <strong>$couponId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>dados(</strong><em>int</em> <strong>$couponId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>excluir(</strong><em>int</em> <strong>$couponId</strong>)</strong> : <em>object</em> |
| public | <strong>excluirRelacionados(</strong><em>int</em> <strong>$couponId</strong>, <em>array</em> <strong>$data</strong>)</strong> : <em>object</em> |
| public | <strong>fretesRelacionados(</strong><em>int</em> <strong>$couponId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>limitar(</strong><em>int</em> <strong>$couponId</strong>, <em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>listagem(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>marcasRelacionadas(</strong><em>int</em> <strong>$couponId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>produtosRelacionados(</strong><em>int</em> <strong>$couponId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>setarComoTroca(</strong><em>int</em> <strong>$couponId</strong>, <em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |

*This class extends [\Traycommerce\Library\BaseEndpoints](#class-traycommercelibrarybaseendpoints)*

<hr />

### Class: \Traycommerce\Newsletter

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>cadastrar(</strong><em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>confirmar(</strong><em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>listagem(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |

*This class extends [\Traycommerce\Library\BaseEndpoints](#class-traycommercelibrarybaseendpoints)*

<hr />

### Class: \Traycommerce\Parceiro

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>atualizarDados(</strong><em>int</em> <strong>$partnerId</strong>, <em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>cadastrar(</strong><em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>dados(</strong><em>int</em> <strong>$partnerId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>excluir(</strong><em>int</em> <strong>$partnerId</strong>)</strong> : <em>object</em> |
| public | <strong>listagem(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |

*This class extends [\Traycommerce\Library\BaseEndpoints](#class-traycommercelibrarybaseendpoints)*

<hr />

### Class: \Traycommerce\Frete

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>calculo(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>listagemFormasEnvio(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |

*This class extends [\Traycommerce\Library\BaseEndpoints](#class-traycommercelibrarybaseendpoints)*

<hr />

### Class: \Traycommerce\InformacoesLoja

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>dados(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |

*This class extends [\Traycommerce\Library\BaseEndpoints](#class-traycommercelibrarybaseendpoints)*

<hr />

### Class: \Traycommerce\ProgressiveDiscount

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>dados(</strong><em>int</em> <strong>$id</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>listagem(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |

*This class extends [\Traycommerce\Library\BaseEndpoints](#class-traycommercelibrarybaseendpoints)*

<hr />

### Class: \Traycommerce\Auth

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>atualizarChaveAcesso(</strong><em>mixed</em> <strong>$refreshToken</strong>, <em>mixed</em> <strong>$apiAddress</strong>)</strong> : <em>void</em> |
| public | <strong>gerarChaveAcesso(</strong><em>mixed</em> <strong>$consumerKey</strong>, <em>mixed</em> <strong>$consumerSecret</strong>, <em>mixed</em> <strong>$code</strong>, <em>mixed</em> <strong>$apiAddress</strong>)</strong> : <em>void</em> |
| public | <strong>solicitarAutorizacao(</strong><em>mixed</em> <strong>$consumerKey</strong>, <em>mixed</em> <strong>$callbackUrl</strong>, <em>mixed</em> <strong>$storeUrl</strong>)</strong> : <em>void</em> |

*This class extends [\Traycommerce\Library\HttpTray](#class-traycommercelibraryhttptray)*

<hr />

### Class: \Traycommerce\Produto

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>atualizarDados(</strong><em>int</em> <strong>$productId</strong>, <em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>atualizarDadosMarca(</strong><em>int</em> <strong>$brandId</strong>, <em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>atualizarDadosVariacao(</strong><em>int</em> <strong>$variantId</strong>, <em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>cadastrar(</strong><em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>cadastrarCaracteristicasProdutos(</strong><em>int</em> <strong>$productId</strong>, <em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>cadastrarMarca(</strong><em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>cadastrarVariacao(</strong><em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>dados(</strong><em>mixed</em> <strong>$productId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>dadosMarca(</strong><em>int</em> <strong>$brandId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>dadosVariacao(</strong><em>int</em> <strong>$variantId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>excluir(</strong><em>int</em> <strong>$productId</strong>)</strong> : <em>object</em> |
| public | <strong>excluirMarca(</strong><em>int</em> <strong>$brandId</strong>)</strong> : <em>object</em> |
| public | <strong>excluirVariacao(</strong><em>int</em> <strong>$variantId</strong>)</strong> : <em>object</em> |
| public | <strong>listagem(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>listagemCaracteristicasProdutos(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>listagemMarcas(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>listagemProdutosVendidos(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>listagemVariacoes(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |

*This class extends [\Traycommerce\Library\BaseEndpoints](#class-traycommercelibrarybaseendpoints)*

<hr />

### Class: \Traycommerce\LocaisVenda

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>criar(</strong><em>array</em> <strong>$data</strong>)</strong> : <em>object</em> |
| public | <strong>dados(</strong><em>int</em> <strong>$id</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>\Traycommerce\type</em> |
| public | <strong>listagem(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |

*This class extends [\Traycommerce\Library\BaseEndpoints](#class-traycommercelibrarybaseendpoints)*

<hr />

### Class: \Traycommerce\CarrinhoCompra

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>atualizarDados(</strong><em>\Traycommerce\type</em> <strong>$sessionId</strong>, <em>array</em> <strong>$data=array()</strong>)</strong> : <em>type object</em> |
| public | <strong>atualizarProduto(</strong><em>\Traycommerce\type</em> <strong>$sessionId</strong>, <em>\Traycommerce\type</em> <strong>$productId</strong>, <em>array/\Traycommerce\type</em> <strong>$data=array()</strong>, <em>\Traycommerce\type</em> <strong>$variantId=null</strong>, <em>string</em> <strong>$additionalInformation=`''`</strong>)</strong> : <em>type object</em> |
| public | <strong>consultarCompleto(</strong><em>\Traycommerce\type</em> <strong>$sessionId</strong>)</strong> : <em>type object</em> |
| public | <strong>consultarDados(</strong><em>\Traycommerce\type</em> <strong>$sessionId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>type object</em> |
| public | <strong>consultarProduto(</strong><em>\Traycommerce\type</em> <strong>$sessionId</strong>, <em>\Traycommerce\type</em> <strong>$productId</strong>, <em>\Traycommerce\type</em> <strong>$variantId=null</strong>)</strong> : <em>type object</em> |
| public | <strong>criarNovo(</strong><em>array/\Traycommerce\type</em> <strong>$data=array()</strong>)</strong> : <em>type object</em> |
| public | <strong>excluir(</strong><em>\Traycommerce\type</em> <strong>$sessionId</strong>)</strong> : <em>type object</em> |
| public | <strong>excluirProduto(</strong><em>string</em> <strong>$sessionId</strong>, <em>int</em> <strong>$productId</strong>, <em>int</em> <strong>$variantId=null</strong>, <em>string</em> <strong>$additionalInformation=`''`</strong>)</strong> : <em>type object</em> |

*This class extends [\Traycommerce\Library\BaseEndpoints](#class-traycommercelibrarybaseendpoints)*

<hr />

### Class: \Traycommerce\PaginasLoja

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>dados(</strong><em>int</em> <strong>$pageId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>listagem(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |

*This class extends [\Traycommerce\Library\BaseEndpoints](#class-traycommercelibrarybaseendpoints)*

<hr />

### Class: \Traycommerce\PalavrasChave

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>dados(</strong><em>int</em> <strong>$wordId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>listagem(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |

*This class extends [\Traycommerce\Library\BaseEndpoints](#class-traycommercelibrarybaseendpoints)*

<hr />

### Class: \Traycommerce\Pedido

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>atualizarDados(</strong><em>\Traycommerce\type</em> <strong>$orderId</strong>, <em>array/\Traycommerce\type</em> <strong>$data=array()</strong>)</strong> : <em>type object</em> |
| public | <strong>atualizarDadosStatus(</strong><em>int</em> <strong>$statusId</strong>, <em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>atualizarNotaFiscal(</strong><em>int</em> <strong>$orderId</strong>, <em>int</em> <strong>$invoiceId</strong>, <em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>cadastrar(</strong><em>array/\Traycommerce\type</em> <strong>$data=array()</strong>)</strong> : <em>type object</em> |
| public | <strong>cadastrarNotaFiscal(</strong><em>\Traycommerce\type</em> <strong>$orderId</strong>, <em>array/\Traycommerce\type</em> <strong>$data=array()</strong>)</strong> : <em>type object</em> |
| public | <strong>cadastrarStatus(</strong><em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>cancelar(</strong><em>\Traycommerce\type</em> <strong>$orderId</strong>)</strong> : <em>type object</em> |
| public | <strong>consultarDadosNotaFiscal(</strong><em>\Traycommerce\type</em> <strong>$orderId</strong>, <em>\Traycommerce\type</em> <strong>$invoiceId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>type object</em> |
| public | <strong>consultarNotaPorPedido(</strong><em>\Traycommerce\type</em> <strong>$orderId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>type object</em> |
| public | <strong>dados(</strong><em>\Traycommerce\type</em> <strong>$orderId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>type object</em> |
| public | <strong>dadosCompleto(</strong><em>\Traycommerce\type</em> <strong>$orderId</strong>)</strong> : <em>type object</em> |
| public | <strong>dadosStatus(</strong><em>int</em> <strong>$statusId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>array object</em> |
| public | <strong>etiquetasMercadoLivre(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>excluir(</strong><em>\Traycommerce\type</em> <strong>$orderId</strong>)</strong> : <em>type object</em> |
| public | <strong>excluirProduto(</strong><em>int</em> <strong>$orderId</strong>, <em>int</em> <strong>$productId</strong>)</strong> : <em>object</em> |
| public | <strong>excluirStatus(</strong><em>int</em> <strong>$statusId</strong>)</strong> : <em>object</em> |
| public | <strong>incluirProduto(</strong><em>int</em> <strong>$orderId</strong>, <em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>listagem(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>listagemNotasFiscais(</strong><em>array/\Traycommerce\type/array</em> <strong>$filtros=array()</strong>)</strong> : <em>type object</em> |
| public | <strong>listagemStatus(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |

*This class extends [\Traycommerce\Library\BaseEndpoints](#class-traycommercelibrarybaseendpoints)*

<hr />

### Class: \Traycommerce\ScriptsExternos

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>atualizarDados(</strong><em>int</em> <strong>$scriptId</strong>, <em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>cadastrar(</strong><em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>listagem(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |

*This class extends [\Traycommerce\Library\BaseEndpoints](#class-traycommercelibrarybaseendpoints)*

<hr />

### Class: \Traycommerce\Cliente

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>atualizarDados(</strong><em>int</em> <strong>$customerId</strong>, <em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>cadastrar(</strong><em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>cadastrarEndereco(</strong><em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>dados(</strong><em>int</em> <strong>$customerId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>dadosEndereco(</strong><em>int</em> <strong>$addressId</strong>, <em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>excluir(</strong><em>int</em> <strong>$customerId</strong>)</strong> : <em>object</em> |
| public | <strong>excluirEndereco(</strong><em>int</em> <strong>$addressId</strong>)</strong> : <em>object</em> |
| public | <strong>listagem(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>listagemEnderecos(</strong><em>array</em> <strong>$filtros=array()</strong>)</strong> : <em>object</em> |
| public | <strong>login(</strong><em>array</em> <strong>$data=array()</strong>)</strong> : <em>object</em> |
| public | <strong>relacionarPerfil(</strong><em>int</em> <strong>$customerId</strong>, <em>int</em> <strong>$profileId</strong>)</strong> : <em>object</em> |
| public | <strong>removerRelacionamentoPerfil(</strong><em>int</em> <strong>$customerId</strong>, <em>int</em> <strong>$profileId</strong>)</strong> : <em>object</em> |

*This class extends [\Traycommerce\Library\BaseEndpoints](#class-traycommercelibrarybaseendpoints)*

<hr />

### Class: \Traycommerce\Library\HttpTray

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |
| public | <strong>afterSend(</strong><em>mixed</em> <strong>$callback</strong>)</strong> : <em>void</em> |
| public | <strong>beforeSend(</strong><em>mixed</em> <strong>$callback</strong>)</strong> : <em>void</em> |
| public | <strong>delete(</strong><em>mixed</em> <strong>$action</strong>, <em>array</em> <strong>$params=array()</strong>, <em>array</em> <strong>$query=array()</strong>)</strong> : <em>void</em> |
| public | <strong>get(</strong><em>mixed</em> <strong>$action</strong>, <em>array</em> <strong>$params=array()</strong>, <em>array</em> <strong>$query=array()</strong>)</strong> : <em>mixed</em> |
| public | <strong>getBaseUrlApi()</strong> : <em>mixed</em> |
| public | <strong>post(</strong><em>mixed</em> <strong>$action</strong>, <em>array</em> <strong>$params=array()</strong>, <em>array</em> <strong>$query=array()</strong>)</strong> : <em>void</em> |
| public | <strong>postJson(</strong><em>mixed</em> <strong>$action</strong>, <em>array</em> <strong>$params=array()</strong>, <em>array</em> <strong>$query=array()</strong>)</strong> : <em>void</em> |
| public | <strong>put(</strong><em>mixed</em> <strong>$action</strong>, <em>array</em> <strong>$params=array()</strong>, <em>array</em> <strong>$query=array()</strong>)</strong> : <em>void</em> |
| public | <strong>setBaseUrlApi(</strong><em>mixed</em> <strong>$baseUrlApi</strong>)</strong> : <em>void</em> |

<hr />

### Class: \Traycommerce\Library\BaseEndpoints

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em> |

*This class extends [\Traycommerce\Library\HttpTray](#class-traycommercelibraryhttptray)*


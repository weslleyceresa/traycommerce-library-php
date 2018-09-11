<?php 
	class Auth extends TrayCommerce{
		private $store_url = "";
		private $consumer_key = "";
		private $consumer_secret = "";
		private $callback = "";
		private $authorization = "";
		private $auth = "auth.php";

		private $store_id;
		private $access_token;
		private $refresh_token;
		private $date_expiration_access_token;
		private $date_expiration_refresh_token;
		private $base_url_api;

		public function __construct($params = array()){
			parent::__construct();

			if(is_array($params) && isset($params["callback"]))
				$this->callback = $params["callback"];
			else{
				throw new Exception("[Auth][params] parâmetro callback é obrigatório.");
			}

			if(is_array($params) && isset($params["consumer_key"]))
				$this->consumer_key = $params["consumer_key"];
			else{
				throw new Exception("[Auth][params] parâmetro consumer_key é obrigatório.");
			}

			if(is_array($params) && isset($params["consumer_secret"]))
				$this->consumer_secret = $params["consumer_secret"];
			else{
				throw new Exception("[Auth][params] parâmetro consumer_secret é obrigatório.");
			}

			if(is_array($params) && isset($params["store_url"]))
				$this->store_url = $params["store_url"];
			else{
				throw new Exception("[Auth][params] parâmetro store_url é obrigatório.");
			}
		}

		public function solicitarAutorizacao(){
			$get = array(
				"response_type" => "code",
				"consumer_key" => $this->consumer_key,
				"callback" => $this->callback,
			);

			header("Location: " . $this->store_url . $this->auth . "?". http_build_query($get));
		}

		public function gerarChaveAcesso($code, $apiAddress){
			$this->authorization = null;

			parent::setBaseUrlApi($apiAddress);

			$post = array(
				"consumer_key" => $this->consumer_key,
				"consumer_secret" => $this->consumer_secret,
				"code" => $code,
			);

			$resposta = $this->post("auth/", $post);

			if($resposta["code"] != "201" && $resposta["code"] != "200")
				throw new Exception("[Auth] Problema com a autorização na Tray, detalhes: " . $resposta["err"]);

			$this->base_url_api = $apiAddress;
			$this->store_id = $resposta["data"]->store_id;
			$this->access_token = $resposta["data"]->access_token;
			$this->refresh_token = $resposta["data"]->refresh_token;
			$this->date_expiration_access_token = strtotime($resposta["data"]->date_expiration_access_token);
			$this->date_expiration_refresh_token = strtotime($resposta["data"]->date_expiration_refresh_token);		    
		}

		public function estaAutorizado(){
			$hoje = strtotime(date("Y-m-d H:i:s"));

			if($hoje > $this->getDateExpirationRefreshToken())
				return false;

			// efetuar refresh no token
			if($hoje > $this->getDateExpirationAccessToken()){
				return $this->atualizarChaveAcesso();
			}

			return true;
		}

		public function getAutorizacao(){
			return $this->authorization;
		}

		public function atualizarChaveAcesso(){
			$post = array(
				"refresh_token" => $this->getRefreshToken()
			);

			parent::setBaseUrlApi($this->getBaseUrlApi());

			$resposta = $this->get("auth/", $post);

			if($resposta["code"] == "200" || $resposta["code"] == "201"){
				$this->access_token = $resposta["data"]->access_token;
				$this->refresh_token = $resposta["data"]->refresh_token;
				$this->date_expiration_access_token = strtotime($resposta["data"]->date_expiration_access_token);
				$this->date_expiration_refresh_token = strtotime($resposta["data"]->date_expiration_refresh_token);

				return true;
			}

		    return false;
		}

		public function getCallback(){
			return $this->callback;
		}

		public function setCallback($callback){
			return $this->callback = $callback;
		}

		public function getConsumerKey(){
			return $this->callback;
		}

		public function setConsumerKey($consumerKey){
			return $this->consumer_key = $consumerKey;
		}

		public function getConsumerSecret(){
			return $this->consumer_secret;
		}

		public function setConsumerSecret($consumerSecret){
			return $this->consumer_secret = $consumerSecret;
		}

		public function getAuthorizeUrl(){
			return $this->authorize_url;
		}

		public function setAuthorizeUrl($authorizeUrl){
			return $this->authorize_url = $authorizeUrl;
		}

		//----

		public function getStoreId(){
			return $this->store_id;
		}

		public function setStoreId($storeId){
			return $this->store_id = $storeId;
		}

		public function getAccessToken(){
			return $this->access_token;
		}

		public function setAccessToken($acessToken){
			return $this->access_token = $acessToken;
		}

		public function getRefreshToken(){
			return $this->refresh_token;
		}

		public function setRefreshToken($refreshToken){
			return $this->refresh_token = $refreshToken;
		}

		public function getDateExpirationAccessToken(){
			return $this->date_expiration_access_token;
		}

		public function setDateExpirationAccessToken($dateExpirationAccessToken){
			return $this->date_expiration_access_token = $dateExpirationAccessToken;
		}

		public function getDateExpirationRefreshToken(){
			return $this->date_expiration_refresh_token;
		}

		public function setDateExpirationRefreshToken($dateExpirationRefreshToken){
			return $this->date_expiration_refresh_token = $dateExpirationRefreshToken;
		}

		public function getBaseUrlApi(){
			return $this->base_url_api;
		}

		public function setBaseUrlApi($baseUrlApi){
			return $this->base_url_api = $baseUrlApi;
		}
	}

?>
<?php
	class TrayEndpoints extends TrayCommerce{
		protected $auth;

		public function __construct(Auth $auth){
			parent::__construct();
			parent::setBaseUrlApi($auth->getBaseUrlApi());
			$this->auth = $auth;
		}
	} 
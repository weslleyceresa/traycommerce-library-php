<?php 
	/*
	{
	    "code": 401,
	    "url": "//partners/?access_token=3d32b0b96196550f9aea3a9e5b30b678c6d5202a40129760d45fa41d89c5dc4a",
	    "name": "Bad Request",
	    "causes": [
	        "No data sent."
	    ]
	}

	{
	    "code": 400,
	    "url": "//partners/?access_token=3d32b0b96196550f9aea3a9e5b30b678c6d5202a40129760d45fa41d89c5dc4a",
	    "name": "Bad Request",
	    "causes": [
	        "No data sent."
	    ]
	}

	{
	    "code": 400,
	    "url": "//partners/?access_token=3d32b0b96196550f9aea3a9e5b30b678c6d5202a40129760d45fa41d89c5dc4a",
	    "name": "Bad Request",
	    "causes": {
	        "Partner": {
	            "name": [
	                "This field can't be left blank."
	            ],
	            "site": [
	                "This field can't be left blank."
	            ]
	        }
	    }
	}
	*/

	class TrayCommerceException extends Exception{
		public function __construct($message, $code = 0, Exception $previous = null) {
			$message = $this->process($message);
			parent::__construct($message, $code, $previous);
		}

		private function process($message){
			if(is_string($message))
				return $message;

			if($message->causes){
				if(is_array($message->causes)){
					return $message->name.", Causes: (".implode($message->causes).")";
				}

				if(is_object($message->causes)){
					$objectName = key($message->causes);
					$properties = get_object_vars($message->causes->{$objectName});

					$msg = array();
					foreach ($properties as $key => $value) {
						$msg[] = $key.": ".implode(", ", $value);
					}

					return $message->name.", ".$objectName." causes: (".implode(" and ", $msg).")";
				}
			}
		}

		// personaliza a apresentação do objeto como string
	    public function __toString() {
	        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
	    }
	}
?>
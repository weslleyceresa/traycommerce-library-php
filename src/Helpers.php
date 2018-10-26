<?php 
	function generateLog($text){
		$file = fopen(__DIR__ . "/../logs/logs.txt", "a+");
		fwrite($file, "[".date("d/m/Y H:i:s")."] - ".$text."\n");
		fclose($file);
	}

	function success($code){
		if(in_array($code, array(200, 201)))
			return true;

		return false;
	}
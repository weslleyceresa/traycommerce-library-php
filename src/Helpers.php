<?php 
	function generateLog($text){
		$file = fopen("../logs/", "a+");
		fwrite($file, "[".date("d/m/Y H:i:s")."] - ".$text."\n");
		fclose($file);
	}

<?php 
	function generateLog($text){
		$file = fopen("../logs/logs.txt", "a+");
		fwrite($file, "[".date("d/m/Y H:i:s")."] - ".$text."\n");
		fclose($file);
	}

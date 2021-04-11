<?php
	error_reporting(0); // Turn off all error reporting.
	
		## ENCRYPT FUNCTION
		function Encrypt_Pass($pass) {
			$string_a = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$string_b = 'nopqrstuvwxyzabcdefghijklmNOPQRSTUVWXYZABCDEFGHIJKLM';
			$abwords = strtr($pass, $string_a, $string_b); // REPLACE
			   
			$string_g = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$string_t = 'defghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZabcd';
			$gtwords = strtr($abwords, $string_g, $string_t);
			   
			$basewords = base64_encode($gtwords);
			   
			$equal = '==';
			$star = '*';
			$eswords = strtr($basewords, $equal, $star);
			   
			$wwwords = wordwrap($eswords, 5, "-", true); // with 5 char to replace
		##SHA 256 CUSTOM
			$encrypt_method = "AES-256-CBC";
			$secret_key = 'ToiDiBanSource';
			$secret_iv = 'SourceIsMyLife';
			$key = hash('sha256', $secret_key);
			$iv = substr(hash('sha256', $secret_iv), 0, 16);
			$output = openssl_encrypt($wwwords, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
			
		##CALLBACK
			return $output;
		}
		
		## DECRYPT FUNCTION
		function Decrypt_Pass($pass) {
		##SHA 256 CUSTOM	
			$encrypt_method = "AES-256-CBC";
			$secret_key = 'ToiDiBanSource';
			$secret_iv = 'SourceIsMyLife';
			$key = hash('sha256', $secret_key);
			$iv = substr(hash('sha256', $secret_iv), 0, 16);
			$output = openssl_decrypt(base64_decode($pass), $encrypt_method, $key, 0, $iv);
			
		##DO DECODE
			$negative = '-';
			$empty = '';
			$newords = strtr($output, $negative, $empty);
			   
			$star = '*';
			$equal = '==';
			$sewords = strtr($newords, $star, $equal);
			
			$basewords = base64_decode($sewords);
			
			$string_a = 'defghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZabcd';
			$string_b = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$abwords = strtr($basewords, $string_a, $string_b);
			   
			$string_g = 'nopqrstuvwxyzabcdefghijklmNOPQRSTUVWXYZABCDEFGHIJKLM';
			$string_t = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$endwords = strtr($abwords, $string_g, $string_t);
		
		##CALLBACK
			return $endwords;
		}
?>

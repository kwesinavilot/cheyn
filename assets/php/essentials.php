<?php
    function generateCheynId(){
		$charset = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$length = 7;
		$input_length = strlen($charset);
		$random_string = '';

		for($i = 0; $i < $length; $i++) {
			$random_character = $charset[mt_rand(0, $input_length - 1)];
			$random_string .= $random_character;
		}

		$gened = "CyN" . $random_string;

		return $gened;
    }
?>
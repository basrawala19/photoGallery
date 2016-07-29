<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class validation_functions {


	function has_presence ( $field ) {

		return isset($field) && $field !== "" ;
	}

	function max_length( $value , $length ) {

		if ( strlen($value) > $length ) {
			return 0;
		}
		return 1;
	}

	function validate_presence( $required_feild  ) {

                $errors = array() ;

		foreach( $required_feild as $feild => $max ){
			//echo $_POST[$feild]." " ;
			if ( !$this->has_presence(trim($_POST[$feild])) ){
				$errors[$feild] = ucfirst($feild)." can't be blank";
                                //echo "hello" ;
			}
			if ( !$this->max_length( $_POST[$feild] , $max ) ){

				$errors[$feild] = ucfirst($feild)." too long ";
			}
		}
                return $errors ;
        }

	function form_errors( $errors ) {

			$output = "" ;

			if ( !empty($errors) ){
				$output .= "<pre><ul>";

				foreach ( $errors as $feild ){
					$output .= "<li>$feild</li>";
				}
				$output .= "</ul></pre>";
			}

			return $output ;
	}

}
?>

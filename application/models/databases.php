<?php

class databases {


	private static $link ;

	function __construct() {

		self::$link = mysqli_connect("localhost","root","","photo_gallery" ) ;
		self :: check ( self::$link ) ;
	}


	public static function query ( $sql = "" ){

		$result = mysqli_query(self::$link,$sql);

		self :: check ( $result ) ;
		return $result ;
	}

	public static function check ( $result ) {
		//trigger_error("Cannot divide by zero", E_USER_ERROR);
		if ( !$result ){
			die("some error occured");
		}

	}

	public function affected ( ) {

		if ( !mysqli_affected_rows(self::$link) ) {

			return 0;
		}
		return 1 ;
	}

	public function close( ) {

		mysqli_close(self::$link);
	}




}

$database = new databases() ;

?>

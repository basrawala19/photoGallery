<?php



class Sessiona extends CI_Model{ 

	private static $is_login = 0 ;
	private static $message = "" ;
	public  static $username = "" ;
	
	function __construct() {
	
		if(!isset($_SESSION)) 
                { 
                    session_start(); 
                } 
		
		if ( isset($_SESSION['username']) ){
			
			self::$username = $_SESSION['username'] ;
			self::$is_login = 1;
		}
	
	}
	
	
	
	public static function check_login ( ) {
	
		return self::$is_login ;
	}
	
	public static function login ( $user ) {
		
		$_SESSION['username'] = $user->username ;
		self::$username = $user->username ;
		self::$is_login = 1 ;
	
	}  
	
	public static function messages( $sql ="" ) {

		if ( empty($sql) ) {
			self::$message = isset($_SESSION['message']) ? $_SESSION['message'] : "" ;
			$_SESSION['message'] = "";
			return self::$message ;
		}
		else{
		
			$_SESSION['message'] = $sql ;
                        $message = $sql  ;
			return 1 ;
		}
	}  

	public static function logout ( ) {
	
		self::$is_login = 0 ;
		unset($_SESSION['username']);
		self::messages("Log out successful ");
		
	} 
}

/*$session = new Sessiona() ;
$message = $session->messages() ;*/


?>
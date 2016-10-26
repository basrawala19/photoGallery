<?php
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

/**
 * Hybrid_User_Profile object represents the current logged in user profile.
 * The list of fields available in the normalized user profile structure used by HybridAuth.
 *
 * The Hybrid_User_Profile object is populated with as much information about the user as
 * HybridAuth was able to pull from the given API or authentication provider.
 *
 * http://hybridauth.sourceforge.net/userguide/Profile_Data_User_Profile.html
 */
class thirdpartyuser
{

	public $id = NULL ;

	public $external_id = NULL;

	public $profileURL = NULL;

	public $photoURL = NULL;

	public $firstName = NULL;

	public $lastName = NULL;

	public $email = NULL;

  public $provider = NULL ;

  protected static $table_name = "thirdpartyuser" ;

	 public static function find_all ( ){

		return self::find_by_sql("SELECT * FROM ".self::$table_name );
	}


	public static function find_by_id( $id = 0 ) {

		$result_set = self::find_by_sql ( "SELECT * FROM ".self::$table_name." WHERE id = {$id}" );
		return !empty($result_set) ? array_shift( $result_set) : NULL ;
	}

	public static function find_by_external_id ( $id , $provider ) {


		//echo "SELECT * FROM ".self::$table_name." WHERE external_id = {$id} AND provider like '{$provider}'" ;
		$result_set = self::find_by_sql ( "SELECT * FROM ".self::$table_name." WHERE external_id = {$id}  AND provider like '{$provider}'" );
		return !empty($result_set) ? array_shift( $result_set) : NULL ;
	}

  public function get_instance_ ( $str ){

      $CI = &get_instance( ) ;

      $CI->load->model($str);

      $s = new $str( ) ;
      return $s ;


  }

	public static function find_by_sql ( $sql = "" ) {

		$database = self:: get_instance_ ('databases') ;
		//echo "hye" ;
		$result = $database->query($sql) ;

		$database->check($result);

		$object_array = array() ;

		while ( $record = mysqli_fetch_assoc($result) ){

				$object_array[] = self::instantiate($record) ;

		}
		return $object_array ;

	}

	public static function instantiate ( $record ) {

		$object = new self ;

		foreach ( $record as $field => $key ) {

			if ( $object->has_attribute($field) ){
				$object->$field = $key ;

			}
		}
		return $object ;

	}
	private function has_attribute( $field ) {

		if ( array_key_exists($field,get_object_vars($this)) ){
			return 1;
		}
		else return 0;
	}


	/*public function count_by_photoid ( $id = 0) {

		$database  = self:: get_instance_ ('databases') ;

		$result = $database->query( "SELECT COUNT(*) FROM ".self::$table_name." WHERE photo_id = ".$id) ;
		$row = mysqli_fetch_array( $result ) ;
		return $row[0] ;

	}*/

	public static function count_() {

	  $database  = self:: get_instance_ ('databases') ;

		$result = $database->query( "SELECT COUNT(*) FROM ".self::$table_name) ;
		$row = mysqli_fetch_array( $result ) ;
		return $row[0] ;
	}

	public static function insert ($arr) {

		$database = self:: get_instance_ ('databases') ;

		$id = self::count_() + 1 ;
		$external_id = $arr->external_id ;
    $profileURL = $arr->profileURL ;
    $photoURL = $arr->photoURL ;
    $firstName = $arr->firstName ;
    $lastName = $arr->lastName ;
    $email = $arr->email ;
		$provider = $arr->provider ;

		$sql = "INSERT INTO ".self::$table_name." VALUES ('".$id."', '".$external_id."', '".$profileURL."', '".$photoURL."', '";
    $sql .= $firstName."', '".$lastName."', '".$email."', '".$provider."')" ;
		//$sql .= $time_."')" ;
		echo $sql ;
		$result = $database->query($sql) ;

		if ( !$database->affected( )){

			return NULL;
		}
		return $id ;

	}

	/*public function delete ( ) {

		$database  = self:: get_instance_ ('databases') ;

		$sql = "DELETE FROM ".self::$table_name." WHERE id = ".$this->id;
		$result = $database->query($sql) ;
		if ( !$database->affected( )){

			return 0;
		}

		$sql = "UPDATE ".self::$table_name." SET id = id - 1 WHERE id > ".$this->id;
		$result = $database->query($sql) ;
		return 1 ;
	}*/

}


$thirdpartyuser = new thirdpartyuser( ) ;


?>

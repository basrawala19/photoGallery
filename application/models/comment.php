<?php


class comment {

	public $id ;
	public $photo_id;
	//public $author;
	public $user_id ;
	public $body;
	public $time;

	protected static $table_name = "comment" ;

	 public static function find_all ( ){

		return self::find_by_sql("SELECT * FROM ".self::$table_name );
	}


	public static function find_by_id( $id = 0 ) {

		$result_set = $this->find_by_sql ( "SELECT * FROM ".self::$table_name." WHERE id = {$id}" );
		return !empty($result_set) ? array_shift( $result_set) : NULL ;
	}

	public static function find_by_photoid ( $id = 0 ) {

		$result_set = self::find_by_sql ( "SELECT * FROM ".self::$table_name." WHERE photo_id = {$id}" );
		return $result_set ;
	}

        public function get_instance_ ( $str ){

            $CI = &get_instance( ) ;

            $CI->load->model($str);

            $s = new $str( ) ;
            return $s ;


        }

	public static function find_by_sql ( $sql = "" ) {

		$database = self:: get_instance_ ('databases') ;

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


	public function count_by_photoid ( $id = 0) {

		$database  = self:: get_instance_ ('databases') ;

		$result = $database->query( "SELECT COUNT(*) FROM ".self::$table_name." WHERE photo_id = ".$id) ;
		$row = mysqli_fetch_array( $result ) ;
		return $row[0] ;

	}

	public static function count_() {

	  $database  = self:: get_instance_ ('databases') ;

		$result = $database->query( "SELECT COUNT(*) FROM ".self::$table_name) ;
		$row = mysqli_fetch_array( $result ) ;
		return $row[0] ;
	}

	public function insert ($arr) {

		$database = self:: get_instance_ ('databases') ;

		$id = self::count_() + 1 ;
		$photo_id = $arr['photo_id'] ;
		//$author = empty($arr['author']) ? "anonymous" : $arr['author'] ;
		$user_id = $arr['user_id'] ;
		$body = $arr['body'] ;
		$time = strftime("%Y-%m-%d %H:%M:%S",time());
		//echo $time_ ;
		if ( empty($body) ){
			return 0;
		}

		$sql = "INSERT INTO ".self::$table_name." VALUES ('".$id."', '".$photo_id."', '".$user_id."', '".$body."', '";
		$sql .= $time."')" ;

		$result = $database->query($sql) ;

		if ( !$database->affected( )){

			return 0;
		}
		return 1 ;

	}

	public function delete ( ) {

		$database  = self:: get_instance_ ('databases') ;

		$sql = "DELETE FROM ".self::$table_name." WHERE id = ".$this->id;
		$result = $database->query($sql) ;
		if ( !$database->affected( )){

			return 0;
		}

		$sql = "UPDATE ".self::$table_name." SET id = id - 1 WHERE id > ".$this->id;
		$result = $database->query($sql) ;
		return 1 ;
	}

}


$comment = new comment() ;


?>

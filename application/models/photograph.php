<?php


class photograph {


	public $id ;
	public $size;
	public $type;
	public $name;
	public $temp_name ;
	public $caption ;
	public $gallery_name ;

	protected $errors = array() ;
	protected static $dir = "images" ;

	protected static $table_name = "photograph";

	 public static function find_all ( ){

		return self::find_by_sql("SELECT * FROM ".self::$table_name);
	}

        public function get_instance_ ( $str ){

            $CI = &get_instance( ) ;

            $CI->load->model($str);

            $s = new $str( ) ;
            return $s ;


        }

	 public static function find_curr_page ( $pagination ){

	 	//global $pagination ;
		//echo "SELECT * FROM ".self::$table_name." WHERE LIMIT ".$pagination->current_page." OFFSET ".$pagination->offset_() ;
                //$pagination = self::get_instance_( 'pagination' ) ;
		//return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE gallery_name LIKE '".$pagination->gallery_name."' LIMIT ".$pagination->per_page." OFFSET ".$pagination->offset_());
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE gallery_name LIKE '".$pagination->gallery_name."'") ;
	}

	public static function find_curr_page_admin ( $pagination ){

	 //global $pagination ;
	 //echo "SELECT * FROM ".self::$table_name." WHERE LIMIT ".$pagination->current_page." OFFSET ".$pagination->offset_() ;
							 //$pagination = self::get_instance_( 'pagination' ) ;
	 return self::find_by_sql("SELECT * FROM ".self::$table_name." LIMIT ".$pagination->per_page." OFFSET ".$pagination->offset_());
 }

	public static function find_by_id( $id = 0 ) {

		$result_set = self::find_by_sql ( "SELECT * FROM ".self::$table_name." WHERE id = {$id}" );
		return !empty($result_set) ? array_shift( $result_set) : NULL ;
	}

	public static function find_by_sql ( $sql = "" ) {

		$database = self::get_instance_( 'databases' ) ;

		$result = $database->query($sql) ;

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


	public function image_path ( ) {
	   //echo ($this->name) ;
		return self::$dir."/".$this->name;

	}

	public function get_size( $size ) {
            //echo "gfgD" ;
            if ( $size > 1000 && $size < 1000000 ){
                return array ( round($size/1000.0) , "KB" );
            }
            else if ( $size > 1000000 ){
                return array ( round($size/1000000.0) , "MB" ) ;
            }
            return array ( round($size) , "B");
        }
	protected function check_errors ($file) {

		if ( $file['error'] != 0 ){

			$this->errors[] = "error uploading file" ;
			return 0;

		}

		if ( empty($file['tmp_name']) || empty($file['name']) ){
			$this->errors[] = "file location not found";
			return 0;
		}

		$this->name = htmlspecialchars($file['name']);
		$this->size = $file['size'] ;
		$this->type = $file['type'];
		$this->temp_name = $file['tmp_name'];

		return 1 ;


	}



	public function save ( $file ) {

		if ( !self::check_errors($file) ) {
			return 0;
		}
		$file_name = basename($this->name);

		//echo $this->name ."<br />";
		//echo $file_name;

		if ( file_exists(self::$dir."/".$file_name) ) {

			$this->errors[] = "file already exists";
			return 0;
		}

		if ( $this->caption > 255 ) {

			$this->errors[] = "captia too long";
			return 0;
		}

		if ( move_uploaded_file($this->temp_name,$this->image_path()) ){

			$database = self::get_instance_( 'databases' ) ;

			$this->id = self::count_() + 1 ;

			$sql = "INSERT INTO ".self::$table_name." VALUES ('".$this->id."', '".$file_name."', '".$this->type."', '".$this->size."', '";
			$sql .= $this->caption."', '".$this->gallery_name."')" ;

			$database->query($sql);
			return 1 ;
		}
		else{

			$this->errors[] = "error saving the file";
			return 0;
		}


	}
	public static function count_() {

		$database = self::get_instance_( 'databases' ) ;

		$result = $database->query( "SELECT COUNT(*) FROM ".self::$table_name) ;
		$row = mysqli_fetch_array( $result ) ;

		return $row[0] ;
	}

    public function give_errors(  ){

		$output = "<ul>";
		foreach ( $this->errors as $error ) {

			$output = "<li>".$error."</li>";

		}
		return $output ;
	}

	public function delete ( ) {

		$database = self::get_instance_( 'databases' ) ;

		$sql = "DELETE FROM ".self::$table_name." WHERE id = ".$this->id;
		echo($sql);
		$result = $database->query($sql) ;

		if ( !$database->affected( )){

			return 0;
		}

		$sql = "SELECT COUNT(*) FROM comment WHERE photo_id = ".$this->id;
		//echo($sql);
		$result = $database->query($sql) ;
		$rw = mysqli_fetch_array($result) ;
		$ss = $rw[0] ;
		echo "ss ".$ss;
		while ( $ss-- ){

			$sql = "SELECT id FROM comment WHERE photo_id = ".$this->id." ORDER BY id ASC LIMIT 1";
			$result = $database->query($sql) ;

			$row = mysqli_fetch_array($result) ;
			$id = $row[0] ;
			echo " id ".$id ;
			$sql = "DELETE FROM comment WHERE id = ".$id;
			$result = $database->query($sql) ;

		 	$sql = "UPDATE comment SET id = id - 1 WHERE id > ".$id;
			$result = $database->query($sql) ;
			//return 1 ;

		}

		unlink($this->image_path());

		$sql = "UPDATE ".self::$table_name." SET id = id - 1 WHERE id > ".$this->id;

		$result = $database->query($sql) ;

		$sql = "UPDATE comment SET photo_id = photo_id - 1 WHERE photo_id > ".$this->id;

		$result = $database->query($sql) ;

		return 1 ;

	}

}

$photograph = new photograph() ;

?>

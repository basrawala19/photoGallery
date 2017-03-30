<?php


  class gallery {

    public $id;
    public $name;
    public $image_name ;

    private static $item_per_page = 3 ;

    protected static $dir = "images/gallery" ;

    protected static $table_name = "gallery";

    public function get_instance_ ( $str ){

        $CI = &get_instance( ) ;

        $CI->load->model($str);

        $s = new $str( ) ;
        return $s ;


    }

    private function has_attribute( $field ) {

  		if ( array_key_exists($field,get_object_vars($this)) ){
  			return 1;
  		}
  		else return 0;
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

    public function image_path ( ) {
  	   //echo ($this->name) ;
  		return self::$dir."/".$this->image_name;

  	}

    public static function get_galleries ($page_number) {


        $database = self::get_instance_('databases') ;
        $offset = (($page_number-1) * self::$item_per_page);

        $result = $database->query("SELECT * FROM gallery LIMIT ".self::$item_per_page." OFFSET ".$offset) ;
     		$object_array = array() ;
     		while ( $record = mysqli_fetch_assoc($result) ){

     				$object_array[] = self::instantiate($record) ;

     		}
     		return $object_array ;

     	}


    public static function get_all_galleries ( ) {

         $database = self::get_instance_('databases') ;

         $result = $database->query("SELECT * FROM gallery") ;

     		$object_array = array() ;

     		while ( $record = mysqli_fetch_assoc($result) ){

     				$object_array[] = self::instantiate($record) ;

     		}
     		return $object_array ;

     	}

      public static function count_images($name) {

    		$database = self::get_instance_( 'databases' ) ;
        //echo "SELECT COUNT(*) FROM photograph WHERE gallery_name=".$name ;
    		$result = $database->query( "SELECT COUNT(*) FROM photograph WHERE gallery_name LIKE '".$name."'") ;
    		$row = mysqli_fetch_array( $result ) ;
        //echo "hye" ;
    		return $row[0] ;
    	}

      public static function count_comments($name) {

        $database = self::get_instance_( 'databases' ) ;

    		$result = $database->query( "SELECT * FROM photograph WHERE gallery_name LIKE '".$name."'") ;

        $sum = 0 ;
        while ( $record = mysqli_fetch_assoc($result) ){

          $rslt = $database->query( "SELECT COUNT(*) FROM comment WHERE photo_id = ".$record['id']) ;
          $row = mysqli_fetch_array( $rslt ) ;
          $sum += $row[0] ;

        }
        return $sum ;
    	}


    }

 ?>

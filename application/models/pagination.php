<?php


class pagination {

	public $per_page = 6 ;
	public $current_page;
	public $gallery_name;


	public function offset_( ) {

		return ($this->per_page)*($this->current_page - 1) ;
	}

	public function has_next_page ( ) {

		if ( $this->current_page < self::total_page( ) ){
			return 1;
		} else{
			return 0;
		}

	}



	public function has_prev_page ( ) {

		if ( $this->current_page > 1 ){
			return 1 ;
		}else{

			return 0;
		}

	}

        public function get_instance_ ( $str ){

            $CI = &get_instance( ) ;

            $CI->load->model($str);

            $s = new $str( ) ;
            return $s ;


        }


	public function total_page ( ) {


		$database = self::get_instance_( 'databases' ) ;
		$result = $database->query("SELECT COUNT(*) FROM photograph where gallery_name LIKE '".$this->gallery_name."'") ;

		$row = mysqli_fetch_array($result) ;
		return ceil(($row[0])/($this->per_page)) ;

	}




}



$pagination = new pagination() ;

?>

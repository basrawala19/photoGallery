<?php

class Users extends CI_Model {

	public $id ;
	public $username;
	public $last_name;
	public $first_name;

	protected static $table_name = "Users" ;
	//public static $var_list = array('id','username','last_name','first_name');
	
	public function full_name( ) {
	
		return $this->first_name." ".$this->last_name ;
	
	}
	
	
	public static function find_all ( ){
	
		return self :: find_by_sql("SELECT * FROM ".self::$table_name);
	}
	
	public static function find_by_id( $id = 0 ) {
	
		$resul_set = self :: find_by_sql ( "SELECT * FROM ".self::$this->table_name." WHERE id = {$id}" );
		return !empty($result_set) ? array_shift( $result_set) : NULL ;
	}
        
        public function get_instance_ ( ) {
            
                $CI = &get_instance();
                $CI->load->model('databases');
                $s = new databases( ) ;
                return $s ;
        }
	
	public static function find_by_sql ( $sql = "" ) {
		
		//global $database ;
	      
                $database = self::get_instance_( ) ;
		$result = $database->query($sql) ;
		
		$database->check($result);
		
		$object_array = array() ;
		
		while ( $record = mysqli_fetch_assoc($result) ){
		
				$object_array[] = self :: instantiate($record) ;
		
		}
		return $object_array ;
	
	}
	
	public static function instantiate ( $record ) {
		
		$object = new users() ;
		
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
	
	public static function count_() {
                
                $database = self::get_instance_ () ;
		$result = $database->query( "SELECT COUNT(*) FROM ".self::$table_name) ;
		$row = mysqli_fetch_array( $result ) ;
		
		return $row[0] ;
	}
	
	public function create ($arr) {
		
		$database = self::get_instance_ ( ) ;
		
		$this->id = self::count_() + 1 ;
		$this->username = $arr['username'] ;
		$this->password = $arr['password'] ;
		$this->first_name = $arr['first_name'] ;
		$this->last_name = $arr['last_name'] ;
		
		$sql = "INSERT INTO ".self::$table_name." VALUES ('".$this->id."', '".$this->username."', '".$this->password."', '".$this->first_name."', '";			
		$sql .= $this->last_name."')" ;
		echo $sql;
		
		$result = $database->query($sql) ;
		
		if ( !$database->affected( )){
		
			return 0;
		} 
		return 1 ;
		
	}
	
	public function delete ( $id = 0 ) {
	
		$database = self::get_instance_( ) ;
		
		$sql = "DELETE FROM ".self::$table_name." WHERE id = ".$id;
		$result = $database->query($sql) ;
		if ( !$database->affected( )){
		
			return 0;
		} 
		
		$sql = "UPDATE ".self::$table_name." SET id = id - 1 WHERE id > ".$id;
		$result = $database->query($sql) ; 
		return 1 ;
	}
	
	public function update ($arr) {
		
		$database = self::get_instance_( ) ;
		
		$sql = "UPDATE ".self::$table_name." SET username = '".$arr['username']."', password = '".$arr['password']."', first_name = '".$arr['first_name']."', last_name = '".$arr['last_name']."' WHERE id = ".$arr['id'];
		
		$result = $database->query($sql) ;
		if ( !$database->affected( )){
			return 0;
		} 
		return 1 ;
	}

}


?>
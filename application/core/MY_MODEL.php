
<?php

class MY_MODEL extends CI_Model{
    
    
    const TABLE_NAME = "arbitary" ;
    const PRIM_KEY = "id" ;
    
    private function insert( ){
        
        $this->db->insert($this::TABLE_NAME,$this) ;
        
       $this->{$this::PRIM_KEY} = $this->db->insert_id($this::PRIM_KEY) ;
        
    }
    
    
    private function update( ){
        
        $this->db->update($this::TABLE_NAME,$this,$this::PRIM_KEY) ;
    }
    
    public function save( ) {
        
        if ( !isset($this->{$this::PRIM_KEY}) ){
            echo "dfD";
            $this->insert( ) ;
        }
        else{
            echo "hye";
            $this->update ( ) ;
        }
    }
    
    public function populate( $row ){
         foreach ( $row as $field => $key ){
            
            $this->{$field} = $key ;
            
        } 
    }
    
    public function load( $id ) {
        
        //PRIM_KEY = $id ;
    
        $query = $this->db->get_where( $this::TABLE_NAME , array($this::PRIM_KEY => $id) ) ;
        
        $row = $query->row( ) ;
        
       $this->populate($row) ;
        
    }
    
    public function delete( ) {
        
        $this->db->delete ( $this::TABLE_NAME , array ( $this::PRIM_KEY => $this->{$this::PRIM_KEY} ) ); 
        unset ( $this->{$this::PRIM_KEY} ) ;
    }
    
    public function get ( $LIMIT = 0 , $OFFSET = 0 ){
        
        if ( isset ( $LIMIT ) )
            { $query = $this->db->get( $this::TABLE_NAME , $LIMIT , $OFFSET ) ;}
        else 
            { $query = $this->db->get ( $this::TABLE_NAME ) ; }
        
        $class = get_class($this);
        $objects = array( ) ;
        
        foreach ( $query->result( ) as $row )
        {
            $model = new $class ;
            $model->populate($row) ;        
            $objects[$model->{$this::PRIM_KEY}] = $model ;
            
        }
        return $objects ;
    }
    
} 

?>
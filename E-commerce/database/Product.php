<?php
class Product{
    public $db = null;


    public function __construct(DBConfig $db)
    {
        if(!isset($db->con)) return null;
        $this->db = $db;
    }
    //Get all the Product 
    public function getData($table = 'product'){
        $result = $this->db->con->query("SELECT * FROM {$table}");
        
        $resultArray = array();

        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    //Get all the Cart Product
    public function getCartProduct($item_id = null, $table = 'product'){
        if(isset($item_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE item_id = {$item_id} ");

            $resultArray = array();

            while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }
}


?>
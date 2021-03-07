<?php

class Cart{

    public $db = null;


    public function __construct(DBConfig $db)
    {
        if(!isset($db->con)) return null;
        $this->db = $db;        
    }

    public function addintoCart($params = null, $table="cart"){

        if($this->db->con != null){
            if($params != null){
                $columns = implode(',',array_keys($params));
                print_r($columns);
                $values = implode(',',array_values($params));
                print_r($values);

                $query_string = sprintf("INSERT INTO %s(%s) VALUES (%s)", $table, $columns, $values);
                
                $result = $this->db->con->query($query_string);

                return $result;
            }
        }

    }
    public function addToCart($userid, $itemid){
        if(isset($userid) && isset($itemid)){
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );

            $result = $this->addintoCart($params);
            if($result){
                header("location:".$_SERVER['PHP_SELF']);
            }
        }
    }

    public function deleteCart($item_id = null, $table ='cart'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id = {$item_id}");
            if($result){
                header("location:".$_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return number_format(sprintf('%2f', $sum), 2);
        }
    }

    public function getCardId($cartArray = null, $key='item_id'){
        if($cartArray != null){
            $card_id = array_map(function($value) use($key) {
                return $value[$key];
            }, $cartArray);
            return $card_id;
        }

    }
}



?>
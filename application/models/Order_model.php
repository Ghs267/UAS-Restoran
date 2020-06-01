<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function getOrderList()
    {
        $id_user = $_SESSION['user_id'];
        $query = $this->db->query("SELECT shop_cart.id_order, shop_cart.tanggal_order, shop_cart.rating , SUM(shop_cart_detail.qty * food.price) AS price
        FROM shop_cart JOIN shop_cart_detail ON shop_cart.id_order = shop_cart_detail.id_order
        JOIN food ON shop_cart_detail.id_menu = food.id WHERE id_user = '$id_user' GROUP BY shop_cart.id_order LIMIT 5;
        ");

        $res = $query->result_array();
        if(count($res) > 0){
            return $query->result_array();
        }else{
            return '';
        }
 
    }

    public function getOrderDetail($id)
    {
        $query = $this->db->query("SELECT shop_cart.id_order, shop_cart_detail.id_menu, food.gambar, shop_cart_detail.qty, food.name, food.price, shop_cart_detail.qty * food.price AS total
        FROM shop_cart JOIN shop_cart_detail ON shop_cart.id_order = shop_cart_detail.id_order JOIN food ON shop_cart_detail.id_menu = food.id WHERE
        shop_cart.id_order = '$id' ORDER BY shop_cart.id_order;");
    
        return $query->result_array();
        
    }

}

?>
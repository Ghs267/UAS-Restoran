<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ShopCart_model extends CI_Model
{

    public function insert_cart($id_user)
    {
        $tanggal_order = date('Y-m-d H:i:s');
        $res = $this->db->query('SELECT * FROM shop_cart');
        $id =  $res->num_rows();
        $id++;
        
        $data = array(
            'id_order' => $id,
            'id_user' => $id_user,
            'tanggal_order' => $tanggal_order
        );

        $this->db->insert('shop_cart', $data);
            
    }

    public function insert_detail($id_menu, $qty)
    {
        $res = $this->db->query('SELECT * FROM shop_cart');
        $id =  $res->num_rows();

        $data = array(
            'id_order' => $id,
            'id_menu' => $id_menu,
            'qty' => $qty
        );

        $this->db->insert('shop_cart_detail', $data);
    }

    public function get_id()
    {
        $res = $this->db->query('SELECT * FROM shop_cart');
        $id =  $res->num_rows();

        return $id;
    }

    public function insert_rating($rate, $id)
    {
        $this->db->set('rating', $rate);
        $this->db->where('id_order', $id);
        $this->db->update('shop_cart');
    }

}

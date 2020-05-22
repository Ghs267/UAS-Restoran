<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ShopCart_model extends CI_Model
{

    public function insert_cart($id_user)
    {
        $tanggal_order = date('Y-m-d H:i:s');
        $data = array(
            'id_user' => $id_user,
            'tanggal_order' => $tanggal_order
        );

        $this->db->insert('shop_cart', $data);
            
    }

    public function insert_detail($id_menu, $nama_menu, $qty, $price, $gambar)
    {
        $res = $this->db->query('SELECT * FROM shop_cart');
        $id =  ($res->num_rows()) + 1;

        $data = array(
            'id_order' => $id,
            'id_menu' => $id_menu,
            'nama_menu' => $nama_menu,
            'qty' => $qty,
            'price' => $price,
            'gambar' => $gambar
        );

        $this->db->insert('shop_detail', $data);
    }

}

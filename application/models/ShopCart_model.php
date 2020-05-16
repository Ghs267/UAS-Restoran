<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ShopCart_model extends CI_Model
{
    public function addCart($userid, $foodid, $qty)
    {
        // $data = array('user_id' => $userid, 'food_id' => $foodid);
        // $this->db->where($data);
        // $row = $this->db->get('shop_cart');
        // if ($row->num_rows() > 0) {
        //     $this->db->set('food_qty', $qty);
        //     $this->db->update('shop_cart');
        // } else {
        //     $this->db->insert('shop_cart', $data);
        // }

        $tgl = date('Y-m-d H:i:s');
        $data = array(
            'id_user'       => $userid,
            'tanggal_order' => $tgl);

        
    }
}

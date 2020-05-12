<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Food_model extends CI_Model
{
    public function saveFood($id)
    {
        $data = [
            'name' => $this->input->post('name'),
            'category' => $this->input->post('category'),
            'price' => $this->input->post('price'),
            'stock' => $this->input->post('stock'),
        ];
        $this->db->where('id', $id);
        $this->db->update('food', $data);
    }
    public function deleteFood($id)
    {
        $this->db->delete('food', ['id' => $id]);
    }
    public function getFood()
    {
        $query = "SELECT `food`.*, `category`.`category`
                  FROM `food` JOIN `category`
                  ON `food`.`category` = `category`.`id`
                ";
        return $this->db->query($query)->result_array();
    }
}

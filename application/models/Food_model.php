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

    public function getDrink()
    {
        $query = "SELECT `drink`.*, `category_d`.`category`
                  FROM `drink` JOIN `category_d`
                  ON `drink`.`category` = `category_d`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function saveDrink($id)
    {
        $data = [
            'name' => $this->input->post('name'),
            'category' => $this->input->post('category'),
            'price' => $this->input->post('price'),
            'stock' => $this->input->post('stock'),
        ];
        $this->db->where('id', $id);
        $this->db->update('drink', $data);
    }

    public function deleteDrink($id)
    {
        $this->db->delete('drink', ['id' => $id]);
    }
}

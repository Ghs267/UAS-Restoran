<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Food extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Food_model', 'food');
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Food and Drink Menu';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['food'] = $this->food->getFood();

        $this->form_validation->set_rules('qty', 'Qty', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('food/index', $data);
            $this->load->view('templates/footer');
        }
    }

    public function shop()
    {
        $data['title'] = 'Shopping Cart';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['food'] = $this->food->getFood();

        $this->form_validation->set_rules('name', 'Name', 'required');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('food/shop', $data);
        $this->load->view('templates/footer');
    }

    public function delete_item(){
        echo var_dump($_COOKIE['shopping_cart']); die;
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cookie_data, true);
        $id = $_POST['delete'];
        //echo var_dump($id); die;
        foreach($cart_data as $keys => $values)
        {
            echo var_dump($cart_data[$keys]['product_id']); die;
            if($cart_data[$keys]['product_id'] == $id){
                unset($cart_data[$keys]);
                $item_data = json_encode($cart_data);
                setcookie("shopping_cart", $item_data, time() + (86400 * 30));
                header(base_url() . 'food/shop');
            }
        }
    }
}

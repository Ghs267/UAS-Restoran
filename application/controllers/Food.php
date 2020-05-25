<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Food extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Food_model', 'food');
        $this->load->model('ShopCart_model', 'shopCart');
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

    public function checkout()
    {
        $post = $this->input->post();
        $id = $this->input->post('product_id');
        $qty = $this->input->post('product_qty');
        $len = count($id);
        $this->shopCart->insert_cart($_SESSION['user_id']);
        for($i=0;$i<$len;$i++){
            $this->shopCart->insert_detail($id[$i], $qty[$i]);
        }
        //setcookie("shopping_cart", "", time() - 3600, "/");
        $this->session->set_userdata('order_status', 'completed');
        redirect('Food/index');
    }

    public function checkout_AJAX()
    {
        $cart_data = $this->input->post('cart_data');

        $this->shopCart->insert_cart($_SESSION['user_id']);

        foreach($cart_data as $keys => $values)
        {
            $this->food->insert_detail($values['product_id'], $value['product_qty']);
        }
    }
}

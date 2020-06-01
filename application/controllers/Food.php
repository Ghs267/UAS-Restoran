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
            // $this->load->view('templates/header', $data);
            // $this->load->view('templates/sidebar', $data);
            // $this->load->view('templates/topbar', $data);
            $this->load->view('frontend/menu', $data);
            // $this->load->view('templates/footer');
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
        delete_cookie("shopping_cart");
        $_SESSION['rate_order'] = $this->shopCart->get_id();
        redirect(base_url().'home/history');
    }

    public function rate()
    {
        $star = $this->input->post('rating');
        $order_id = $_SESSION['rate_order'];

        //panggil model buat masukin rating ke tabel
        $this->shopCart->insert_rating($star, $order_id);
        unset($_SESSION['rate_order']);
        redirect(base_url().'home/history');
    }
}

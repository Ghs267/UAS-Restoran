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
        $data['title'] = 'Food Menu';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['food'] = $this->food->getFood();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('food/index', $data);
        $this->load->view('templates/footer');
    }
    public function shop()
    {
        $data['title'] = 'Shopping Cart';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('food/shop', $data);
        $this->load->view('templates/footer');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrderList extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_model', 'order');
    }

    public function index()
    {
        $data['order'] = $this->order->getOrderList();
        $this->load->view('templates/head.php');
        $this->load->view('frontend/history', $data);
        $this->load->view('templates/foot.php');
    }
}

?>
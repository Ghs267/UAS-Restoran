<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Food_model', 'food');
        $this->load->model('Order_model', 'order');
    }
    public function index()
    {
        if (isset($_SESSION['email'])) {
            if ($_SESSION['role_id'] == 1) {
                redirect('admin');
            } else
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
            $this->load->view('templates/head.php', $data);
        } else {
            $this->load->view('templates/head.php');
        }
        $this->load->view('frontend/index.php');
        $this->load->view('templates/foot.php');
    }

    public function menu()
    {
        $data['food'] = $this->food->getFood();

        if (isset($_SESSION['email'])) {
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $this->load->view('templates/head.php', $data);
        } else {
            $this->load->view('templates/head.php');
        }
        $this->load->view('frontend/menu.php', $data);
        $this->load->view('templates/foot.php');
    }

    public function about()
    {
        if (isset($_SESSION['email'])) {
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $this->load->view('templates/head.php', $data);
        } else {
            $this->load->view('templates/head.php');
        }
        $this->load->view('frontend/aboutus.php');
        $this->load->view('templates/foot.php');
    }

    public function history()
    {
        $data['order'] = $this->order->getOrderList();
        if (isset($_SESSION['email'])) {
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $this->load->view('templates/head.php', $data);
        } else {
            $this->load->view('templates/head.php');
        }
        $this->load->view('frontend/history', $data);
        $this->load->view('templates/foot.php');
    }

    public function cart()
    {
        $data['food'] = $this->food->getFood();
        if (isset($_SESSION['email'])) {
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $this->load->view('templates/head.php', $data);
        } else {
            $this->load->view('templates/head.php');
        }
        $this->load->view('frontend/cart.php', $data);
        $this->load->view('templates/foot.php');
    }

    public function HistoryDetail()
    {
        $id = $this->input->get('id');
        $data['history'] = $this->order->getOrderDetail($id);

        if (isset($_SESSION['email'])) {
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $this->load->view('templates/head.php', $data);
        } else {
            $this->load->view('templates/head.php');
        }

        $this->load->view('frontend/historydetail.php', $data);
        $this->load->view('templates/foot.php');
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        if (isset($_SESSION['email'])) {
            $this->load->view('templates/head.php', $data);
        } else {
            $this->load->view('templates/head.php');
        }
        $this->load->view('frontend/profile.php', $data);
        $this->load->view('templates/foot.php');
    }

    public function editprofile()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/head.php', $data);
        $this->load->view('frontend/editprofile.php', $data);
        $this->load->view('templates/foot.php');
    }

    public function changepassword()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/head.php', $data);
        $this->load->view('frontend/changepassword.php', $data);
        $this->load->view('templates/foot.php');
    }
}

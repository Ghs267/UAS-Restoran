<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Food_model', 'food');
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $query = "SELECT CONCAT_WS(' ', user.first_name, user.last_name) AS name_u, shop_cart.id_order, 
                    shop_cart_detail.id_menu, food.gambar, shop_cart_detail.qty, food.name, food.price, 
                    sum(shop_cart_detail.qty * food.price) AS total
                    FROM shop_cart JOIN shop_cart_detail ON shop_cart.id_order = shop_cart_detail.id_order 
                    JOIN food ON shop_cart_detail.id_menu = food.id 
                    JOIN user ON shop_cart.id_user = user.id  ORDER BY shop_cart.id_order;
                ";
        $data['history'] = $this->db->query($query)->result_array();
        $data['masuk'] = $this->db->query("SELECT count(id) as masuk FROM user ")->row_array();
        $data['menu'] = $this->db->query("SELECT count(id) as masuk FROM food ")->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    New Menu Added!</div>');
            redirect('admin/role');
        }
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role-access', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    New Menu Added!</div>');
            redirect('admin/role');
        }
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Access changed!!</div>');
    }

    public function food()
    {
        $data['title'] = 'Food and Drink Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['food'] = $this->food->getFood();
        $data['cat'] = $this->db->get('category')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/food', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'category' => $this->input->post('category'),
                'price' => $this->input->post('price'),
                'stock' => $this->input->post('stock'),
            ];
            $this->db->insert('food', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    New Food Menu Added!</div>');
            redirect('admin/food');
        }
    }

    public function deleteFood($id)
    {
        $this->food->deleteFood($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">The menu has ben deleted!</div>');
        redirect('admin/food');
    }

    public function editFood($id)
    {
        $this->food->saveFood($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The menu has ben edited!</div>');
        redirect('admin/food');
    }

    public function History()
    {
        $data['title'] = 'History of Selling';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $query = "SELECT CONCAT_WS(' ', user.first_name, user.last_name) AS name_u, shop_cart.id_order, 
                    shop_cart_detail.id_menu, food.gambar, shop_cart_detail.qty, food.name, food.price, 
                    shop_cart_detail.qty * food.price AS total
                    FROM shop_cart JOIN shop_cart_detail ON shop_cart.id_order = shop_cart_detail.id_order 
                    JOIN food ON shop_cart_detail.id_menu = food.id 
                    JOIN user ON shop_cart.id_user = user.id  ORDER BY shop_cart.id_order;
                ";
        $data['history'] = $this->db->query($query)->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/history', $data);
        $this->load->view('templates/footer');
    }

    public function user()
    {
        $data['title'] = 'User Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $query = "SELECT `user`.*, `user_role`.`role`
                  FROM `user` JOIN `user_role`
                  ON `user`.`role_id` = `user_role`.`id`
                ";
        $data['user_m'] = $this->db->query($query)->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('templates/footer');
    }
    public function deleteUser($id)
    {
        $this->db->delete('user', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">The menu has ben deleted!</div>');
        redirect('admin/user');
    }

    public function my()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/my.php', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('fname', 'First Name', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit.php', $data);
            $this->load->view('templates/footer');
        } else {
            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
            $email = $this->input->post('email');
            $alamat = $this->input->post('address');

            // cek jika ada gambar
            $upload = $_FILES['image']['name'];

            if ($upload) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old = $data['user']['image'];
                    if ($old != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old);
                    }
                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('image', $new_foto);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect(base_url('admin/my'));
                }
            }

            $this->db->set('first_name', $fname);
            $this->db->set('last_name', $lname);
            $this->db->set('alamat', $alamat);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your profile has been updated!!</div>');
            redirect(base_url('admin/my'));
        }
    }
    public function change()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|min_length[8]|matches[new_password1]');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/change', $data);
            $this->load->view('templates/footer');
        } else {
            $curr = $this->input->post('current_password');
            $new = $this->input->post('new_password1');
            if (!password_verify($curr, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong Current Password!</div>');
                redirect(base_url('admin/change'));
            } else {
                if ($curr == $new) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    New Password cannot be the same as current password!</div>');
                    redirect(base_url('admin/change'));
                } else {
                    // true password
                    $pass_hash = password_hash($new, PASSWORD_DEFAULT);

                    $this->db->set('password', $pass_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password Changed!</div>');
                    redirect(base_url('admin/change'));
                }
            }
        }
    }
}

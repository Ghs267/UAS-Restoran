<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
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
            $this->load->view('user/edit', $data);
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
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('first_name', $fname);
            $this->db->set('last_name', $lname);
            $this->db->set('alamat', $alamat);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your profile has been updated!!</div>');
            redirect('user');
        }
    }
    public function changePassword()
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
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $curr = $this->input->post('current_password');
            $new = $this->input->post('new_password1');
            if (!password_verify($curr, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong Current Password!</div>');
                redirect('user/changepassword');
            } else {
                if ($curr == $new) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    New Password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    // true password
                    $pass_hash = password_hash($new, PASSWORD_DEFAULT);

                    $this->db->set('password', $pass_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password Changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: magkbdev
 * Date: 10/30/13
 * Time: 3:30 PM
 */

class Login extends CI_Controller
{

    public function index()
    {
        $this->load->view("login_form");
    }

    public function validate_credentials()
    {
        $this->load->model('user_model');
        $valid = $this->user_model->validate();

        if ($valid)
        {
            $session_data = array(
                'username' => $this->input->post('username'),
                'is_logged_in' => true
            );

            $this->session->set_userdata($session_data);
            redirect('site');
        }
        else
        {
            $this->index();
        }

    }

}
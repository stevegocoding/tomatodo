<?php
/**
 * Created by PhpStorm.
 * User: magkbdev
 * Date: 10/30/13
 * Time: 2:39 PM
 */

class Site extends CI_Controller
{
    public function index()
    {
        $this->valid_session();
    }

    private function valid_session()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');

        if (isset($is_logged_in) && $is_logged_in)
        {
            $this->load->view('main');
        }
        else
        {
            $this->load->view('home');
        }
    }
} 
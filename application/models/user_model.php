<?php
/**
 * Created by PhpStorm.
 * User: magkbdev
 * Date: 10/30/13
 * Time: 3:50 PM
 */

class User_model extends CI_Model
{

    public function validate()
    {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($this->input->post('password')));

        $query = $this->db->get('user');

        if ($query->num_rows == 1)
        {
            return true;
        }

        return false;
    }



}
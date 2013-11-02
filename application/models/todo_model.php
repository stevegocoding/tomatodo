<?php
/**
 * Created by PhpStorm.
 * User: magkbdev
 * Date: 11/1/13
 * Time: 5:00 PM
 */

class Todo_model extends CI_Model
{
    public function getAll()
    {
        $result = array(array());
        $query = $this->db->get('todo');

        if ($query->num_rows() > 0)
        {
            $i = 0;
            foreach ($query->result() as $row)
            {
                $result[$i++] = $row;
            }
        }

        return $result;
    }

    public function getById($id)
    {
        $result = array();
        $query = $this->db->get_where('todo', array('id' => $id));

        if ($query->num_rows() == 1)
        {
            $result = $query->result();
        }

        return $result;
    }
}
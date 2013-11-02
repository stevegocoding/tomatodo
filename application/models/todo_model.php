<?php
/**
 * Created by PhpStorm.
 * User: magkbdev
 * Date: 11/1/13
 * Time: 5:00 PM
 */

class Todo_model extends CI_Model
{
    private $table_name = 'todo';

    public function getAll()
    {
        $result = null;
        $query = $this->db->get($this->table_name);

        if ($query->num_rows() > 0)
        {
            $i = 0;
            $result = array(array());
            foreach ($query->result() as $row)
            {
                $result[$i++] = $row;
            }
        }

        return $result;
    }

    public function getById($id)
    {
        $result = null;
        $query = $this->db->get_where($this->table_name, array('id' => $id));

        if ($query->num_rows() == 1)
        {
            $result = $query->result();
        }

        return $result;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);

        $this->db->update($this->table_name, $data);
    }

    public function add($record)
    {
        $data = array(
            'id' => $record['id'],
            'content' => $record['content'],
            'priority' => $record['priority'],
            'done' => $record['done']
        );
        $this->db->insert($this->table_name, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_name); 
    }
}
<?php
require(APPPATH.'libraries/REST_Controller.php');

/**
 * Created by PhpStorm.
 * User: magkbdev
 * Date: 10/30/13
 * Time: 11:25 PM
 */

class Todo_api extends REST_Controller
{

    public function todo_get()
    {
        /*
        if (!$this->get('id'))
        {
            $this->response(NULL, 400);
        }

        // $user = $this->some_model->getSomething( $this->get('id') );
        $users = array(
            1 => array('id' => 1, 'name' => 'Some Guy', 'email' => 'example1@example.com', 'fact' => 'Loves swimming'),
            2 => array('id' => 2, 'name' => 'Person Face', 'email' => 'example2@example.com', 'fact' => 'Has a huge face'),
            3 => array('id' => 3, 'name' => 'Scotty', 'email' => 'example3@example.com', 'fact' => 'Is a Scott!', array('hobbies' => array('fartings', 'bikes'))),
        );

        $user = @$users[$this->get('id')];

        $user = @$users[$this->get('id')];

        if($user)
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'User could not be found'), 404);
        }
        */

        $this->load->model('todo_model');
        $todo_item = $this->todo_model->getById($this->get('id'));

        if ($todo_item)
            $this->response($todo_item, 200);
        else
        {
            $this->response(array('error' => 'User could not be found'), 404);
        }
    }

    public function todo_post()
    {

    }

    public function todo_put()
    {

    }

    public function todo_delete()
    {

    }
}


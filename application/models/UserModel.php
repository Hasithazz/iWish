<?php
/**
 * Created by PhpStorm.
 * User: hsedi
 * Date: 1/22/2019
 * Time: 6:44 PM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model
{

    public function findUser($userName)
    {
        $query = $this->db->get_where('users', array('user_name' => $userName));
        if ($query->num_rows()) {
            return true;
        } else {
            return false;
        };
    }

    public function getUser($userName)
    {
        $query = $this->db->get_where('users', array('user_name' => $userName));
        return $query->row();
    }

    public function insertUser($data)
    {
        return $this->db->insert('users', $data);
    }
}

/* End of file UserModel.php */


?>
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

    public function getUser($userName)
    {
        $query = $this->db->get_where('admin', array('UserName' => $userName));
        if ($query->num_rows()) {
            return true;
        } else {
            return false;
        };
    }
}

/* End of file UserModel.php */


?>
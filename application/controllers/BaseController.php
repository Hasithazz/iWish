<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->view('utils/header');
        $this->load->model('WishListModel');

    }

    public function index()
    {
        if(isset($this->session->user_name)){

            $this->load->view('HomeViewTwo');

        }
        else{
            $this->load->view('login/loginView');
        }
        $this->load->view('utils/footer');

    }

    public function logOut()
    {
        session_destroy();
        $this->load->view('login/loginView');
        $this->load->view('utils/footer');
    }

    public function share($id)
    {
        $data['items'] = $this->WishListModel->getAllItems($id);
        $this->load->view('ShareView',$data);

    }

}

/* End of file BaseController.php */

?>
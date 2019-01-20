<?php

class BaseController extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->view('utils/header');
        
    }
    

    public function index()
    {
        $this->load->view('login/loginView');
        
    }

}

/* End of file BaseController.php */

?>
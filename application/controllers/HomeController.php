<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class HomeController extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->view('utils/header');

    }

    public function index_get()
    {
        $this->load->view('login/loginView');
        $this->load->view('utils/footer');
    }

    public function user_get()
    {
//        $users = [
//            ['user_name' => 'Hasitha', 'user_password' => 'test123']
//        ];


        $un = $this->get('user_name');
        $up = $this->get('user_password');


        if ($un === NULL || empty($un)) {
//
            $this->response([
                'status' => FALSE,
                'message' => 'User name not entered'
            ], REST_Controller::HTTP_NOT_FOUND);
        } elseif (empty($up)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Password not entered'
            ], REST_Controller::HTTP_NOT_FOUND);
        }

        $isExist = $this->UserModel->findUser($un);

        if (!$isExist) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid User Name'],
                REST_Controller::HTTP_NOT_FOUND);
        }

        $users = $this->UserModel->getUser($un);
        // Find and return a single record for a particular user.
        // Get the user from the array, using the id as key for retrieval.
        // Usually a model is to be used for this.

        if ($users->user_password === $up) {
            $this->session->set_userdata('user_name', $un);
            $this->response([
                'user_name' => $this->session->user_name,
                'status' => TRUE,
                'message' => 'Success'],
                REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid User Name or Password'],
                REST_Controller::HTTP_NOT_FOUND);
        }

        $user = NULL;

//        if (!empty($users)) {
//            foreach ($users as $key => $value) {
//                if (isset($value['user_name']) && isset($value['user_password']) && $value['user_name'] === $un && $value['user_password'] === $up) {
//                    $user = $value;
//
//                }
//            }
//        }


        if (!empty($user)) {

            $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            //$this->set_response(REST_Controller::HTTP_OK); // OK (200) being the HTTP response code

        } else {
            $this->set_response([
                'status' => FALSE,
                'message' => 'User could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }

    }

}

/* End of file HomeController.php */

?>
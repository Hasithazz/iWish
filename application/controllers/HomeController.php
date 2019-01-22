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
    }

    public function user_get()
    {
        $users = [
            ['user_name' => 'Hasitha', 'user_password' => 'test123']
        ];

        $un = $this->get('user_name');//<----------me un ekata data assign wenneth na
        $up = $this->get('user_password');


        if ($un === NULL) {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($users) {
                // Set the response and exit
                $this->response(REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.
        // Get the user from the array, using the id as key for retrieval.
        // Usually a model is to be used for this.

        $user = NULL;

        if (!empty($users)) {
            foreach ($users as $key => $value) {
                if (isset($value['user_name']) && isset($value['user_password']) && $value['user_name'] === $un && $value['user_password'] === $up) {
                    $user = $value;
                    $this->load->view('HomeView');

                }
            }
        }

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
<?php
/**
 * Created by PhpStorm.
 * User: durga
 * Date: 22/12/16
 * Time: 11:40 PM
 */
    class Login extends CI_Controller{
        public function __construct()
        {
            header('Access-Control-Allow-Origin:*');
            parent::__construct();
            // $this->load->library('session');
        }
        public function signin(){
            $postdata = file_get_contents("php://input");
            $request = json_decode($postdata);
            echo "\nemailid : ",$request->email;
            echo "\npassword : ",$request->pass;
        }
    }
?>
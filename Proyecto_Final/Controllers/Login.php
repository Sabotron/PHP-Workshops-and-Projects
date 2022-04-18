<?php
    class Login extends Controllers
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function loginCheck()
        {
            $data = $this->model->checkUser($_POST);
            print_r($data);
        }

    }
?>
<?php
    class Targets extends CI_Controller {
        public function index() {


            $this->load->view("targets");
        }

        // public function logout() {
        //     $this->session->sess_destroy();
        //     redirect("home");
        // }
    }
?>
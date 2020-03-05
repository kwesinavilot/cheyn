<?php
    class Remissions extends CI_Controller {
        public function index() {
            $this->load->view("remissions");
        }

        public function logout() {
            $this->session->sess_destroy();
            redirect("home");
        }
    }
?>
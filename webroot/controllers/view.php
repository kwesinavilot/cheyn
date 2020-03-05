<?php
    class View extends CI_Controller {
        public function index($val) {
            $data = $val;
            $this->load->view("view", $data);
        }

        public function logout() {
            $this->session->sess_destroy();
            redirect("home");
        }

        //This method is for viewing the details of an entry
        public function t($id) {
            print 'this is Page View, Method View and param ' . $id;
        }
    }
?>
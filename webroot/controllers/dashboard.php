<?php
    class Dashboard extends CI_Controller {
        public function index() {
            $cheynId = $this->session->cheynId;

            $data['top_chart'] = $this->User_model->getDashes($cheynId);

            //Get the expenses proportions of the user's buckets
            $data['inc_centiles'] = $this->Charts_model->bucket_proportions($cheynId, "income");

            //Get the expenses proportions of the user's buckets
            $data['exp_centiles'] = $this->Charts_model->bucket_proportions($cheynId, "expenses");

            //Get all the buckets of the user
            $data["buckets"] = $this->Buckets_model->get_bucket_essentials($cheynId);

            //die(print_r($data));
            
            $this->load->view("dashboard", $data);
        }

        // public function logout() {
        //     $this->session->sess_destroy();
        //     redirect("home");
        // }

        public function getHighlights() {
            $cheynId = $this->session->cheynId;

            $this->User_model->getDashes($cheynId);
        }
    }
?>
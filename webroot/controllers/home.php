<?php
    class Home extends CI_Controller {
        public function index() {
            $this->deviceDetails();

            if(!isset($this->session->cheynId)) {
                $this->load->view("home");
            } else {
                $this->load->view("dashboard");
            }
        }

        public function login() {
            $this->load->view("login");
        }

        public function signup() {
            $this->load->view("signup");
        }

        public function deviceDetails () {
            $this->load->library('user_agent');                             //Get the User Agent library

            //Check for device of access
            if ($this->agent->is_browser()) {                               //Is it a browser....
                    $agent['agent'] = $this->agent->browser() . ' ' . $this->agent->version();      //Get the browser's name and version
                    //$this->session->set_userdata('mode', 'desktop');
            } elseif ($this->agent->is_robot()) {                            //Is it a robot...
                    $agent['agent'] = $this->agent->robot();                //Get the robot
                   // $this->session->set_userdata('mode', 'robot');
            } elseif ($this->agent->is_mobile()) {                          //Mobile access...
                    $agent['agent'] = $this->agent->mobile();
                    //$this->session->set_userdata('mode', 'mobile');
            } else {                                                        //We don't know...
                    $agent['agent'] = 'Unidentified User Agent';                     //We don't know!
                    //$this->session->set_userdata('mode', 'unknown');
            }

            $agent['ip'] = $_SERVER['REMOTE_ADDR'];
            $agent['platform'] = $this->agent->platform();                  // Platform info (Windows, Linux, Mac, etc.)

            $this->session->set_userdata($agent);

            return true;
        }

        public function logout() {
            $this->session->sess_destroy();
            redirect("home");
        }

        // public function view($page = 'home') {
        //     if (!file_exists(APPATH . 'views/' . $page . '.php')) {
        //         show_404();
        //     }
        // }


    }
?>
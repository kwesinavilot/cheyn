<!-- This is the users controller. for login and signup -->
<?php
    class Users extends CI_Controller {
        private $available;
        private $name;
        private $user_email;
        private $password;

        // public function __construct() {
            
        // }

        // THis is the registration function
        public function signup() {
            //set rules for firstname
            $this->form_validation->set_rules('firstname', 'First Name', 'trim|alpha|required|max_length[25]|min_length[2]',
                                                array('alpha' => 'This field must contain only letters. eg: Kweku',
                                                        'max_length' => 'This field can contain only 25 letters',
                                                        'min_length' => 'This field must be 2 letters or more'
                                                    )
                                            );

            //set rules for lastname
            $this->form_validation->set_rules('surname', 'Surname', 'trim|alpha|required|max_length[25]|min_length[2]',
                                                array('alpha' => 'This field must contain only letters. eg: Mensah',
                                                    'max_length' => 'This field can contain only 25 letters',
                                                    'min_length' => 'This field must be 2 letters or more'
                                                    )
                                            );

            //set rules for email
            $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[100]|min_length[5]|valid_email',
                                                array('max_length' => 'This field can contain only 100 letters',
                                                    'min_length' => 'This field must be 5 letters or more'
                                                    )
                                            );

            //set rules for password
            $this->form_validation->set_rules('create-password', 'Create Password', 'trim|required|max_length[20]|min_length[6]|alpha_dash',
                                                array('alpha_dash' => 'This field must contain only letters, numbers, underscores and dashes',
                                                    'max_length' => 'This field can contain only 20 characters',
                                                    'min_length' => 'This field must be 6 characters or more'
                                                    )
                                            );

            //set rules for password
            $this->form_validation->set_rules('confirm-password', 'Confirm Password', 'trim|required|max_length[20]|min_length[6]|alpha_dash|matches[create-password]', 
                                                array('matches' => 'Passwords don\'t match',
                                                    'alpha_dash' => 'This field must contain only letters, numbers, underscores and dashes',
                                                    'max_length' => 'This field can contain only 20 characters',
                                                    'min_length' => 'This field must be 6 characters or more'
                                                    )
                                            );

            // Check if form has been submitted
            if ($this->form_validation->run() == FALSE) {       //if it hasn't submitted or there are erros
                $this->session->set_flashdata('erros', 'signup');
                $this->load->view("home");      //redirect to the home page
            } else {        //If everything is ok,
                $this->name = $this->input->post('firstname');        //Get the user's first name
                $this->user_email = $this->input->post('email');           //Get the user's email

                //Check if the account is already taken or email has been used
                $this->available = $this->User_model->isAccountAvailable($this->user_email);
                //die($this->available);

                //If the account isn't taken,
                if ($this->available == true) {
                    //Try adding a new user
                    if ($this->User_model->signup()) {       //If we successfully create the user
                        $this->session->set_flashdata('signup_success', 'Sign up successful! Enter details to login');
                        //$this->session->set_tempdata('still-signing-up', 'yes', 300);         //Let's know that we're signing up
                        
                        $this->email->sendMail($this->name, $this->user_email, 'join');                        //Send sign up email
                        redirect('home');
                    } else {
                        $this->session->set_flashdata('failed_signup', 'Unable to sign you up. Try again later');
                        redirect('home');
                    }
                } else {                                    //Notify of unavailability
                    $this->session->set_flashdata('failed_signup', 'Email already exists');
                    redirect('home');
                }
                
            }
            
        }

        // THis is the login function
        public function login() {
            //set rules for email
            $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[100]|min_length[5]|valid_email',
                                                array('max_length' => 'This field can contain only 100 letters',
                                                    'min_length' => 'This field must be 5 letters or more'
                                                    )
                                            );

            //set rules for password
            $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[20]|min_length[6]|alpha_dash',
                                                array('alpha_dash' => 'This field must contain only letters, numbers, underscores and dashes',
                                                    'max_length' => 'This field can contain only 20 characters',
                                                    'min_length' => 'This field must be 6 characters or more'
                                                    )
                                            );

            // Check if form has been submitted
            if ($this->form_validation->run() == FALSE) {       //if it hasn't submitted or there are erros
                $this->session->set_flashdata('erros', 'login');
                $this->load->view("home");      //redirect to the home page
            } else {        //If everything is ok,
                //Get from post
                $this->user_email = $this->input->post('email');
                $this->password = $this->input->post('password');

                //Login and get cheynID
                $cheynID = $this->User_model->login($this->user_email, $this->password);
                
                //If there's a successful login
                if ($cheynID) {
                    $get_user_details = $this->User_model->getUserDetails($cheynID);        //Get the user's details
                    //die($get_user_details);

                    //If we've successfully gotten the user's details,
                    if ($get_user_details) {
                        //die($this->session->firstname);
                        $this->email->sendMail($this->session->firstname, $this->user_email, 'login');                        //Send login notification email

                        redirect('dashboard');              //move on to the dashboard
                    } else {
                        //Notify of error
                        $this->session->set_flashdata('failed_login', 'We can\'t log you in at the moment. Please try again later');
                        redirect('home');
                    }
                } else {
                    $this->session->set_flashdata('failed_login', 'Incorrect email or password');
                    redirect('home');
                } 
            }
            
        }

        // This is the password reset function
        public function reset() {
            //set rules for email
            $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[100]|min_length[5]|valid_email',
                                                array('max_length' => 'This field can contain only 100 letters',
                                                    'min_length' => 'This field must be 5 letters or more'
                                                    )
                                            );
            
            // Check if form has been submitted
            if ($this->form_validation->run() == FALSE) {       //if it hasn't submitted or there are erros
                $this->session->set_flashdata('erros', 'reset');
                $this->load->view("home");      //redirect to the home page
            } else {        //If everything is ok,

                //Check if the account is already taken or email has been used
                $this->available = $this->User_model->isAccountAvailable($this->input->post('email'));
                //die($this->available);

                //If the account isn't taken, which means we don't have that email in our system, 
                if ($this->available == true) {
                    $this->session->set_flashdata('reset_success', $this->input->post('email'));
                    redirect('home');
                } else {                                    //If it is taken, meaning it is a real email, send right email
                    $this->session->set_flashdata('reset_success', $this->input->post('email'));
                    redirect('home');
                }
                
            }
        }

        //This function logs the user out
        public function logout() {
            $this->session->sess_destroy();
            redirect("home");
        }
    }
?>
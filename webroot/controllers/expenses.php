<?php
    class Expenses extends CI_Controller {
        public function index() {
            //Get the current user's ID
            $cheynId = $this->session->cheynId;
            
            $this->get_expenses();
        }

        //Function to log out
        public function logout() {
            $this->session->sess_destroy();
            redirect("home");
        }

        //Function to insert new entries into the database
        public function insert_record() {
            //die("We're inserting" . print_r($_POST));

            //set rules for date
            $this->form_validation->set_rules('date', 'Date', 'trim|required');

            //set rules for title
            $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[100]|min_length[2]');

            //set rules for amount
            $this->form_validation->set_rules('amount', 'Amount', 'trim|required|max_length[9]|min_length[1]|numeric|decimal');

            //set rules for bucket
            $this->form_validation->set_rules('bucket', 'Bucket', 'required|callback_bucketCheck');

            //set rules for description
            $this->form_validation->set_rules('description', 'Description', 'max_length[5000]|min_length[1]');

            // Check if form has been submitted
            if ($this->form_validation->run() == FALSE) {       //if it hasn't submitted or there are erros
                //die("Alll's good");
                $this->load->view('expenses/index');
            } else {        //If everything is ok,
                //die("All's good" . $this->session->cheynId);

                $cheynId = $this->session->cheynId;     //Get the current user's ID
                
                //Try inserting the new expense entry for this user
                if ($this->Expenses_model->insert_expense($cheynId)) {       //If we successfully inserted entry
                    $this->session->set_tempdata('expenses_entry_success', 'Entry saved successfully', 5);
                    redirect('expenses/index');
                } else {
                    $this->session->set_tempdata('expenses_entry_failure', 'Couldn\'t save entry! Please try again', 5);
                    redirect('expenses/index');
                }
                
            }
        }

        //Get all the expense entries of this user
        public function get_expenses() {
            $cheynId = $this->session->cheynId;     //Get the current user's ID
            
            $config = array();                                              //Create config array
            $config["base_url"] = base_url() . "expenses/get_expenses";         //set the link to the method
            $config["total_rows"] = $this->Expenses_model->record_count($cheynId);    //get total number of expense records
            $config["per_page"] = 10;                                       //set number of pages to show
            $config["uri_segment"] = 3;                                     //set the segments to show
            $choice = $config["total_rows"] / $config["per_page"];          //divide the rows by the number of pages to show
            $config["num_links"] = round($choice);                         //now, round it up and set it to the number of links to create
            //$config['enable_query_strings'] = TRUE;
            //$config['page_query_string'] = TRUE;

            //config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination" style="margin:0;">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li class="paginate_button page-item ">';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="paginate_button page-item prev">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li class="paginate_button page-item ">';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="paginate_button page-item ">';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="#" class="page-link">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li class="paginate_button page-item ">';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            //Get all the incomes per this page
            $data["expenses"] = $this->Expenses_model->get_spec_expenses($config["per_page"], $page, $cheynId);

            //Get the total records the user has
            $data["total_rows"] = $config["total_rows"];

            //Get the pagination links
            $data["links"] = $this->pagination->create_links();

            //Get all the buckets of the user
            $data["buckets"] = $this->Buckets_model->get_bucket_essentials($cheynId);

            //Get the expenses proportions of the user's buckets
            $data['centiles'] = $this->Charts_model->bucket_proportions($cheynId, "expenses");

            //Get the expenses proportions of the user's buckets
            $data['monthlies'] = $this->Charts_model->monthlies($cheynId, "expenses");

            $this->load->view("expenses/index", $data);
        }

        // Get all the buckets of the user
        public function get_buckets($cheynId) {
            //Get the passed CheynId
            $this->cheynId = $cheynId;

            $buckets = $this->Buckets_model->get_bucket_essentials($cheynId);
             
            return $buckets;
        }

        public function bucketCheck($value){               //Use anonymouse method to check value
            if($value == "select") {    //If it's 'Select'
                $this->form_validation->set_message('bucketCheck', 'You\'ve to select a proper bucket');
                return false;           //Lodge error
            } else {
                return true;            //If it's not 'Select', continue
            }
        }

        //This method is for viewing the details of an entry
        public function view($id) {
            $cheynId = $this->session->cheynId;     //Get the current user's ID

            $data['content'] = $this->Expenses_model->get_expense($cheynId, $id);
            //die(print_r($data['content']));

            //Check if there's a content for the view id...
            if(empty($data['content'])){
                show_404();                         //...if there's nothing, show the 404 page;
            }

            $this->load->view('expenses/view', $data);
        }

        //This method is for an entry
        public function delete($id) {
            $cheynId = $this->session->cheynId;     //Get the current user's ID

            $data['reply'] = $this->Expenses_model->delete_income($cheynId, $id);
            //die(print_r($data['reply']));

            //Check if there's a content for the view id...
            if(empty($data['reply'])){
                show_404();                         //...if there's nothing, show the 404 page;
            }

            redirect('expenses/index');
        }

        //This method is for an entry
        public function edit($id) {
            $cheynId = $this->session->cheynId;     //Get the current user's ID

            $data['content'] = $this->Expenses_model->get_expense($cheynId, $id);
            //die(print_r($data['content']));

            //Get all the buckets of the user
            $data["buckets"] = $this->Buckets_model->get_bucket_essentials($cheynId);

            //Check if there's a content for the view id...
            if(empty($data['content'])){
                show_404();                         //...if there's nothing, show the 404 page;
            }

            $this->load->view('expenses/edit', $data);
        }

        //Function to update entries into the database
        public function update($id) {
            //die("We're inserting " . $id);

            //set rules for date
            $this->form_validation->set_rules('date', 'Date', 'trim|required');

            //set rules for title
            $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[100]|min_length[2]');

            //set rules for amount
            $this->form_validation->set_rules('amount', 'Amount', 'trim|required|max_length[9]|min_length[1]|numeric|decimal');

            //set rules for bucket
            $this->form_validation->set_rules('bucket', 'Bucket', 'required|callback_bucketCheck');

            //set rules for description
            $this->form_validation->set_rules('description', 'Description', 'max_length[5000]|min_length[1]');

            // Check if form has been submitted
            if ($this->form_validation->run() == FALSE) {       //if it hasn't submitted or there are erros
                $cheynId = $this->session->cheynId;     //Get the current user's ID

                $data['content'] = $this->Expenses_model->get_expense($cheynId, $id);
                //die(print_r($data['content']));

                //Check if there's a content for the view id...
                if(empty($data['content'])){
                    show_404();                         //...if there's nothing, show the 404 page;
                } else {
                    //Get all the buckets of the user
                    $data["buckets"] = $this->Buckets_model->get_bucket_essentials($cheynId);

                    $this->load->view('expenses/edit', $data);
                }

            } else {        //If everything is ok,
                //die("All's good" . $this->session->cheynId);

                $cheynId = $this->session->cheynId;     //Get the current user's ID
                
                //Try inserting the new income entry for this user
                if ($this->Expenses_model->update_expense($cheynId, $id)) {       //If we successfully inserted entry
                    $this->session->set_flashdata('update_entry_success', 'Entry updated successfully');
                    redirect('expenses/view/' . $id);
                } else {
                    $this->session->set_flashdata('update_entry_failure', 'Couldn\'t update entry! Please try again');
                    redirect('expenses/view/'  . $id);
                }
                
            }
        }
    }
?>
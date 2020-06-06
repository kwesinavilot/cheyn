<?php
    class Buckets extends CI_Controller {
        public function index() {
            //die($this->Buckets_model->generateBucketShort("Utilities678"));

            $cheynId = $this->session->cheynId;     //Get the current user's short

            $data['buckets'] = $this->get_buckets($cheynId);
            $this->load->view("buckets/index", $data);
        }

        // public function logout() {
        //     $this->session->sess_destroy();
        //     redirect("home");
        // }

        //Function to add new buckets into the database
        public function add_bucket() {
            //die("We're adding" . print_r($_POST));

            //set rules for name
            $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[25]|min_length[2]|callback_name_check[buckets.name]');

            //set rules for label-color
            $this->form_validation->set_rules('label-color', 'Label Color', 'required|callback_color_check');

            //set rules for description
            $this->form_validation->set_rules('description', 'Description', 'max_length[5000]|min_length[1]');

            // Check if form has been submitted
            if ($this->form_validation->run() == FALSE) {       //if it hasn't submitted or there are erros
                //die("Alll's good");
                $this->load->view('buckets/index');
            } else {        //If everything is ok,
                //die("All's good" . $this->session->cheynId);

                $cheynId = $this->session->cheynId;     //Get the current user's short
                
                //Try adding the new bucket entry for this user
                if ($this->Buckets_model->add_bucket($cheynId)) {       //If we successfully added entry
                    //Send bucket create notification email
                    $this->email->sendMail($this->session->firstname, $this->session->email, 'bucket-create');                    

                    $this->session->set_tempdata('bucket_entry_success', 'Bucket has been added successfully', 5);
                    redirect('buckets/index');
                } else {
                    $this->session->set_tempdata('bucket_entry_failure', 'Couldn\'t add bucket! Please try again', 5);
                    redirect('buckets/index');
                }
                
            }
        }

        // This function fetches all the buckets of the user
        public function get_buckets($cheynId) {
            //Get the passed CheynId
            $this->cheynId = $cheynId;

            $buckets = $this->Buckets_model->get_all_buckets($cheynId);
            //die(print_r($data));

            return $buckets;
        }

        public function color_check($value){               //Use anonymous method to check value
            if($value == "select") {    //If it's 'Select'
                $this->form_validation->set_message('color_check', 'You\'ve to select a proper color');
                return false;           //Lodge error
            } else {
                return true;            //If it's not 'Select', continue
            }
        }

        public function name_check($value){
            $this->cheynId = $this->session->cheynId;

            //Get all the buckets of the user
            $buckets = $this->Buckets_model->get_all_buckets($this->cheynId);
            //die(print_r($buckets));

            //first check if something was returned
            if(!empty($buckets)) {
                //Now check if they've already used that bucket name
                foreach ($buckets as $bucket) {
                    //If they have...
                    if ($bucket->name == $value) {
                        //Tell them to change
                        $this->form_validation->set_message('name_check', 'You\'ve used this bucket name already');
                        return false;
                    } else {
                        //If they haven't used it, continue...
                        return true;
                    }
                }
            } else {            //If nothing was returned, continue...
                return true;
            }
        }

        //This method is for an entry
        public function edit($short) {
            $cheynId = $this->session->cheynId;     //Get the current user's short

            $data['content'] = $this->Buckets_model->get_bucket($cheynId, $short);
            //die(print_r($data['content']));

            //Get all the buckets of the user
            $data["buckets"] = $this->Buckets_model->get_bucket_essentials($cheynId);

            //Check if there's a content for the view short...
            if(empty($data['content'])){
                show_404();                         //...if there's nothing, show the 404 page;
            }

            $this->load->view('buckets/edit', $data);
        }

        //Function to update entries into the database
        public function update($short) {
            //die("We're inserting " . $short);

            //set rules for title
            $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[100]|min_length[2]');

            //set rules for label-color
            $this->form_validation->set_rules('label-color', 'Label Color', 'required|callback_color_check');

            //set rules for description
            $this->form_validation->set_rules('description', 'Description', 'max_length[5000]|min_length[1]');

            // Check if form has been submitted
            if ($this->form_validation->run() == FALSE) {       //if it hasn't submitted or there are erros
                $cheynId = $this->session->cheynId;     //Get the current user's short

                $data['content'] = $this->Buckets_model->get_bucket($cheynId, $short);
                //die(print_r($data['content']));

                //Check if there's a content for the view short...
                if(empty($data['content'])){
                    show_404();                         //...if there's nothing, show the 404 page;
                } else {
                    //Get all the buckets of the user
                    $data["buckets"] = $this->Buckets_model->get_bucket_essentials($cheynId);

                    $this->load->view('buckets/edit', $data);
                }

            } else {        //If everything is ok,
                //die("All's good" . $this->session->cheynId);

                $cheynID = $this->session->cheynId;     //Get the current user's short
                
                //Try inserting the new income entry for this user
                if ($this->Buckets_model->update_bucket($cheynID, $short)) {       //If we successfully inserted entry
                    $this->session->set_flashdata('update_entry_success', 'Entry updated successfully');
                    redirect('buckets/insights/' . $short);
                } else {
                    $this->session->set_flashdata('update_entry_failure', 'Couldn\'t update entry! Please try again');
                    redirect('buckets/insights/'  . $short);
                }
                
            }
        }

        //This method is for viewing the details of an entry
        public function insights($id) {
            $cheynId = $this->session->cheynId;     //Get the current user's ID

            $data['content'] = $this->Buckets_model->get_bucket($cheynId, $id);
            //die(print_r($data['content']));

            //Check if there's a content for the view id...
            if(empty($data['content'])){
                show_404();                         //...if there's nothing, show the 404 page;
            }

            $this->load->view('buckets/insights', $data);
        }
    }
?>
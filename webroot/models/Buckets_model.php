<?php
    class Buckets_model extends CI_Model {

        public $cheynId;

        function __construct() {
			//$this->generateBucketShort("Food");
        }

        //add a new bucket
        public function add_bucket($userCheynId) {
            //die("adding " . $this->session->cheynId);

            //Get the passed CheynId
            $this->cheynId = $userCheynId;

            // Get the data from $_POST into an array
            $data = array(
                'cheynID' => $this->cheynId,
                'name' => $this->input->post('name'),
                'short' => $this->generateBucketShort($this->input->post('name')),
                'color' => $this->input->post('label-color'),
                'description' => $this->input->post('description')
            );

            $this->session->set_userdata('bucket_name', $this->input->post('name'));

            // set up add query with tablename, values to add
            $add_bucket_entry = $this->db->insert('buckets', $data);

            if ($add_bucket_entry) {
                return true;
            } else {
                return false;
            }
        }

        //Get all the bucket entries of this user
        public function get_all_buckets($userCheynId) {
            //Get the passed CheynId
            $this->cheynId = $userCheynId;

            //Create where query
            $query = $this->db->get_where(
                'buckets',                               //Select * from bucket
                array('cheynID' => $this->cheynId)      //where cheynID = user's id
            );

            return $query->result();
        }

        //Get the number of returned rows
        public function record_count($cheynId) {
            $this->db->where('cheynID', $cheynId);      //Select * based on cheynId
            $this->db->from("buckets");                //from buckets
            return $this->db->count_all_results();
        }

        //This function gets a specific number of entries based on the parameters
        //@param $limit is the total number to retrieve
        //@param $start is where to start or ignore from
        public function get_spec_bucket($limit, $start, $cheynId) {
            //Get the passed CheynId
            $this->cheynId = $cheynId;

            //Set the limits to retrieve
            $this->db->limit($limit, $start);

            //Create where query
            $query = $this->db->get_where(
                'bucket',                               //Select * from bucket
                array('cheynID' => $this->cheynId)      //where cheynID = user's id
            );
    
            //Put the data into an array
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }

                return $data;
            }
            
            return false;
       }

        //Get only the bucket names for this user
        public function get_bucket_essentials($userCheynId) {
            //Get the passed CheynId
            $this->cheynId = $userCheynId;

            //Create where query
            $this->db->select('short, name, color');                         //Select bucket bucketID, names
            $this->db->where('cheynID', $this->cheynId);          //Where cheynID = the passed cheynId
            $query = $this->db->get('buckets');               //from the user's table

            return $query->result();
        }

        public function generateBucketShort($bucketName){
            $sub = strtoupper(substr($bucketName, 0, 2));       //get the uppercase version of the first 2 letter of the bucket name
            //die($sub);

            $charset = '0123456789';                            //charset to randomize
            $length = 5;                                        //length to get
            $input_length = strlen($charset);
            $random_string = '';
    
            for($i = 0; $i < $length; $i++) {
                $random_character = $charset[mt_rand(0, $input_length - 1)];
                $random_string .= $random_character;
            }
    
            $gened = "BKT" . $sub . $random_string;
            //die($gened);
            return $gened;
        }

        //Get all the buckets entries of this user
        public function get_bucket($userCheynId, $short) {
            //Get the passed CheynId
            $this->cheynId = $userCheynId;
            $this->short = $short;

            //Create where query
            $query = $this->db->get_where(
                'buckets',                               //Select * from buckets
                array(
                    'cheynID' => $this->cheynId,       //where cheynID = user's id
                    'short' => $this->short      //and id = the passed id
                    //'title' => $this->id      //and title = the passed title
                )      
            );

            //die(print_r($query->result()));

            return $query->row();
        }

        //Update the buckets
        public function update_bucket($userCheynId, $short) {
            //die("Inserting " . $this->session->cheynId);

            //Get the passed CheynId
            $this->cheynId = $userCheynId;

            //die(print_r($_POST));

            // Get the data from $_POST into an array
            $data = array(
                'name' => $this->input->post('name'),
                'color' => $this->input->post('label-color'),
                'description' => $this->input->post('description')
            );

            // set up update query with tablename, values to insert and checkpoints
            $this->db->where('short', $short);
            $update_buckets_entry = $this->db->update('buckets', $data);

            if ($this->db->affected_rows() == 1) {
                return true;
            } else {
                return false;
            }
        }
    }
?>
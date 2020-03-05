<?php
    class Income_model extends CI_Model {

        public $cheynId;
        private $id;

        //Insert a new income
        public function insert_income($userCheynId) {
            //die("Inserting " . $this->session->cheynId);

            //Get the passed CheynId
            $this->cheynId = $userCheynId;

            // Get the data from $_POST into an array
            $data = array(
                'cheynID' => $this->cheynId,
                'entry_date' => $this->input->post('date'),
                'title' => $this->input->post('title'),
                'amount' => $this->input->post('amount'),
                'bucket' => $this->input->post('bucket'),
                'description' => $this->input->post('description')
            );

            // set up insert query with tablename, values to insert
            $insert_income_entry = $this->db->insert('income', $data);

            if ($insert_income_entry) {
                return true;
            } else {
                return false;
            }
        }

        //Get all the income entries of this user
        public function get_income($userCheynId, $id) {
            //Get the passed CheynId
            $this->cheynId = $userCheynId;
            $this->id = $id;

            //Create where query
            $query = $this->db->get_where(
                'income',                               //Select * from income
                array(
                    'cheynID' => $this->cheynId,       //where cheynID = user's id
                    'id' => $this->id      //and id = the passed id
                    //'title' => $this->id      //and title = the passed title
                )      
            );

            //die(print_r($query->result()));

            return $query->row();
        }

        //Get the number of returned rows
        public function record_count($cheynId) {
            $this->db->where('cheynID', $cheynId);
            $this->db->from("income");
            return $this->db->count_all_results();
        }

        //This function gets a specific number of entries based on the parameters
        //@param $limit is the total number to retrieve
        //@param $start is where to start or ignore from
        public function get_spec_income($limit, $start, $cheynId) {
            //Get the passed CheynId
            $this->cheynId = $cheynId;

            //Set the limits to retrieve
            $this->db->limit($limit, $start);

            //Create where query
            $query = $this->db->get_where(
                'income',                               //Select * from income
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

        //Delete the income entry of this user
        public function delete_income($userCheynId, $id) {
            //Get the passed CheynId
            $this->cheynId = $userCheynId;
            $this->id = $id;

            //Create delete query
            $query = $this->db->delete(
                'income',                               //Delete from income
                array(
                    'cheynID' => $this->cheynId,       //where cheynID = user's id
                    'id' => $this->id      //and id = the passed id
                    //'title' => $this->id      //and title = the passed title
                )      
            );

            if ($this->db->affected_rows() == 1) {
                return true;
            } else {
                return false;
            }
        }

        //Update the income
        public function update_income($userCheynId, $id) {
            //die("Inserting " . $this->session->cheynId);

            //Get the passed CheynId
            $this->cheynId = $userCheynId;

            // Get the data from $_POST into an array
            $data = array(
                'cheynID' => $this->cheynId,
                'entry_date' => $this->input->post('date'),
                'title' => $this->input->post('title'),
                'amount' => $this->input->post('amount'),
                'bucket' => $this->input->post('bucket'),
                'description' => $this->input->post('description')
            );

            // set up update query with tablename, values to insert and checkpoints
            $this->db->where('id', $id);
            $update_income_entry = $this->db->update('income', $data);

            if ($this->db->affected_rows() == 1) {
                return true;
            } else {
                return false;
            }
        }
    }
?>
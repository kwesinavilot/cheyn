<?php
    class Expenses_model extends CI_Model {

        public $cheynId;

        //Insert a new expense
        public function insert_expense($userCheynId) {
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
            $insert_expense_entry = $this->db->insert('expenses', $data);

            if ($insert_expense_entry) {
                return true;
            } else {
                return false;
            }
        }

        //Get all the expenses entries of this user
        public function get_expense($userCheynId, $id) {
            //Get the passed CheynId
            $this->cheynId = $userCheynId;
            $this->id = $id;

            //Create where query
            $query = $this->db->get_where(
                'expenses',                               //Select * from expenses
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
            $this->db->from("expenses");
            return $this->db->count_all_results();
        }

        //This function gets a specific number of entries based on the parameters
        //@param $limit is the total number to retrieve
        //@param $start is where to start or ignore from
        public function get_spec_expenses($limit, $start, $cheynId) {
            //Get the passed CheynId
            $this->cheynId = $cheynId;

            //Set the limits to retrieve
            $this->db->limit($limit, $start);

            //Create where query
            $query = $this->db->get_where(
                'expenses',                               //Select * from expenses
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

        //Delete the expenses entry of this user
        public function delete_expenses($userCheynId, $id) {
            //Get the passed CheynId
            $this->cheynId = $userCheynId;
            $this->id = $id;

            //Create delete query
            $query = $this->db->delete(
                'expenses',                               //Delete from expenses
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

        //Update the expenses
        public function update_expense($userCheynId, $id) {
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
            $update_expenses_entry = $this->db->update('expenses', $data);

            if ($this->db->affected_rows() == 1) {
                return true;
            } else {
                return false;
            }
        }
    }
?>
<?php
    //This model is for fetching chat data
    class Charts_model extends CI_Model {

        public $cheynId;        //user identifier
        private $table;          //Lookup target

        //This function is for fetching the percentage share of each bucket for the user
        // @param cheynId is the cheynId of the user
        // @param table is the table to perform the lookup on either Income or Expenses
        public function bucket_proportions($userCheynId, $table){
            $this->cheynId = $userCheynId;
            $this->table = $table;

            //Get all the buckets of the user
            $userBuckets = $this->Buckets_model->get_bucket_essentials($this->cheynId);

            //die(print_r($userBuckets));

            if(!empty($userBuckets)) {
                //die("Hi" . print_r($userBuckets));
                //Loop through all the bucket and get the totals of each of them
                foreach ($userBuckets as $bucket) {
                    //Get the total of the current bucket for the user from the target table
                    $this->db->select('SUM(' . $this->table . '.amount) AS ' . $bucket->short . '');              //Select the sum the table as the bucket name in small letters
                    $array = array('cheynID' => $this->cheynId, 'bucket' => $bucket->name);                              //Create where condition: cheynID = id of user and bucket = current bucket
                    //$array = array('cheynID' => $this->cheynId, "'short'" => $bucket->short);                              //Create where condition: cheynID = id of user and bucket = current bucket
                    $this->db->where($array);                                                                            //Put the where clause into it   
                    $query = $this->db->get($this->table);                                                               //from the target table
                    //die(print_r($query->row_array($bucket->short)));

                    //Get the result for a brief moment and set it to interim
                    $interim = $query->row_array($bucket->short);
                    //die(print_r($interim[$bucket->short]));

                    //If there's no value, then put 0 there
                    if($interim[$bucket->short] == 0) {
                        $interim[$bucket->short] = 0.00;
                    }

                    //$sums[$bucket->short] = $query->row_array($bucket->short);
                    $sums[$bucket->short] = $interim[$bucket->short];                       //Now extract just the value and add to array
                }
            } else {
                //die("HIII");
                $sums = 0;
            }

            //die(print_r($sums));
            return $sums;
        }

        //This function is for fetching the data of the user based on months of the current year
        // @param cheynId is the cheynId of the user
        // @param table is the table to perform the lookup on either Income or Expenses
        public function monthlies($userCheynId, $table) {
            $this->cheynId = $userCheynId;
            $this->table = $table;
            //die($this->cheynId . " ~ " . $this->table);

            if ($this->table == "expenses") {
                $this->id = "id";
            } else {
                $this->id = "id";
            }
            

            //Get the total of each month from the target table
            $this->db->select('COUNT(' . $this->id . ') entries, MONTHNAME(entry_date) month, SUM(amount) amount');                                              //SELECT MONTH(entry_date) month, SUM(amount) amount
            $this->db->group_by('MONTH(entry_date)');                                                                                //Group the results by month
            $clause = "cheynID = '" . $this->cheynId . "' AND YEAR(entry_date) = YEAR(CURRENT_DATE())";                             //Create where condition: cheynID = id of user and year = the current year(by default)
            $this->db->where($clause);                                                                                    //Put the where clause into it   
            $query = $this->db->get($this->table);                                                                       //from the target table

            //die(print_r($query->result_array()));
            return $query->result();
        }
    }
?>
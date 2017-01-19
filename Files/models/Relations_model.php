<?php
/*
* this model handels database requests and entries for relations
*/
class Relations_model extends CI_Model {

	/*
	* gets the database
	*/
        public function __construct()
        {
                $this->load->database();
        }
	
	/*
	* gets names and slugs for all members related to a school based on the relations table with the schools id
	*/
	public function get_school_members($schID)
	{
     
                $query = $this->db->query("SELECT m.name, m.slug FROM Member as m, 
					   Relations as r WHERE r.schID = '$schID' 
					   AND m.id = r.id;");
                return $query->result_array();
       	}

	/*
	* gets names and slugs for all schools related to a member based on the relations table with the member's id
	*/
	public function get_member_schools($id)
	{
     
                $query = $this->db->query("SELECT s.name, s.slug FROM School as s, 
					   Relations as r WHERE r.id = '$id' 
					   AND s.schID = r.schID;");
                return $query->result_array();
       	}		
}

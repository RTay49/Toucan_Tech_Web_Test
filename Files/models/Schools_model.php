<?php
/*
* this model handels database requests and entries for schools
*/
class Schools_model extends CI_Model {

	/*
	* gets the database
	*/
        public function __construct()
        {
                $this->load->database();
        }
	
	/*
	* a method for getting schools from the Schools Table
	*/
	public function get_schools($slug = FALSE)//with no argument it grabs all schools
	{
        	if ($slug === FALSE)
        	{
                	$query = $this->db->get('School');
                	return $query->result_array();
       		 }
		$query = $this->db->get_where('School', array('slug' => $slug));//with a slug argument will only get one
        	return $query->row_array();
	}

	/*
	*gets a schools's id with a slug
	*/
	public function get_school_id($slug)
	{
		$id = $this->db->select('schID')
					->get_where('School', array('slug' => $slug))
					->row()
					->schID;
		
		return $id;
        	 
	}
}


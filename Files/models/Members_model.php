<?php
/*
* this model handels database requests and entries for members
*/
class Members_model extends CI_Model {

	/*
	* gets the database
	*/
        public function __construct()
        {
                $this->load->database();
        }
	
	
	/*
	* a method for getting members from the Member Table
	*/
	public function get_members($slug = FALSE)
	{
        	if ($slug === FALSE)//with no argument it grabs all members
        	{
               		$query = $this->db->get('Member');
                	return $query->result_array();
        	}
	 	$query = $this->db->get_where('Member', array('slug' => $slug));//with a slug argument will only get one
        	return $query->row_array();
	}
	
	/*
	*grabs a member's id by matching the email as in an ideal world thouse would all be unique.
	*/
	public function get_last_member($email)
	{
		$id = $this->db->select('ID')
					->get_where('Member', array('email' => $email))
					->row()
					->ID;
		
		return $id;
        	 
	}
	
	/*
	*gets a member's id with a slug
	*/
	public function get_member_id($slug)
	{
		$id = $this->db->select('id')
					->get_where('Member', array('slug' => $slug))
					->row()
					->id;
		
		return $id;
        	 
	}
	/*
	*posts data to the members table
	*/
	public function make_member()
	{
    		$this->load->helper('url');

    		$slug = url_title($this->input->post('name'), 'dash', TRUE);//gets rid of the spaces for slugs

    		$data = array(
        		'name' => $this->input->post('name'),
        		'slug' => $slug,
        		'email' => $this->input->post('email')
    		);

    		return $this->db->insert('Member', $data);
	}
	

	/*
	*posts to the Relations table with a member id and a school id
	*/
	public function add_relations($lastmember, $school)
	{
    		

		$data = array( 'id' => ($lastmember),
				'schID' => ($school)
		);		

    		return $this->db->insert('Relations', $data);
	}
	
}


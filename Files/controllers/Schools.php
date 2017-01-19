<?php
/*
*This controller handels indexing schools as well as looking at ones in detail.
*/
class Schools extends CI_Controller {

	/*
	*loads some models and tools to use
	*/
        public function __construct()
        {
                parent::__construct();
                $this->load->model('Schools_model');
		$this->load->model('Relations_model');
                $this->load->helper('url_helper');
        }
	/*
	*lists all Schools from the database
	*/
        public function index()
        {
		//uses the get schools method in the Schools_model with no argument to get an array of all schools
       		$data['schools'] = $this->Schools_model->get_schools();
		$data['title'] = 'Schools';

        	$this->load->view('templates/header', $data);
        	$this->load->view('schools/index', $data);
        	$this->load->view('templates/footer');
        }
	
	/*
	*gets the details about a selected school
	*/
        public function view($slug = NULL)
        {
        	//uses the get school method in the Schools_model with an argument to get details about one school
		$data['school'] = $this->Schools_model->get_schools($slug);
		
		//gets a school's id based on the slug
		$schid = $this->Schools_model->get_school_id($slug);

		//finds all the members with that id linked to it in the Relations table
		$data['relations'] = $this->Relations_model->get_school_members($schid);
	
	
		if (empty($data['school']))
        	{
                show_404();
        	}

        	$data['name'] = $data['school']['name'];

        	$this->load->view('templates/header', $data);
       		$this->load->view('schools/view', $data);
       		$this->load->view('templates/footer');
        }
}

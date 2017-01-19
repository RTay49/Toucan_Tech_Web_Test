<?php
/*
*This controller handels all things to do whith members form 
* indexing all of them, adding new ones or looking at one in detail.
*/
class Members extends CI_Controller {
	/*
	*Builds some tools and models that will be used
	*/
	public function __construct()
        {
                parent::__construct();
                $this->load->model('Members_model');
		$this->load->model('Schools_model');		
		$this->load->model('Relations_model');                
		$this->load->helper('url_helper');
        }
	/*
	*lists all members from the database
	*/
        public function index()
        {
		//uses the get members method in the Memebers_model with no argument to get an array of all members
	        $data['members'] = $this->Members_model->get_members();
		
		$data['title'] = 'Members';
		
	        $this->load->view('templates/header');
	        $this->load->view('members/index', $data);
	        $this->load->view('templates/footer');
        }
	/*
	*gets the details about a selected member
	*/
        public function view($slug = NULL)
        {
        	//uses the get members method in the Memebers_model with an argument to get details about one member
		$data['member'] = $this->Members_model->get_members($slug);
		
		//gets a member's id based on the slug
		$id = $this->Members_model->get_member_id($slug);
		
		//finds all the schools with that id linked to it in the Relations table		
		$data['relations'] = $this->Relations_model->get_member_schools($id); 
		
		
		if (empty($data['member']))
	        {
                	show_404();
	        }

        	$data['name'] = $data['member']['name'];
	
	        $this->load->view('templates/header');
	        $this->load->view('members/view', $data);
	        $this->load->view('templates/footer');
        }

	
	/*
	*makes a new member
	*/
	public function create()
	{	
		//codeingnighter tools to help with form and vailidation
	        $this->load->helper('form');
	        $this->load->library('form_validation');
		//Used to grab all the school for selecting a school 
		$data['schools'] = $this->Schools_model->get_schools();
	        $data['title'] = 'Sign up';
		//simple codeingnighter validations
	        $this->form_validation->set_rules('name', 'Name', 'required');
	        $this->form_validation->set_rules('email', 'Email', 'required');		
		
		//a custom validation for the schools see the method count_checkbox for details		
		$this->form_validation->set_rules('school[]', 'School', 'required|callback_count_checkbox');
		
	        if ($this->form_validation->run() === FALSE)
	        {
			$this->load->view('templates/header', $data);
			$this->load->view('members/signup');
			$this->load->view('templates/footer');

	        }
	        else
	        {	//creates the member in the Member table
	        	$this->Members_model->make_member();
			
			//gets the members email address			
			$email = $this->input->post('email');
			
			//gets member's id with the email address			
			$lastmember = $this->Members_model->get_last_member($email);
			
			//gets the schools
			$schools = $this->input->post('school[]');
			
			//adds each school id (schID) on the relations table with the member id
			foreach ($schools as $school)	{ 
			
				$this->Members_model->add_relations($lastmember, $school);
	
			}
			
			//success message :)
			$this->load->view('members/success');
	        }
	
	}
	/*
	* checks that the member atleast checked one school
	*/	
	public function count_checkbox($str){
		
		//counts array given back from the checkbox form andd makes sure it is over zero.
		if(count($this->input->post('school[]')) > 0){
			return TRUE;//passes validation
		}else { 
			$this->form_validation->set_message("count_checkbox","Please choose at least one school.");
			return FALSE;//fails with custom message
		}
		
	}
}

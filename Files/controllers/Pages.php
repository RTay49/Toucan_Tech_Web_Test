<?php
/*
* This controller just loads a basic home page and checks the url.
*/ 
class Pages extends CI_Controller {

        public function view($page = 'home')
        {
        	if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        	{
                	show_404();
        	}

		/*
		* Loads header, view page and footer.
		*/ 
		$data['title'] = ucfirst($page); 
		$this->load->view('templates/header');
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}

}

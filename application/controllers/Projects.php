<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
		parent::__construct();

		// Load url helper
        $this->load->model('project_model');
		$this->load->helper('url');
		$this->load->helper('form');
		parse_str($_SERVER['QUERY_STRING'], $_GET); 
	}

	public function index() {
		$action = $this->input->post('action');
		$this->db->error();
		$data['projects'] = $this->project_model->get_projects();
		if($action === 'Delete'){
			$this->load->view('project_list');
		}else{
			$this->load->view('project_list', $data);
		}
	}

	public function create(){
		$this->project_model->set_projects();
		redirect('/projects', 'refresh');
	}

	public function edit(){
		$this->project_model->edit_projects();
		redirect('/projects', 'refresh');
	}

	public function data($id){
		echo json_encode($this->project_model->get_projects($id));
	}

	public function delete(){
		$id = $this->input->post('id');
		$this->project_model->delete_project($id);
		redirect(base_url(), 'refresh');
	}

}

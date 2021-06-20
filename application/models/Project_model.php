<?php
class Project_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function get_projects($id = FALSE){
        if($id === FALSE){
            $query = $this->db->get('projects');
            return $query->result_array();
        }
        $query = $this->db->get_where('projects', array('id' => $id));
        return $query->row_array();
    }

    public function set_projects(){

        $data = array(
            'name' => $this->input->post('name'),
            'status' => $this->input->post('status'),
            'types' => $this->input->post('type'),
            'deadline' => $this->input->post('deadline')
        );

        return $this->db->insert('projects', $data);
    }

    public function edit_projects(){
        $id = $this->input->post('id');
        $this->db->set('name', $this->input->post('name'));
        $this->db->set('status', $this->input->post('status'));
        $this->db->set('types', $this->input->post('type'));
        $this->db->set('deadline', $this->input->post('deadline'));
        $this->db->where('id', $id);
        return $this->db->update('projects');
    }

    public function delete_project($id){
        $this->db->where('id', $id);
        $this->db->delete('projects');
    }
}
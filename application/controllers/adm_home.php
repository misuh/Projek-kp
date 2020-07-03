<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class adm_home extends CI_Controller

{
        public function __construct(){
           parent::__construct();
        if ($this->session->userdata('roles_id') !=  1) {
            $this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert"> Anda belum Login ! </div>');
            redirect('auth');
        }
        }
		public function index(){
		$data['user'] = $this->db->get_where('usr',['email' => 
		$this->session->userdata('email')]) -> row_array();
        
        if($this->input->post('submit')){
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword',$data['keyword']);
        }else{
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('name',$data['keyword']);
        $this->db->or_like('email',$data['keyword']);

        $config['total_rows']       = $this->admin_model->countalluser();
        $data['total_rows1']         = $config['total_rows'];

        $data['start'] = $this->uri->segment(3);
        $data['isitabel'] = $this->admin_model->selectuser($data['start'],$data['keyword']);
          

    	$data['title'] = 'Admin Home';
		$this->load->view('temp/header',$data);
    	$this->load->view('temp/adm_side',$data);
    	$this->load->view('temp/top',$data);
        $this->load->view('Menu/adm_menu',$data);
        $this->load->view('temp/footer',$data);
        }


        public function edit_user($id){
        $where = array('id' =>$id);
        $data['data'] = $this->db->get_where('usr',$where)->result();
        $data['roles'] = $this->db->get('usr_role')->result();
        $data['title'] = 'Edit Data User';
        $data['user'] = $this->db->get_where('usr',['email' => 
        $this->session->userdata('email')]) -> row_array();
        $this->load->view('temp/header',$data);
        $this->load->view('temp/adm_side',$data);
        $this->load->view('temp/top',$data);
        $this->load->view('Menu/editusrdata',$data);
        $this->load->view('temp/footer',$data);
        }

        public function update_user(){
            $id    = $this->input->post('id');
            $name    = $this->input->post('name');
            $email      = $this->input->post('email');
            $roles_id = $this->input->post('roles_id');

            $data = array(
                'name' => $name,
                'email' => $email,
                'roles_id' => $roles_id
            );
            $where = array('id' => $id);
            $this->db->where($where);
            $this->db->update('usr',$data);
            redirect('adm_home');
        }

        

        public function hapus_user($id){
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('usr');
        redirect('adm_home');
        }
}
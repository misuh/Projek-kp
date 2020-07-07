<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{   
    public function __construct(){
            parent ::__construct();
            if($this->session->userdata('roles_id') == null){
                redirect('auth');
            }
        }

    public function index(){
    	$data['user'] = $this->db->get_where('usr',['email' => 
		$this->session->userdata('email')]) -> row_array();
    	$data['title'] = 'Home';

        // card untuk hitung jumlah gangguan
        $sql="SELECT sum(jml) as jml from perfonmasi_jaringan ";
        $result = $this->db->query($sql);
        $data['jml'] = $result->row()->jml;


        // card untuk hitung lama durasi gangguan
        $sql="SELECT SEC_TO_TIME( SUM( TIME_TO_SEC( `dur` ) ) ) as dur from perfonmasi_jaringan ";
        $result1 = $this->db->query($sql);
        $data['dur'] = $result1->row()->dur;



    	$this->load->view('temp/header',$data);
    	$this->load->view('temp/side',$data);
    	$this->load->view('temp/top',$data);
        $this->load->view('Menu/home',$data, FALSE);
        $this->load->view('temp/footer',$data);
       
    }

    public function getdata(){
        $data = $this->chart_model->getGangguan();
        echo json_encode($data);
        // print($cek);
        // exit();
    }

    public function edit_profile(){
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('usr',['email' => 
        $this->session->userdata('email')]) -> row_array();
        $data['dt'] = $this->db->get('usr')->result_array();
        
        
        if ($this->form_validation->run() ==  false){
            $this->load->view('temp/header',$data);
            $this->load->view('temp/side',$data);
            $this->load->view('temp/top',$data);
            $this->load->view('Menu/edit_profile',$data);
            $this->load->view('temp/footer',$data);
        }else{
                $email      = $this->input->post('email');
                $datas = array(
                    'email' => $email
                );
                $where = array('id' => $id);
                $this->db->where($where);
                $this->db->update('usr',$datas);
                redirect('home');
            }
    }


    public function change_password(){
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('usr',['email' => 
        $this->session->userdata('email')]) -> row_array();
        $this->form_validation->set_rules('password_current','password current','required|trim');
        $this->form_validation->set_rules('password1','password1','required|trim|matches[password2]');
        $this->form_validation->set_rules('password2','password2','required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('temp/header',$data);
            $this->load->view('temp/side',$data);
            $this->load->view('temp/top',$data);
            $this->load->view('Menu/change_password',$data);
            $this->load->view('temp/footer',$data);    
        }else{
            $password_current = $this->input->post('password_current');
            $password1 = $this->input->post('password1');
            if (!password_verify($password_current, $data['user']['password'])) {
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password salah</div>');
                redirect('home/change_password');
            }else {
                if ($password_current ==  $password1) {
                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password tidak boleh sama</div>');
                redirect('home/change_password');
                }else{
                    $password_hash = password_hash($password1, PASSWORD_DEFAULT);

                    $this->db->set('password',$password_hash);
                    $this->db->where('email',$this->session->userdata('email'));
                    $this->db->update('usr');
                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password Berhasil Dirubah</div>');
                    redirect('home/change_password');
                }
            }
        }

    }

}
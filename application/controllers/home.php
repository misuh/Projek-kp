<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index(){
    	$data['user'] = $this->db->get_where('usr',['email' => 
		$this->session->userdata('email')]) -> row_array();
    	$data['title'] = 'Home';
        $sql="SELECT sum(jml) as jml from perfonmasi_jaringan ";
        $result = $this->db->query($sql);
        $data['jml'] = $result->row()->jml;
        $sql="SELECT SEC_TO_TIME( SUM( TIME_TO_SEC( `dur` ) ) ) as dur from perfonmasi_jaringan ";
        $result1 = $this->db->query($sql);
        $data['dur'] = $result1->row()->dur;
    	$this->load->view('temp/header',$data);
    	$this->load->view('temp/side',$data);
    	$this->load->view('temp/top',$data);
        $this->load->view('Menu/home',$data);
        $this->load->view('temp/footer',$data);
       
    }

    // public function sum_(){

    // }
}
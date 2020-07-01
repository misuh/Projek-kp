<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{

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
}
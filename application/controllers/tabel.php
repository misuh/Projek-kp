<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabel extends CI_Controller
{

    public function index()
    {
    	$data['title'] = 'Tabel';
    	$this->load->view('temp/header',$data);
    	$this->load->view('temp/side',$data);
    	$this->load->view('temp/top',$data);
        $this->load->view('tet/test',$data);
        $this->load->view('temp/footer',$data);
    }
}

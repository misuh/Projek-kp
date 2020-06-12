<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabel extends CI_Controller
{

    public function index()
    {
    	$data['isitabel'] = $this->db->get('perfonmasi_jaringan')->result_array();
		$data['title'] = 'Tabel';
    	$this->load->view('temp/header',$data);
    	$this->load->view('temp/side',$data);
    	$this->load->view('temp/top',$data);
        $this->load->view('Menu/tabel',$data);
        $this->load->view('temp/footer',$data);
    }

    public function tambahdata(){

    	$u_pln = $this->input->post('u_pln');
    	$link = $this->input->post('link');
    	$product = $this->input->post('product');
    	$bandwith = $this->input->post('bandwith');
    	$service_id = $this->input->post('service_id');
    	$asman = $this->input->post('asman');
    	$peru = $this->input->post('peru');
    	$jml = $this->input->post('jml');
    	$dur = $this->input->post('dur');
    	$stan = $this->input->post('stan');
    	$rele = $this->input->post('rele');

    	$data = array(
    		'u_pln' => $u_pln,
    		'link' => $link,
    		'product' => $product,
    		'bandwith' => $bandwith,
    		'service_id' => $service_id,
    		'asman' => $asman,
    		'peru' => $peru,
    		'jml' => $jml,
    		'dur' => $dur,
    		'stan' => $stan,
    		'rele' => $rele,
    		'tanggal' => time()
    	);
    	$this->db->set($data);
    	$this->db->insert('perfonmasi_jaringan');
    	redirect('tabel');
    }
}

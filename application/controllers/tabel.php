<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabel extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->db->get_where('usr',['email' => 
        $this->session->userdata('email')]) -> row_array();
        $this->load->library('pagination');
        $config['base_url']         = 'http://localhost/tugas_kp/tabel/index';
        $config['total_rows']       = $this->db->get(['perfonmasi_jaringan'])-> num_rows();
        $config['per_page']         = 10;

        $config['full_tag_open']    = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav>';


        $config['first_link']       = 'First';
        $config['first_tag_open']   = '<li class="page-item">';
        $config['first_tag_close']  = '</li>';

        
        $config['last_link']        = 'Last';
        $config['last_tag_open']    = '<li class="page-item">';
        $config['last_tag_close']   = '</li>';

        $config['next_link']        = '&raquo';
        $config['next_tag_open']    = '<li class="page-item">';
        $config['next_tag_close']   = '</li>';


        $config['prev_link']        = '&laquo';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tag_close']   = '</li>';

        $config['cur_tag_open']    = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close']    = '</a></li>';


        $config['num_tag_open']    = '<li class="page-item">';
        $config['num_tag_close']    = '</li>';

        $config['attributes'] = array('class' => 'page-link');







        $this->pagination->initialize($config); 
        // $data['isitabel'] = $this->db->get('perfonmasi_jaringan')->result_array();

        $data['start'] = $this->uri->segment(3);
        $data['isitabel'] = $this->db->get('perfonmasi_jaringan',$config['per_page'],$data['start'])->result_array();


        // $limit  = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 100;
        // $page   = isset($_GET['page']) ? $_GET['page'] : 1;
        // $start  = ($page - 1) * $limit;
        // $result = 


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
      public function edit($id)
    {
        $where = array('id_data' =>$id);
        $data['data'] = $this->db->get_where('perfonmasi_jaringan',$where)->result();
        $data['title'] = 'Edit Data';
        $data['user'] = $this->db->get_where('usr',['email' => 
        $this->session->userdata('email')]) -> row_array();
        $this->load->view('temp/header',$data);
        $this->load->view('temp/side',$data);
        $this->load->view('temp/top',$data);
        $this->load->view('Menu/editdata',$data);
        $this->load->view('temp/footer',$data);
    }
   
    public function update(){
            $id_data    = $this->input->post('id_data');
            $u_pln      = $this->input->post('u_pln');
            $link       = $this->input->post('link');
            $product    = $this->input->post('product');
            $bandwith   = $this->input->post('bandwith');
            $service_id = $this->input->post('service_id');
            $asman      = $this->input->post('asman');
            $peru       = $this->input->post('peru');
            $jml        = $this->input->post('jml');
            $dur        = $this->input->post('dur');
            $stan       = $this->input->post('stan');
            $rele       = $this->input->post('rele');
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
                'rele' => $rele
            );
            $where = array('id_data' => $id_data);
            $this->db->where($where);
            $this->db->update('perfonmasi_jaringan',$data);
            redirect('tabel');
    }

    public function hapus($id){
        $where = array('id_data' => $id);
        $this->db->where($where);
        $this->db->delete('perfonmasi_jaringan');
        redirect('tabel');
    }
}

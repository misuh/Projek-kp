<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabel extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->db->get_where('usr',['email' => 
        $this->session->userdata('email')]) -> row_array();
        $data['tanggal'] = $this->tanggal_model->tampilalldata();
        // Penamaan Model Tabel model menjadi tm
        $this->load->model('tabel_model','tm');
        $data['keyword'] = null;
        // Pencarian
        if($this->input->post('submit')){
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword',$data['keyword']);
        }else{
            $data['keyword'] = $this->session->userdata('keyword');
        }
        $this->db->like('u_pln',$data['keyword']);
        $this->db->or_like('link',$data['keyword']);
        $this->db->or_like('product',$data['keyword']);
        $this->db->or_like('bandwith',$data['keyword']);
        $this->db->or_like('service_id',$data['keyword']);
        $this->db->or_like('asman',$data['keyword']);
        $this->db->or_like('peru',$data['keyword']);
        $this->db->or_like('jml',$data['keyword']);
        $this->db->or_like('dur',$data['keyword']);
        $this->db->or_like('stan',$data['keyword']);
        $this->db->or_like('rele',$data['keyword']);
        $this->db->from('perfonmasi_jaringan');
        $config['total_rows']       = $this->db->count_all_results();
        $config['per_page']         = 10;
        $data['total_rows']         = $config['total_rows'];


        $data['start'] = $this->uri->segment(3); 
        $data['isitabel'] = $this->tm->gettabel($config['per_page'],$data['start'],$data['keyword']);

        $this->pagination->initialize($config); 

		$data['title'] = 'Tabel';
    	$this->load->view('temp/header',$data);
    	$this->load->view('temp/side',$data);
    	$this->load->view('temp/top',$data);
        $this->load->view('Menu/tabel',$data);
        $this->load->view('temp/footer',$data);
    }

    public function tambahdata(){

   
        $data['tanggal'] = $this->tanggal_model->tampilalldata();
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
        $id_tanggal = $this->input->post('id_tanggal');
     

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
    		'id_tanggal' => $id_tanggal
    	);
    	$this->db->set($data);
    	$this->db->insert('perfonmasi_jaringan');
    	redirect('tabel');
    }
      public function edit($id)
    {
        $where = array('id_data' =>$id);
        $data['data'] = $this->db->get_where('perfonmasi_jaringan',$where)->result();
        $tanggal_query = $this->tanggal_model->tampilalldata();
        $tanggal[null] = '-- Pilih Data --';
        foreach ($tanggal_query as $k) {
            $tanggal[$k->$tanggal_id] = $k->dates;
        }
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
            $id_tanggal = $this->input->post('id_tanggal');

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
                'id_tanggal' => $id_tanggal
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

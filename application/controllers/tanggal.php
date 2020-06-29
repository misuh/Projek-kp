	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Tanggal extends CI_Controller
{
	public function index(){
		$data['user'] = $this->db->get_where('usr',['email' => 
        $this->session->userdata('email')]) -> row_array();
		$data['isitabel'] = $this->tabel_model->getalltabel();
		$this->load->model('tanggal_model','tam');
		$data['tanggal'] = $this->tam->tampilalldata();
		// $data['gg'] = $this->tam->tampilbt();
        $data['title'] = 'Atur Tanggal';
    	$this->load->view('temp/header',$data );
    	$this->load->view('temp/side',$data);
    	$this->load->view('temp/top',$data);
        $this->load->view('Menu/tanggal',$data);
        $this->load->view('temp/footer',$data);
	}

	public function tambahtanggal(){
		$dates = $this->input->post('dates');
		$data = array(
			'dates' => $dates,
		);
        $this->db->set($data);
    	$this->db->insert('tanggal');
        redirect('tanggal');
	}

	public function update_tgl(){
		$id_tanggal    = $this->input->post('id_tanggal');
            $dates      = $this->input->post('dates');
            $data = array(
                'dates' => $dates,
            );
            $where = array('id_tanggal' => $id_tanggal);
            $this->db->where($where);
            $this->db->update('tanggal',$data);
            redirect('tanggal');
	}

	public function edit_tgl($id){
		$where = array('id_tanggal' =>$id);
        $data['data'] = $this->db->get_where('tanggal',$where)->result();
        $data['title'] = 'Edit Data';
        $data['user'] = $this->db->get_where('usr',['email' => 
        $this->session->userdata('email')]) -> row_array();
        $this->load->view('temp/header',$data);
        $this->load->view('temp/side',$data);
        $this->load->view('temp/top',$data);
        $this->load->view('Menu/edittanggal',$data);
        $this->load->view('temp/footer',$data);
	}

	public function hapus_tgl($id){
		$where = array('id_tanggal' => $id);
        $this->db->where($where);
        $this->db->delete('tanggal');
        redirect('tanggal');
	}
}
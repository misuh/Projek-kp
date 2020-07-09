<?php
defined('BASEPATH') or exit('No direct script access allowed');
    require('./application/third_party/phpoffice/vendor/autoload.php');

        use PhpOffice\PhpSpreadsheet\Spreadsheet;
        use PhpOffice\PhpSpreadsheet\Writer\Xls;

class Tabel extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->db->get_where('usr',['email' => 
        $this->session->userdata('email')]) -> row_array();
        $data['tanggal'] = $this->tanggal_model->tampilalldata();
        $data['tanggals'] = $this->db->get('tanggal')->result();
        // Penamaan Model Tabel model menjadi tm
        $this->load->model('tabel_model','tm');
        $data['keyword'] = null;
        $data['filter_tabel'] = null;
        // Pencarian
        if($this->input->post('submit')){
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword',$data['keyword']);
        }else{
            $data['keyword'] = $this->session->userdata('keyword');
        }

        if($this->input->post('filter')){
            $data['filter_tabel'] = $this->input->post('filter_tabel');
            $this->session->set_userdata('filter_tabel',$data['filter_tabel']);
        }else{
            $data['filter_tabel'] = $this->session->userdata('filter_tabel');
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
        $this->db->like('dates',$data['filter_tabel']);
        $this->db->from('perfonmasi_jaringan');
        $this->db->join('tanggal','perfonmasi_jaringan.id_tanggal = tanggal.id_tanggal');

        $config['total_rows']       = $this->db->count_all_results();
        $config['per_page']         = 10;
        $data['total_rows']         = $config['total_rows'];

        $data['start'] = $this->uri->segment(3);
        if ($data['keyword'] == null && $data['filter_tabel'] == null ) {
                $data['isitabel'] = $this->tm->gettabel($config['per_page'],$data['start']);} 
        elseif ($data['keyword'] != null) {
           {    
            $data['isitabel'] = $this->tm->gettabel($config['per_page'],$data['start'],$data['keyword']);}
                if($data['filter_tabel'] != null){
                    $data['isitabel'] = $this->tm->getfilter($config['per_page'],$data['start'],$data['filter_tabel']);
            }
        }else{
            $data['isitabel'] = $this->tm->getfilter($config['per_page'],$data['start'],$data['filter_tabel']);
            if ($data['keyword'] != null){
                $data['isitabel'] = $this->tm->gettabel($config['per_page'],$data['start'],$data['keyword']);}
            }
        

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
        $data['tanggal'] = $this->db->get('tanggal')->result();
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

    public function excel(){

        $this->load->model('tabel_model','tm');
        $data['keyword'] = null;
        $data['filter_tabel'] = null;
        // Pencarian
        if($this->input->post('submit')){
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword',$data['keyword']);
        }else{
            $data['keyword'] = $this->session->userdata('keyword');
        }

        if($this->input->post('filter')){
            $data['filter_tabel'] = $this->input->post('filter_tabel');
            $this->session->set_userdata('filter_tabel',$data['filter_tabel']);
        }else{
            $data['filter_tabel'] = $this->session->userdata('filter_tabel');
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
        $this->db->like('dates',$data['filter_tabel']);
        $this->db->from('perfonmasi_jaringan');
        $this->db->join('tanggal','perfonmasi_jaringan.id_tanggal = tanggal.id_tanggal');

        $config['total_rows']       = $this->db->count_all_results();
       
        $data['total_rows']         = $config['total_rows'];

        $data['start'] = $this->uri->segment(3);
        if ($data['keyword'] == null && $data['filter_tabel'] == null ) {
                $data['isitabel'] = $this->tm->gettabel2($data['start']);} 
        elseif ($data['keyword'] != null) {
           {    
            $data['isitabel'] = $this->tm->gettabel1($data['start'],$data['keyword']);}
                if($data['filter_tabel'] != null){
                    $data['isitabel'] = $this->tm->getfilter1($data['start'],$data['filter_tabel']);
            }
        }else{
            $data['isitabel'] = $this->tm->getfilter1($data['start'],$data['filter_tabel']);
            if ($data['keyword'] != null){
                $data['isitabel'] = $this->tm->gettabel1($data['start'],$data['keyword']);}
            } 


        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'No')
                      ->setCellValue('B1', 'Unit PLN')
                      ->setCellValue('C1', 'Link')
                      ->setCellValue('D1', 'Product')
                      ->setCellValue('E1', 'Bandwith')
                      ->setCellValue('F1', 'Service ID')
                      ->setCellValue('G1', 'ASMAN')
                      ->setCellValue('H1', 'Peruntukan')
                      ->setCellValue('I1', 'Jumlah Gangguan')
                      ->setCellValue('J1', 'Durasi Gangguan')
                      ->setCellValue('K1', 'Standarisasi')
                      ->setCellValue('L1', 'Relevansi');

          $kolom = 2;
          $nomor = 1;
          foreach($data['isitabel'] as $pengguna) {

               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $pengguna['u_pln'])
                           ->setCellValue('C' . $kolom, $pengguna['link'])
                           ->setCellValue('D' . $kolom, $pengguna['product'])
                           ->setCellValue('E' . $kolom, $pengguna['bandwith'])
                           ->setCellValue('F' . $kolom, $pengguna['service_id'])
                           ->setCellValue('G' . $kolom, $pengguna['asman'])
                           ->setCellValue('H' . $kolom, $pengguna['peru'])
                           ->setCellValue('I' . $kolom, $pengguna['jml'])
                           ->setCellValue('J' . $kolom, $pengguna['dur'])
                           ->setCellValue('K' . $kolom, $pengguna['stan'])
                           ->setCellValue('L' . $kolom, $pengguna['rele']);

               $kolom++;
               $nomor++;

          }


    
        $filename = $data['filter_tabel'];
        $writer = new Xls($spreadsheet);

      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="ss.xls"');
      header('Cache-Control: max-age=0');

      $writer->save('php://output');
    }   

    public function pdf(){

    }
}

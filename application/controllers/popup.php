<?php

class Popup extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
		$this->load->model('M_peserta','',TRUE);
	}

	public function peserta() {
        $config['base_url'] = base_url() . 'popup/peserta/';
        $config['total_rows'] = $this->M_peserta->TotalPeserta();
        $config['per_page'] = 2;
        $config['uri_segment'] = 3;
        $config['num_links'] = 4;

	$config['full_tag_open'] = '<ul class="pagination">';
	$config['full_tag_close'] = '</ul>';
	$config['first_tag_open'] = '<li>';
	$config['first_tag_close'] = '</li>';
	$config['prev_tag_open'] = '<li>';
	$config['prev_tag_close'] = '</li>';
	$config['next_tag_open'] = '<li>';
	$config['next_tag_close'] = '</li>';
	$config['last_tag_open'] = '<li>';
	$config['cur_tag_open'] = '<li><a href="#"><span class="sr-only"><b>(current)</b></span>';
	$config['cur_tag_close'] = '</a></li>';
	$config['num_tag_open'] = '<li>';
	$config['num_tag_close'] = '</li>';
	$config['first_link']='<span class="glyphicon glyphicon-fast-backward"></span>';
	$config['last_link']='<span class="glyphicon glyphicon-fast-forward"></span>';
	$config['next_link']='<span class="glyphicon glyphicon-step-forward"></span>';
	$config['prev_link']='<span class="glyphicon glyphicon-step-backward"></span>';

        $this->pagination->initialize($config);
		$data['halaman']=$this->pagination->create_links();
        $data['peserta'] = $this->M_peserta->TampilPesertaUntukPopUp($config['per_page'], $this->uri->segment(3));
        //me-load file v_popup_pengarang dari folder application/view/popup
        $this->load->view('popup/v_popup_peserta',$data);
    }

	
}

?>
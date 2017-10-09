<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class M_peserta Extends CI_Model {

//======================================//
// Model 		: M_pengarang			//
// Nama File	: M_pengarang.php		//
// Lokasi		: appilaction/models 	//	
// Author		: OyaSuryana			//
// Rev			: Sep, 05 2014	 		//
//======================================// 


var $peserta='peserta';
var $diklat='diklat';

	public function __construct(){
	parent::__construct();
	}


	public function TotalPeserta(){
	$sql_peserta=$this->db->get($this->peserta);
	
		if($sql_peserta->num_rows()>0){
			return $sql_peserta->num_rows();
		}
	}


	
	function TampilPesertaUntukPopUp($perPage, $uri) {
	$sql_peserta=$this->db->get($this->peserta, $perPage, $uri);
        if ($sql_peserta->num_rows() > 0) {
            return $sql_peserta->result_array();
        }
    }


    function dd_instansi()
    {
       
        $this->db->order_by('kode_instansi', 'asc');
        $result = $this->db->get('instansi');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dd[''] = 'Please Select';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->kode_instansi] = $row->nama_instansi;
            }
        }
        return $dd;
    }
	
	function dd_edit_instansi($kode)
    {
       
        $this->db->order_by('kode_instansi', 'asc');
        $result = $this->db->get('instansi');
		
		$this->db->where('kode_instansi',$kode);
        $result1 = $this->db->get('instansi');
		$nama="";
		$nama="";
		foreach($result1->result() as $dt1){
			$kode=$dt1->kode_instansi;
			$nama	=$dt1->nama_instansi;
		}
		
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dd[$kode] = $nama;
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->kode_instansi] = $row->nama_instansi;
            }
        }
        return $dd;
    }

 function dd_jenis_diklat()
    {
       
        $this->db->order_by('kode_diklat', 'asc');
        $result = $this->db->get('jenisdiklat');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dd[''] = 'Please Select';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->kode_diklat] = $row->nama_diklat;
            }
        }
        return $dd;
    }
	

	
}

?>
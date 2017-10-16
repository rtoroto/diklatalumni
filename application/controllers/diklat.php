<?php
class diklat extends CI_Controller{
    
    var $folder =   "diklat";
    var $tables =   "diklat";
    var $pk     =   "nosttp";
    var $title  =   "Daftar Diklat";
    
    function __construct() {
        parent::__construct();
		  $this->load->helper(array('form', 'url'));
		$this->load->model('m_peserta');
    }
    
    function index()
    {
		$level	= $this->session->userdata('level');
		
		if($level=="1"){
			$this->dashboard_admin();

						
		}else{
			$this->dashboard_operator();
		}
//        $query2="SELECT diklat.nosttp,diklat.nip,diklat.tgl_sttp,diklat.tglmulai,diklat.tglselesai,diklat.namadiklat,diklat.tempatdiklat,diklat.penyelenggara,diklat.angkatan,diklat.jml_jam,diklat.judullapproper,diklat.full_path,peserta.nama FROM diklat,peserta where diklat.nip=peserta.nip";
		
    }
    
function view_front(){
$this->load->view('diklat/view_front');	
}

function view_proper_publik(){
	
	 $table = 'diklat';
	 $column_order = array('diklat.judullapproper','peserta.nama',null); //set column field database for datatable orderable
	 $column_search = array('diklat.judullapproper','peserta.nama'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	$order = array('id' => 'ASC'); // default order 
	
	  $i = 0;
	$this->db->from($table);
$this->db->join('peserta','diklat.nip=peserta.nip');	


		foreach ($column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($order))
		{
			$order = $order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	

	 
	 if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
      //  $query = $this->db->get();	
	//	$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		$list = $query->result();
	  
		$data = array();
		$no = $_POST['start'];
		
		
			
		
		foreach ($list as $person) {
			$no=$no*1;
			$no++;
			$row = array();
			$row[] = $no;
			//$row[] = $person->kelompok;
			
			$row[] = $person->nama;
			
		
			$row[] = $person->judullapproper;
			$row[] = "<button type=\"button\" class=\"btn btn-warning btn-xs\"><span class=\"glyphicon glyphicon-download\"></span></button>";
			
			//add html for action
			
		
			$data[] = $row;
		}

$jml=$query->num_rows();
$q_all=$this->db->query("SELECT * fROM $table ");
$tot_jml=$q_all->num_rows();
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" =>$tot_jml*1,
						"recordsFiltered" => $jml*1,
						"data" => $data,
				);
		//output to json format
		echo json_encode($output); 
}

	function dashboard_admin(){
	        $query="select diklat.*,peserta.*,instansi.nama_instansi from diklat,peserta,instansi WHERE peserta.nip=diklat.nip AND instansi.kode_instansi=peserta.instansi";		
			  $data['record']=  $this->db->query($query)->result();
//		$data['profile']=  $this->db->query($query2)->result();
      
        $data['desc']="";
		$data['instansi']=$this->get_instansi($this->session->userdata('sesi_instansi'));
		  $data['title']=  strtoupper($this->title." ".$data['instansi']);
	$this->template->load('template', $this->folder.'/view',$data);
	}
	
	function dashboard_operator(){
		
			$instansi= $this->session->userdata('sesi_instansi');
		        $query="select peserta.nama,peserta.instansi,diklat.* from peserta,diklat WHERE peserta.instansi='".$instansi."' AND diklat.nip=peserta.nip";
				
        $data['record']=  $this->db->query($query)->result();
		//$data['profile']=  $this->db->query($query2)->result();
      
        $data['desc']="";
		$data['instansi']=$this->get_instansi($this->session->userdata('sesi_instansi'));
		  $data['title']=  strtoupper($this->title." ".$data['instansi']);
	$this->template->load('template', $this->folder.'/view_operator',$data);
	}
    
    function post()
    {
        if(isset($_POST['submit']))
        {		
		   $config = array(
		     'upload_path' => 'upload/',
		     'allowed_types' => 'pdf|gif|jpg|png|', // |extensi lainnya
		     'max_size' => '0',
		     //'encrypt_name' => true // meng-enkripsi nama file
	       );
	   $this->load->library('upload', $config);
	   $this->upload->do_upload('file_name1');
	   $result1 = $this->upload->data();
	   $this->upload->do_upload('file_name2');
		$result2 = $this->upload->data();
	 //  $this->upload->do_upload('filesttp_name');
	   
	   $result = array('file_sttp'=>$result1,'file_proper'=>$result2);
       $nm_file_sttp= $result['file_sttp']['file_name'];
	   $nm_file_proper= $result['file_proper']['file_name'];
 
//	   if (!empty($_FILES['file_name'])) {
	    // $data = $this->upload->data();
	 
         $nip	              =   $this->input->post('nip');
         $namadiklat          =   $this->input->post('namadiklat');
         $tglmulai            =   $this->input->post('tglmulai');
         $tglselesai          =   $this->input->post('tglselesai');
         $tempatdiklat        =   $this->input->post('tempatdiklat');
         $penyelenggara       =   $this->input->post('penyelenggara');
         $angkatan            =   $this->input->post('angkatan');
         $jml_jam             =   $this->input->post('jml_jam');
         $nosttp              =   $this->input->post('nosttp');
		 $tgl_sttp            =   $this->input->post('tgl_sttp');
         $judullapproper      =   $this->input->post('judullapproper');
 
	     $query = array(
	       'nip' 			=> $nip,
	       'namadiklat' 	=> $namadiklat,
    	   'tglmulai' 		=> $tglmulai,
       	   'tglselesai' 	=> $tglselesai,
           'tempatdiklat' 	=> $tempatdiklat,
           'penyelenggara' 	=> $penyelenggara,
           'angkatan' 		=> $angkatan,
           'jml_jam' 		=> $jml_jam,
	       'nosttp' 		=> $nosttp,
           'tgl_sttp' 		=> $tgl_sttp,
		   'filesttp' 		=> $nm_file_sttp,
           'judullapproper' => $judullapproper,
    	   'full_path' 		=> $nm_file_proper
    	   );
     	$this->db->insert('diklat', $query);
     	$this->session->set_flashdata('msg', 'File berhasil di input!');
  // 		}

   		
        redirect($this->uri->segment(1));			
     	$data['result'] = $this->db->get('diklat')->result();

        }
        else
        {
			$data['nip']=$this->uri->segment(3);
			$data['jenis_diklat']=$this->uri->segment(4);
			
			$q=$this->db->query("SELECT * FROM peserta WHERE nip='".$data['nip']."'");
			if($q->num_rows() >0){
			foreach($q->result() as $dt){
				$data['nip']		=$dt->nip;
				$data['nama']		=$dt->nama;
				$data['gol']		=$dt->gol;
				$data['instansi']	=$dt->instansi;
				
			}
			}else{
				$data['nip']	="Klik Cari untuk pilih data peserta";
				$data['nama']	="";
				$data['gol']	="";
				$data['instansi']="";
			}
            $data['title']=  $this->title;
            $data['desc']="";
			// $dd[$row->kode_instansi] = $row->nama_instansi;

			$data['dd_jenis']=$this->m_peserta->dd_jenis_diklat1($data['jenis_diklat']);
			
            $this->template->load('template', $this->folder.'/post',$data);
        }
    }
	
	
	function simpan_post()
    {

        if($this->input->post('submit')=="simpan")
        {		
		//		$this->input->post('submit')."cek";
		   $config = array(
		     'upload_path' => 'upload/',
		     'allowed_types' => 'pdf|gif|jpg|png|', // |extensi lainnya
		     'max_size' => '0',
		     //'encrypt_name' => true // meng-enkripsi nama file
	       );
	   $this->load->library('upload', $config);
	   $this->upload->do_upload('file_name1');
	   $result1 = $this->upload->data();
	   $this->upload->do_upload('file_name2');
		$result2 = $this->upload->data();
	 //  $this->upload->do_upload('filesttp_name');
	   
 	$result = array('file_sttp'=>$result1,'file_proper'=>$result2);
 	$nm_file_sttp= $result['file_sttp']['file_name'];
   	$nm_file_proper= $result['file_proper']['file_name'];

	   if ($this->input->post('nip') !="") {
		    echo  $this->input->post('nip');
	    // $data = $this->upload->data(); 
         $nip	              =   $this->input->post('nip');
		 $jenis_diklat		  =		$this->input->post('jenis_diklat');
         $namadiklat          =   $this->input->post('namadiklat');
         $tglmulai            =   $this->input->post('tglmulai');
         $tglselesai          =   $this->input->post('tglselesai');
         $tempatdiklat        =   $this->input->post('tempatdiklat');
         $penyelenggara       =   $this->input->post('penyelenggara');
         $angkatan            =   $this->input->post('angkatan');
         $jml_jam             =   $this->input->post('jml_jam');
         $nosttp              =   $this->input->post('nosttp');
		 $tgl_sttp            =   $this->input->post('tgl_sttp');
         $judullapproper      =   $this->input->post('judullapproper');
 
	     $query = array(
	       'nip' => $nip,
		   'jenisdiklat'=>$jenis_diklat,
	       'namadiklat' => $namadiklat,
    	   'tglmulai' => $tglmulai,
       	   'tglselesai' => $tglselesai,
           'tempatdiklat' => $tempatdiklat,
           'penyelenggara' => $penyelenggara,
           'angkatan' => $angkatan,
           'jml_jam' => $jml_jam,
	       'nosttp' => $nosttp,
           'tgl_sttp' => $tgl_sttp,
		   'filesttp' => $nm_file_sttp,
           'judullapproper' => $judullapproper,
    	   'full_path' => $nm_file_proper
    	   );
		   
     	$this->db->insert('diklat', $query);
     	$this->session->set_flashdata('msg', 'File berhasil di input!');
   		}else{
		echo "tidak terdeteksi nipnya";	
		}

   		
    redirect($this->uri->segment(1));			
     //	$data['result'] = $this->db->get('diklat')->result();
//redirect('diklat');			
        }
        else
        {
			
			echo "gagal submit";
            $data['title']=  $this->title;
            $data['desc']="";
 //           $this->template->load('template', $this->folder.'/post',$data);
        }
    }
    
    function edit()
    {
        if($this->input->post('submit')=="simpan")
        {
            $id     = $this->input->post('id');
            $nip	             =   $this->input->post('nip');
            $tgl_sttp            =   $this->input->post('tgl_sttp');
            $tglmulai            =   $this->input->post('tglmulai');
            $tglselesai          =   $this->input->post('tglselesai');
            $namadiklat          =   $this->input->post('namadiklat');
            $tempatdiklat        =   $this->input->post('tempatdiklat');
            $penyelenggara       =   $this->input->post('penyelenggara');
            $angkatan            =   $this->input->post('angkatan');
            $jml_jam             =   $this->input->post('jml_jam');
            $judullapproper      =   $this->input->post('judullapproper');
            
            $data            =   array(  'nip'=>$nip,
											'tgl_sttp'=>$tgl_sttp,
                                            'tglmulai'=>$tglmulai,
                                            'tglselesai'=>$tglselesai,
                                            'namadiklat'=>$namadiklat,
                                            'tempatdiklat'=>$tempatdiklat,
                                            'penyelenggara'=>$penyelenggara,
											'angkatan'=>$angkatan,
                                            'jml_jam'=>$jml_jam,
                                            'judullapproper'=>$judullapproper);

            $this->mcrud->update($this->tables,$data,'id_diklat',$id);
				   $config = array(
		     'upload_path' => 'upload/',
		     'allowed_types' => 'pdf|gif|jpg|png|', // |extensi lainnya
		     'max_size' => '0',
		     //'encrypt_name' => true // meng-enkripsi nama file
	       );
	   $this->load->library('upload', $config);
	   if($this->upload->do_upload('file_name1')){
	   $result1 = $this->upload->data();
	   $result = array('file_sttp'=>$result1);   
	    $nm_file_sttp= $result['file_sttp']['file_name'];


		   $this->db->where('id_diklat',$id);
		$this->db->update('diklat',array('filesttp'=>$nm_file_sttp));
	   }
	   if($this->upload->do_upload('file_name2')){
	 	$result2 = $this->upload->data();
	   $result = array('file_proper'=>$result2);
	   $nm_file_proper= $result['file_proper']['file_name'];
	       	   
 		$this->db->where('id_diklat',$id);
		$this->db->update('diklat',array('full_path'=>$nm_file_proper));


	   }
	 //  $this->upload->do_upload('filesttp_name');
	   
 
            redirect($this->uri->segment(1));
        }
        else
        {
            $data['title']=  $this->title;
            $data['desc']="";
            $id          =  $this->uri->segment(3);
			$q=$this->db->query("SELECT peserta.*,diklat.*,instansi.nama_instansi FROM peserta,diklat,instansi WHERE peserta.nip=diklat.nip AND diklat.nosttp='".$id."'");
            $data['r']   =  $q->row_array();
			//$this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
            $this->template->load('template', $this->folder.'/edit',$data);
        }
    }
    function delete()
    {
        $id     =  $this->uri->segment(3);
        $chekid = $this->db->get_where($this->tables,array($this->pk=>$nis));
        if($chekid>0)
        {
            $this->mcrud->delete($this->tables,  $this->pk,  $this->uri->segment(3));
        }
        redirect($this->uri->segment(1));
 
    }       
 	public function download() {
		$this->load->helper('download');
		$this->load->helper('url');
		$this->load->helper('encrypt');
		$data = file_get_contents('./upload/'.$str);
		$name = ($this->uri->segment(1));
   		force_download($name, $data);
 	}


public function get_peserta() {    
        $keyword = $this->uri->segment(3);
        $data1 = $this->db->from('peserta')->like('nip',$keyword)->get();            

        foreach($data1->result_array() as $row)
        {
             $data[] = array('nip'=>$row['nip'],'label'=>$row['nama'],'value'=>$row['nip']);
        }
        echo json_encode($data);
    }
	
	function tampil_peserta1(){
	
	$level	= $this->session->userdata('level');
		
		if($level=="1"){
$query="SELECT * FROM peserta";			
		}else{
			$instansi= $this->session->userdata('sesi_instansi');
		        $query="SELECT * FROM peserta WHERE instansi='".$instansi."'";
		}
	
	 
        $data['record']=  $this->db->query($query)->result();
		
			$data['instansi']=$this->get_instansi($this->session->userdata('sesi_instansi'));
		  $data['title']=  strtoupper($this->title." ".$data['instansi']);
    
        $data['desc']="";
	$this->template->load('template', 'peserta/tampil_peserta',$data);
	
	//	$this->load->view('peserta/tampil_peserta',$data);
	}
	function tampil_peserta(){
	
	$data['level']	= $this->session->userdata('level');
	$data['instansi']= $this->session->userdata('sesi_instansi');
		
		
	
		$this->load->view('peserta/tampil_peserta1',$data);
	}

function laporan(){
	$data=array();
	
	if($this->session->userdata('level')==1){
	if ($this->input->post('instansi')){
	$data['instansi']=$this->input->post('instansi');
	}else{

	$data['instansi']="all";
		
	}
	if($this->input->post('instansi')=="all"){
	$data['nama_instansi']="";	
	}else{
	$data['nama_instansi']="INSTANSI : ".$this->get_instansi($data['instansi']);
	}
	
	$data['dd_instansi'] = $this->m_peserta->dd_instansi();
	$data['dd_jenis_diklat'] = $this->m_peserta->dd_jenis_diklat();
//	 $this->template->load('template', 'diklat/laporan',$data);
	$this->load->view('diklat/laporan',$data);
	}else{
		$data['instansi']=$this->session->userdata('sesi_instansi');
		$data['nama_instansi']="INSTANSI : ".$this->get_instansi($data['instansi']);
		$this->load->view('diklat/laporan',$data);
	}
}

	  function laporan_json(){
//	$q=$this->db->query("SELECT * FROM  WHERE kelompok='5' order by kode,id");
		$kode_instansi=$this->uri->segment(3);
	 $table = 'diklat';
	 $column_order = array('id_diklat','diklat.nip',null); //set column field database for datatable orderable
	 $column_search = array('diklat.nip','nama','pangkat','jenis_diklat','instansi','namadiklat'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	$order = array('id_diklat' => 'ASC'); // default order 
	
	  $i = 0;
	$this->db->from($table);
	if( $kode_instansi ==""){
	$where="";			

	}else if ($kode_instansi =="all"){
			$where="";
	}else{
				$where="AND peserta.instansi='".$kode_instansi."'";	
	}
	$this->db->join('peserta', 'peserta.nip = diklat.nip '.$where);

		foreach ($column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($order))
		{
			$order = $order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	

	 
	 if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
      //  $query = $this->db->get();	
	//	$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		$list = $query->result();
	  
		$data = array();
		$no = $_POST['start'];
		
		
			
		
		foreach ($list as $person) {
			$no=$no*1;
			$no++;
			$row = array();
			$row[] = $no;
			//$row[] = $person->kelompok;
			$row[] = $person->nip;
			$row[] = $person->nama;
			
			$nama_instansi =$this->get_instansi($person->instansi);
			$row[] = $person->pangkat."/".$person->gol;
			$row[] = $nama_instansi;
			$row[] = $person->namadiklat;
			$row[] = $person->penyelenggara;
			$row[] = $person->nosttp;
			$row[] = $person->tgl_sttp;
			//add html for action
			
		
			$data[] = $row;
		}

$jml=$query->num_rows();
$q_all=$this->db->query("SELECT * fROM $table ");
$tot_jml=$q_all->num_rows();
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" =>$tot_jml*1,
						"recordsFiltered" => $jml*1,
						"data" => $data,
				);
		//output to json format
		echo json_encode($output); 
   }
   
   function get_instansi($kd_instansi){
	   $nama="";
	$q=$this->db->query("SELECT nama_instansi FROM instansi WHERE kode_instansi='".$kd_instansi."'");   
	foreach($q->result() as $dt){
	$nama=$dt->nama_instansi;	
	}
	
	return $nama;
   }
}
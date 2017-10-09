<?php
class sttp extends CI_Controller{
    
    var $folder =   "sttp";
    var $tables =   "filesttp";
    var $pk     =   "nosttp";
    var $title  =   "Daftar File STTP";
    
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        $query="SELECT * FROM filesttp";
        $query2="SELECT diklat.nosttp,diklat.nip,diklat.tgl_sttp,diklat.tglmulai,diklat.tglselesai,diklat.namadiklat,diklat.tempatdiklat,diklat.penyelenggara,diklat.angkatan,diklat.jml_jam,diklat.judullapproper,diklat.full_path,peserta.nama FROM diklat,peserta where diklat.nip=peserta.nip";
		
        $data['record']=  $this->db->query($query)->result();
		$data['profile']=  $this->db->query($query2)->result();
        $data['title']=  $this->title;
        $data['desc']="";
	$this->template->load('template', $this->folder.'/view',$data);
    }
    
    
    function post()
    {
        if(isset($_POST['submit']))
        {		
		   $config = array(
		     'upload_path' => 'uploadsttp/',
		     'allowed_types' => 'pdf|gif|jpg|png|', // |extensi lainnya
		     'max_size' => '0',
		     //'encrypt_name' => true // meng-enkripsi nama file
	       );
	   $this->load->library('upload', $config);
	   $this->upload->do_upload('file_name');
	   
 
	   if  (!empty($_FILES['file_name'])) {
	     $data = $this->upload->data();
	 
         $nosttp              =   $this->input->post('nosttp');
 
	     $query = array(
	       'nosttp' => $nosttp,
		   'filesttp' => $data['file_name']
    	   );
     	$this->db->insert('filesttp', $query);
     	$this->session->set_flashdata('msg', 'File berhasil di input!');
   		}

   		
        redirect($this->uri->segment(1));			
     	$data['result'] = $this->db->get('filesttp')->result();

        }
        else
        {
            $data['title']=  $this->title;
            $data['desc']="";
            $this->template->load('template', $this->folder.'/post',$data);
        }
		
    }
    
    function edit()
    {
        if(isset($_POST['submit']))
        {
            $id     = $this->input->post('id');
            
            $data            =   array('filesttp' => $data['file_name']);

            $this->mcrud->update($this->tables,$data, $this->pk,$id);
            redirect($this->uri->segment(1));
        }
        else
        {
            $data['title']=  $this->title;
            $data['desc']="";
            $id          =  $this->uri->segment(3);
            $data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
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
		$data = file_get_contents('./uploadsttp/'.$str);
		$name = ($this->uri->segment(1));
   		force_download($name, $data);
 	}


}
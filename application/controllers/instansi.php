<?php
class instansi extends CI_Controller{
    
    var $folder =   "instansi";
    var $tables =   "instansi";
    var $pk     =   "kode_instansi";
    var $title  =   "Daftar Instansi";
    
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        $query="SELECT * FROM instansi";
        $data['record']=  $this->db->query($query)->result();
        $data['title']=  $this->title;
        $data['desc']="";
	$this->template->load('template', $this->folder.'/view',$data);
    }
    
    
    function post()
    {
        if(isset($_POST['submit']))
        {
            $kode_instansi               =   $this->input->post('kode_instansi');
            $nama_instansi               =   $this->input->post('nama_instansi');

            $data            =   array('kode_instansi'=>$kode_instansi,  
											'nama_instansi'=>$nama_instansi);

            $this->db->insert($this->tables,$data);
            redirect($this->uri->segment(1));			
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
            $kode_instansi               =   $this->input->post('kode_instansi');
            $nama_instansi               =   $this->input->post('nama_instansi');
            
            $data            =   array(  'nama_instansi'=>$nama_instansi);
            $this->mcrud->update($this->tables,$data, $this->pk,$kode_instansi);
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
        $chekid = $this->db->get_where($this->tables,array($this->pk=>$kode_instansi));
        if($chekid>0)
        {
            $this->mcrud->delete($this->tables,  $this->pk,  $this->uri->segment(3));
        }
        redirect($this->uri->segment(1));
 
    }       
}
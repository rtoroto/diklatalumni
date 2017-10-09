<?php
class jenisdiklat extends CI_Controller{
    
    var $folder =   "jenisdiklat";
    var $tables =   "jenisdiklat";
    var $pk     =   "kode_diklat";
    var $title  =   "Daftar Jenis Diklat";
    
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        $query="SELECT * FROM jenisdiklat";
        $data['record']=  $this->db->query($query)->result();
        $data['title']=  $this->title;
        $data['desc']="";
	$this->template->load('template', $this->folder.'/view',$data);
    }
    
    
    function post()
    {
        if(isset($_POST['submit']))
        {
            $kode_diklat               =   $this->input->post('kode_diklat');
            $nama_diklat               =   $this->input->post('nama_diklat');
            $keterangan             =   $this->input->post('keterangan');

            $data            =   array('kode_diklat'=>$kode_diklat,  
											'nama_diklat'=>$nama_diklat,
                                            'keterangan'=>$keterangan);

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
            $kode_diklat               =   $this->input->post('kode_diklat');
            $nama_diklat               =   $this->input->post('nama_diklat');
            $keterangan             =   $this->input->post('keterangan');
            
            $data            =   array(  'nama_diklat'=>$nama_diklat,
                                            'keterangan'=>$keterangan);
            $this->mcrud->update($this->tables,$data, $this->pk,$kode_diklat);
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
        $chekid = $this->db->get_where($this->tables,array($this->pk=>$kode_diklat));
        if($chekid>0)
        {
            $this->mcrud->delete($this->tables,  $this->pk,  $this->uri->segment(3));
        }
        redirect($this->uri->segment(1));
 
    }       
}
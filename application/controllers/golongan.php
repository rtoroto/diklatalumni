<?php
class golongan extends CI_Controller{
    
    var $folder =   "golongan";
    var $tables =   "golongan";
    var $pk     =   "kode_gol";
    var $title  =   "Daftar Golongan";
    
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        $query="SELECT * FROM golongan";
        $data['record']=  $this->db->query($query)->result();
        $data['title']=  $this->title;
        $data['desc']="";
	$this->template->load('template', $this->folder.'/view',$data);
    }
    
    
    function post()
    {
        if(isset($_POST['submit']))
        {
            $kode_gol               =   $this->input->post('kode_gol');
            $gol               =   $this->input->post('gol');
            $keterangan             =   $this->input->post('keterangan');

            $data            =   array('kode_gol'=>$kode_gol,  
											'gol'=>$gol,
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
            $kode_gol               =   $this->input->post('kode_gol');
            $gol               =   $this->input->post('gol');
            $keterangan             =   $this->input->post('keterangan');
            
            $data            =   array(  'gol'=>$gol,
                                            'keterangan'=>$keterangan);
            $this->mcrud->update($this->tables,$data, $this->pk,$kode_gol);
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
        $chekid = $this->db->get_where($this->tables,array($this->pk=>$kode_gol));
        if($chekid>0)
        {
            $this->mcrud->delete($this->tables,  $this->pk,  $this->uri->segment(3));
        }
        redirect($this->uri->segment(1));
 
    }       
}
<?php
class peserta extends CI_Controller{
    
    var $folder =   "peserta";
    var $tables =   "peserta";
    var $pk     =   "nip";
    var $title  =   "Daftar Peserta";
    
    function __construct() {
        parent::__construct();
		$this->load->model('m_peserta');
    }
    
    function index()
    {
        $query="SELECT * FROM peserta";
        $data['record']=  $this->db->query($query)->result();
        $data['title']=  $this->title;
        $data['desc']="";
	$this->template->load('template', $this->folder.'/view',$data);
    }
    
    
    function post()
    {
        if(isset($_POST['submit']))
        {
            $nip               =   $this->input->post('nip');
            $nama               =   $this->input->post('nama');
            $gol             =   $this->input->post('gol');
            $pangkat                 =   $this->input->post('pangkat');
            $instansi                =   $this->input->post('instansi');

            $data            =   array('nip'=>$nip,  
											'nama'=>$nama,
                                            'gol'=>$gol,
                                            'pangkat'=>$pangkat,
                                            'instansi'=>$instansi);

            $this->db->insert($this->tables,$data);
            redirect($this->uri->segment(1));			
        }
        else
        {
            $data['title']=  $this->title;
            $data['desc']="";
			$data['dd_instansi']=$this->m_peserta->dd_instansi();
            $this->template->load('template', $this->folder.'/post',$data);
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit']))
        {
            $nip     = $this->input->post('nip');
            $nama               =   $this->input->post('nama');
            $gol             =   $this->input->post('gol');
            $pangkat                 =   $this->input->post('pangkat');
            $instansi                =   $this->input->post('instansi');
            
            $data            =   array(  'nama'=>$nama,
                                            'gol'=>$gol,
                                            'pangkat'=>$pangkat,
                                            'instansi'=>$instansi);
            $this->mcrud->update($this->tables,$data, $this->pk,$nip);
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
}
<?php
class users extends CI_Controller{
    
    var $folder =   "users";
    var $tables =   "app_users";
    var $pk     =   "id_users";
    var $title  =   "Users";

	
    function __construct() {
        parent::__construct();
		$this->load->model('m_peserta');
    }
    
    function index()
    {
        $data['title']=  $this->title;
        $data['record']=  $this->db->get($this->tables)->result();
	//$this->template->load('template', $this->folder.'/view',$data);
	$this->tampil_user();
    }
    
    function keterangan($id)
    {
        if($id=='')
        {
            return '';
        }
        else
        {
            return getField('akademik_prodi', 'nama_prodi', 'prodi_id', $id);
        }
    }
    
    function level($level)
    {
        if($level==1)
        {
            return 'admin';
        }
        elseif($level==2)
        {
            return 'pihak jurusan';
        }
        elseif($level==3)
        {
            return 'pegawai';
        }
        else
        {
            return 'mahasiswa';
        }
    }
    
    function post()
    {
        if(isset($_POST['submit']))
        {
            $username  =   $this->input->post('username');
            $password  =   $this->input->post('password');
            $level     =   $this->input->post('level');
            $real_name    =   $this->input->post('real_name');
			$instansi	=$this->input->post('instansi');
            if($level==2)
            {
                 $data   =   array('username'=>$username,'password'=>md5($password),'nama'=>$real_name,'level'=>$level,'instansi'=>$instansi);
            }
            else
            {
                 $data   =   array('username'=>$username,'password'=>md5($password),'nama'=>$real_name,'level'=>$level);
            }
            $this->db->insert($this->tables,$data);
            redirect($this->uri->segment(1).'/tampil_user');
        }
        else
        {
            $data['title']=  $this->title;
			$data['dd_instansi']=$this->m_peserta->dd_instansi();
            $this->template->load('template', $this->folder.'/post',$data);
//$this->tampil_user();
        }
    }
	
    function edit()
    {
        if(isset($_POST['submit']))
        {
            $username  	 =   $this->input->post('username');
            $password  	 =   $this->input->post('password');
			$nama		 =   $this->input->post('real_name');
			$level		=$this->input->post('level');
			$instansi	=$this->inpt->post('instansi');
            $id    		 = $this->input->post('id');
            $data  		 =   array('username'=>$username,'password'=>md5($password),'nama'=>$nama,'level'=>$level,'instansi'=>$instansi);
            $this->mcrud->update($this->tables,$data, $this->pk,$id);
            redirect($this->uri->segment(1));
        }
        else
        {
            $data['title']=  $this->title;
            $id          =  $this->uri->segment(3);
			
            $data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
			//$data['dd_instansi'] = $data['r']['instansi'];
			$data['dd_instansi'] =$this->m_peserta->dd_edit_instansi($data['r']['instansi']);
            $this->template->load('template', $this->folder.'/edit',$data);
        }
    }
    function delete()
    {
        $id     =  $this->uri->segment(3);
        $chekid = $this->db->get_where($this->tables,array($this->pk=>$id));
        if($chekid->num_rows()>0)
        {
            $this->mcrud->delete($this->tables,  $this->pk,  $this->uri->segment(3));
        }
        redirect($this->uri->segment(1));
    }
    
    function profile()
    {
        $id=  $this->session->userdata('id_users');
        if(isset($_POST['submit']))
        {
            $username=  $this->input->post('username');
            $password=  $this->input->post('password');
            $data    =  array('username'=>$username,'password'=>  md5($password));
            $this->mcrud->update($this->tables,$data, $this->pk,$id);
            redirect('users/profile');
        }
        else
        {
            $data['title']=  $this->title;
            $data['r']   =  $this->mcrud->getByID($this->tables,  $this->pk,$id)->row_array();
            $this->template->load('template', $this->folder.'/profile',$data);
        }
    }
    
    function account()
    {
        $id=  $this->session->userdata('keterangan');
        if(isset($_POST['submit']))
        {
            $nama           =   $this->input->post('nama');
            $nidn           =   $this->input->post('nidn');
            $nip            =   $this->input->post('nip');
            $tempat_lahir   =   $this->input->post('tempat_lahir');
            $tanggal_lahir  =   $this->input->post('tanggal_lahir');
            $gender         =   $this->input->post('gender');
            $agama          =   $this->input->post('agama');
            $kawin          =   $this->input->post('kawin');
            $alamat         =   $this->input->post('alamat');
            $hp             =   $this->input->post('hp');
            $email          =   $this->input->post('email');
            $data           =   array(  'nama_lengkap'=>$nama,
                                        'nidn'=>$nidn,
                                        'nip'=>$nip,
                                        'tempat_lahir'=>$tempat_lahir,
                                        'tanggal_lahir'=>$tanggal_lahir,
                                        'gender'=>$gender,
                                        'agama_id'=>$agama,
                                        'status_kawin'=>$kawin,
                                        'alamat'=>$alamat,'hp'=>$hp,
                                        'email'=>$email);
            $this->mcrud->update('app_dosen',$data, 'dosen_id',$id);
            redirect('users/account');
        }
        else
        {
            $data['title']=  $this->title;
            $data['r']   =  $this->mcrud->getByID('app_dosen',  'dosen_id',  $id)->row_array();
            $this->template->load('template', $this->folder.'/account',$data);
        }
    }
	
	
	function tampil_user(){
		$data=array();
		$q=$this->db->query("SELECT * FROM app_users");
		$data['record']=$q->result();
		$data['title']="MANAJEMEN DATA USER";
		$data['dd_instansi']=$this->m_peserta->dd_instansi();
		 $this->template->load('template', 'users/tampil_user',$data);
	}
	
}
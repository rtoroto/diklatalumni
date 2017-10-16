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
	
	function tampil_peserta_json(){
		
		$kode_instansi=$this->uri->segment(3);
	 $table = 'peserta';
	 $column_order = array('nip','nama',null); //set column field database for datatable orderable
	 $column_search = array('nip','nama'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	$order = array('id' => 'ASC'); // default order 
	
	  $i = 0;
	$this->db->from($table);
	


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
			$row[] =  anchor('diklat/post/'.$person->nip,$person->nip);;
			$row[] = $person->nama;
			
		
			$row[] = $person->pangkat."/".$person->gol;
			$row[] = $person->instansi;
			
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
	   
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class upload extends CI_Controller {
 
 public function __construct() {
   parent::__construct();
 }

 public function index() {
   $config = array(
     'upload_path' => 'upload/',
     'allowed_types' => 'gif|jpg|png|', // |extensi lainnya
     'max_size' => '0',
     //'encrypt_name' => true // meng-enkripsi nama file
   );
   $this->load->library('upload', $config);
 
   if ($this->upload->do_upload('file_name')) {
     $data = $this->upload->data();
 
     $query = array(
       'file_name' => $data['file_name'],
       'file_type' => $data['file_type'],
       'file_path' => $data['file_path'],
       'full_path' => $data['full_path'],
       'raw_name' => $data['raw_name'],
       'orig_name' => $data['orig_name'],
       'client_name' => $data['client_name'],
       'file_ext' => $data['file_ext'],
       'file_size' => $data['file_size'],
       'image_width' => $data['image_width'],
       'image_height' => $data['image_height'],
       'image_type' => $data['image_type'],
       'image_size_str' => $data['image_size_str']
     );
     $this->db->insert('tb_image', $query);
     $this->session->set_flashdata('msg', 'File berhasil di input!');
     redirect(site_url());
   }

   $data['result'] = $this->db->get('tb_image')->result();
   $this->load->view('upload_view', $data);
 }

 public function download_file($str) {
   force_download('./upload/'.$str, null);
 }
 
}
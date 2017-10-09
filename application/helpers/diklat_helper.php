<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('diklat'))
{
	   
       
    function getinstansi($kode_instansi)
    {
        $CI =& get_instance();
        $row=$CI->db->get_where('instansi',array('kode_instansi'=>$kode_instansi));
        if($row->num_rows()>0)
        {
            $row=$row->row_array();
            return $row['nama_instansi'];
        }
        else
        {
            return '';
        }
    }
    
    
}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_file {



    protected $CI;



    public function __construct($rules = array()){
        $this->CI =& get_instance();

    }



    public function do_upload(  $fieldname,   $upload_path)
    {
            $config['upload_path']          = $upload_path;
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['max_size']             = 500;
            $config['max_width']            = 3072;//1024 * 3
            $config['max_height']           = 3072; 

            $this->CI->load->library('upload', $config);

        
            if ( ! $this->CI->upload->do_upload(  $fieldname ))
            { 
                    $error = array('error' => $this->CI->upload->display_errors()); return $error;
            }
            else
            {
                    $data = array('upload_data' => $this->CI->upload->data()); return $data;
            }
    }

}


?>
<?php  if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (! function_exists('islogedin')) {
    function islogedin()
    {
        $CI =& get_instance();
        $CI->load->library('session');
    
        if ($CI->session->userdata('userid')) {
            return true;
        } else {
            return false;
        }
    }
}

if (! function_exists('UserRole')) {
    function UserRole()
    {
        $CI =& get_instance();
        $CI->load->library('session');
    
        if ($CI->session->userdata('role')) {
            return $CI->session->userdata('role');
        } else {
            die('you are not login');
        }
    }
}
if (! function_exists('isHOD')) {
    function isHOD():bool
    {
        $CI =& get_instance();
        $CI->load->library('session');
        
        $loginId = $CI->session->userdata('userid');
        $teacher = R::findOne('teachers','login_id = ?',[$loginId]);

        $Hod = R::findOne('hods','teachers_id = ?',[$teacher->id]);
        if(is_object($Hod)) {

            return true;
        }
        return false;
    }
}

if (! function_exists('generate_password')) {
    function generate_password($password)
    {
        $salt = 'hjghbdjgh7486539neojnvge0@#$nfwgjknej';
        $password = md5($password . $salt);
        return $password;
    }
}


if (! function_exists('is_authenticated_session')) {
    function is_authenticated_session()
    {
        if (!islogedin()) {
            redirect(base_url('logout'));
        }
    }
}

if (! function_exists('is_in_array')) {
    function is_in_array($array, $key, $key_value)
    {
        $within_array = false;
        foreach ($array as $k=>$v) {
            if (is_array($v)) {
                $within_array = is_in_array($v, $key, $key_value);
                if ($within_array == true) {
                    break;
                }
            } else {
                if ($v == $key_value && $k == $key) {
                    $within_array = true;
                    break;
                }
            }
        }
        return $within_array;
    }
}

if (! function_exists('unlinker')) {
    function unlinker($file)
    {
        try {
            if (file_exists($file)) {
                @unlink($file);
            }
        } catch (Exception $ex) {
            $err=$ex->getMessage();
        }
    }
}

if (! function_exists('getSiteFrontendAsset')) {
    function getSiteFrontendAsset($asset='')
    {
        $CI =& get_instance();
        return $CI->config->item('site_frontend_assets').$asset;
    }
}

if (! function_exists('getSiteBackendAsset')) {
    function getSiteBackendAsset($asset='')
    {
        $CI =& get_instance();
        return $CI->config->item('site_backend_assets').$asset;
    }
}

if (! function_exists('getUploadsUrl')) {
    function getUploadsUrl($asset='')
    {
        $CI =& get_instance();
        return $CI->config->item('uploads_url').$asset;
    }
}

if (! function_exists('fileUpload')) {
    function fileUpload(string $filename, string $path)
    {
        $CI =& get_instance();

        $config['upload_path']          = getUploadsUrl($path);
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000000;
        $config['max_width']            = 10000000;
        $config['max_height']           = 10000000;
        $config['remove_spaces']        = true;
        $config['encrypt_name']         = true;
                
        $CI->load->library('upload', $config);
        
        $uploadStatus = $CI->upload->do_upload($filename);
        $filedetails = $CI->upload->data();
 
        return ['uploadstatus'=>$uploadStatus,'filename'=>$filedetails['file_name'],'error'=>$CI->upload->display_errors()];
    }
}
if(!function_exists('isPostBack')) {
    function isPostBack():bool
    {
        return (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')?TRUE:FALSE;
    }
}

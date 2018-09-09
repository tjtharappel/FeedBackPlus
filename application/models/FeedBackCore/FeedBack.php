<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FeedBack extends CI_Model
{
    private $CI;
    public function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
    }
    
}
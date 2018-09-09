<?php
class MY_Loader extends CI_Loader
{
    public function __construct()
    {
        parent::__construct();
    }

    public function iface(string $strInterfaceName)
    {
        require_once APPPATH . '/models/FeedBackCore/Interfaces/' . $strInterfaceName . '.php';
    }
}

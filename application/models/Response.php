<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Response extends CI_Model
{
    public $message;
    public $status;

    public function __construct(string $message='', string $status='')
    {
        $this->message = $message;
        $this->status = $status;
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teste extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('security');
        foreach ($_POST as $key => $value) {
            $_POST[$key] = xss_clean($value);
        }
    }

    public function index()
    {
        $this->load->view('email/template');

    }
}
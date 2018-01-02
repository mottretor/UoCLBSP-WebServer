<?php
/**
 * Created by PhpStorm.
 * User: Chathurya
 * Date: 12/31/2017
 * Time: 1:28 PM
 */

class Admin_home extends CI_Controller
{
    public function index()
    {
        $this->load->view('admin_home');
    }

    public function buildings()
    {
        echo 'Um working';
        $this->load->view('buildings');
    }


}

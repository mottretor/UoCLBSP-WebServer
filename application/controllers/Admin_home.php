<?php
/**
 * Created by PhpStorm.
 * User: Chathurya
 * Date: 12/31/2017
 * Time: 1:28 PM
 */

class Admin_home extends CI_Controller
{
    public function home()
    {
        $this->load->view('admin_home');
    }

//    function addBuilding()
//    {
//
//        $data['result'] = ''; //you can use this if you need to pass some data to the view
//
//
//   print $this->load->view('add_building', $data, true);//This will load your view page to the div element

}

<?php
/**
 * Created by PhpStorm.
 * Auth: Chathurya
 * Date: 3/29/2018
 * Time: 3:02 PM
 */
?>

<?php

class User_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function user_type($email){
        #$this->db->select('email');
        $this->db->where('email',$email);
        $query = $this->db->get('user');

        if ($query->num_rows() > 0){
            return array('admin'=>'true');
        }
        else{
            return array('admin'=>'false');
        }


    }
}




?>

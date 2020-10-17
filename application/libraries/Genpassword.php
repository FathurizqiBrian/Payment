<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('phpass-0.5/PasswordHash.php');



class Genpassword{

    public function __construct(){
        $this->ci =& get_instance();            

        $this->ci->load->config('setting', TRUE);              
    }



    public function generatePassword($password){

            $hasher = new PasswordHash($this->ci->config->item('phpass_hash_strength', 'setting'), $this->ci->config->item('phpass_hash_portable', 'default'));

            $hashed_password = $hasher->HashPassword($password);   

            return $hashed_password;

    }



    public function setPassword($password){

        $hasher = new PasswordHash(

            $this->ci->config->item('phpass_hash_strength', 'setting'),

            $this->ci->config->item('phpass_hash_portable', 'setting')

        );

        $hashed_password = $hasher->HashPassword($password);

        return $hashed_password;

    }



    public function checkPassword($text, $hash){

        $hasher = new PasswordHash(

            $this->ci->config->item('phpass_hash_strength', 'setting'),

            $this->ci->config->item('phpass_hash_portable', 'setting')

        );

        $hashed_password = $hasher->CheckPassword($text, $hash);
        
        return $hashed_password;
        

    }



}
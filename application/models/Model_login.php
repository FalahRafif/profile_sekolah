<?php

class Model_login extends CI_Model{

    public function getDataUser($username)
    {
         //////////// cek user dari ortu //////////
         $this->db
         ->select('*')
         ->from('akun_guru')
         ->where('username', $username);
         $userortu = $this->db->get()->row_array();
         if( isset($userortu)){
             return $userortu;
         }
         //////////// cek user dari siswa //////////
         $this->db
         ->select('*')
         ->from('akun_siswa')
         ->where('username', $username);
         $userSiswa = $this->db->get()->row_array();
         if( isset($userSiswa)){
             return $userSiswa;
         }
         //////////// cek user dari siswa //////////
         $this->db
         ->select('*')
         ->from('akun_admin')
         ->where('username', $username);
         $admin = $this->db->get()->row_array();
         if( isset($admin)){
             return $admin;
         }
    }
    public function getUserLevel($idUserLevel)
    {
        ////////////// cari user level //////////////
        $this->db
        ->select('user_level')
        ->from('user_level')
        ->where('id_user_level', $idUserLevel);
        $userLevel = $this->db->get()->row_array();
        return $userLevel['user_level'];
         

    }
}
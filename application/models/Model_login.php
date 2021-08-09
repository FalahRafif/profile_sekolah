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
    public function getAllDataUser($type)
    {
        switch ($type) {
            case 'siswa':
                $this->db
                ->select('*')
                ->from('akun_siswa');
                $data[0] = $this->db->get()->num_rows();
                $this->db
                ->select('*')
                ->from('akun_siswa');
                $data[1] = $this->db->get()->result_array();
                break;
            case 'guru':
                $this->db
                ->select('*')
                ->from('akun_guru');
                $data[0] = $this->db->get()->num_rows();
                $this->db
                ->select('*')
                ->from('akun_guru');
                $data[1] = $this->db->get()->result_array();
                break;
            case 'admin':
                $this->db
                ->select('*')
                ->from('akun_admin');
                $data[0] = $this->db->get()->num_rows();
                $this->db
                ->select('*')
                ->from('akun_admin');
                $data[1] = $this->db->get()->result_array();
                break;
        }
        return $data;
    }
    public function insertDatasNew($datas, $table, $id)
    {
        $error = 0;
        foreach ($datas[1] as $data) {
            $this->db->trans_start();
            $this->db->where($id, $data[$id]);
            $this->db->update($table, $data);
            $this->db->trans_complete();
            $status = $this->db ->trans_status();
            //////// cek status insert //////////////////
            if( $status === FALSE){
                $error++;
            }
        }
        return $error;
    }
}
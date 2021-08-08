<?php

class Model_sekolah extends CI_Model {

    public function getDataSekolah($username)
    {
        //////////// cek user dari ortu //////////
        $this->db
        ->select('*')
        ->from('akun_guru')
        ->where('username', $username);
        $userortu = $this->db->get()->row_array();
        if( isset($userortu)){
            ////////// cari nik di akun guru //////////////
            $this->db
            ->select('nip')
            ->from('akun_guru')
            ->where('username', $username);
            $nip = $this->db->get()->row_array();        
            ///////////// cari nis data guru //////////////////
            $this->db
            ->select('nisekolah')
            ->from('guru')
            ->where('nip', $nip['nip']);
            $nis = $this->db->get()->row_array();
            //////////// get sekolah ////////////////
            $datasekolah = $this->db
            ->select('*')
            ->from('sekolah', 'jenjang')
            ->where('nisekolah', $nis['nisekolah'])
            ->join('jenjang', 'jenjang.id_jenjang = sekolah.id_jenjang');
            $datasekolah = $this->db
            ->get()
            ->row_array();
            return $datasekolah;
        }
        //////////// cek user dari siswa //////////
        $this->db
        ->select('*')
        ->from('akun_siswa')
        ->where('username', $username);
        $userSiswa = $this->db->get()->row_array();
        if( isset($userSiswa)){
            ////////// cari nik di akun siswa //////////////
            $this->db
            ->select('nisn')
            ->from('akun_siswa')
            ->where('username', $username);
            $nisn = $this->db->get()->row_array();        
            ///////////// cari nis data siswa //////////////////
            $this->db
            ->select('nisekolah')
            ->from('siswa')
            ->where('nisn', $nisn['nisn']);
            $nis = $this->db->get()->row_array();
            //////////// get sekolah ////////////////
            $datasekolah = $this->db
            ->select('*')
            ->from('sekolah', 'jenjang')
            ->where('nisekolah', $nis['nisekolah'])
            ->join('jenjang', 'jenjang.id_jenjang = sekolah.id_jenjang');
            $datasekolah = $this->db
            ->get()
            ->row_array();
            return $datasekolah;
        }
    }
    public function getTotalGuruSiswa($nisekolah)
        {
            //count siswa
            $totalsiswa['tsiswa'] = $this->db
            ->get_where('siswa', ['nisekolah' => $nisekolah])
            ->num_rows();
            /// count guru
            $totalsiswa['tguru'] = $this->db
            ->get_where('guru', ['nisekolah' => $nisekolah])
            ->num_rows();
            return $totalsiswa;
        }
    public function getAllDataSiswaByNisekolah($nis)
    {
        $this->db
        ->select('*')
        ->from('siswa')
        ->where('nisekolah', $nis);
        $siswa = $this->db->get()->result_array();  
        return $siswa;
    }
    public function getSiswaByNISN($nisn)
    {
        $this->db
        ->select('*')
        ->from('siswa')
        ->where('nisn', $nisn);
        $siswa = $this->db->get()->row_array();  
        return $siswa;
    }
    public function getOrtuByNISN($nisn)
    {
        $this->db
        ->select('*')
        ->from('anak', 'orangtua')
        ->join('orangtua', 'orangtua.id_ortu = anak.id_ortu')
        ->where('anak.nisn', $nisn);
        $ortu = $this->db->get()->row_array();
        return $ortu;
    }
    public function getAllDataGuruByNisekolah($nis)
    {
        $this->db
        ->select('*')
        ->from('guru')
        ->where('nisekolah', $nis);
        $guru = $this->db->get()->result_array();  
        return $guru;
    }
    public function getGuruByNIP($nip)
    {
        $this->db
        ->select('*')
        ->from('guru')
        ->where('nip', $nip);
        $guru = $this->db->get()->row_array();  
        return $guru;
    }
    public function getNISNByUsername($username)
    {
        $this->db
        ->select('*')
        ->from('akun_siswa')
        ->where('username', $username);
        $nisn = $this->db->get()->row_array();  
        return $nisn['nisn'];
    }
    public function getNIPByUsername($username)
    {
        $this->db
        ->select('nip')
        ->from('akun_guru')
        ->where('username', $username);
        $nip = $this->db->get()->row_array();  
        return $nip['nip'];
    }
    public function getDataSekolahByNisekolah($nis)
    {
        $this->db
            ->select('*')
            ->from('sekolah', 'jenjang')
            ->where('nisekolah', $nis)
            ->join('jenjang', 'jenjang.id_jenjang = sekolah.id_jenjang');
            $datasekolah = $this->db
            ->get()
            ->row_array();
            return $datasekolah;
    }
    public function getDataKepsekByNisekolah($nis)
    {
        $this->db
        ->select('*')
        ->from('guru')
        ->where('nisekolah', $nis)
        ->where('jabatan', 'Kepala Sekolah');
        $kepsek = $this->db->get()->row_array();
        return $kepsek;
    }
}
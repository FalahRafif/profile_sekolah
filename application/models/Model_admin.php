<?php

class Model_admin extends CI_Model {

    public function getAllJenjang()
    {
        $this->db
        ->select('*')
        ->from('jenjang');
        $jenjang = $this->db->get()->result_array();
        return $jenjang;
    }
    public function updateDataSekolah($data, $nis)
    {
        // rescructure data
        $data = [
            'nisekolah' => $nis,
            'nama_sekolah' => $data['nama_sekolah'],
            'id_jenjang' => $data['jenjang'],
            'waktu_peneylenggaraan_sekolah' => $data['wps'],
            'akreditasi' => $data['akreditasi'],
            'alamat' => $data['alamat'],
            'no_telp' => $data['no_telp'],
            'no_hp' => $data['no_hp'],
            'kelurahan' => $data['kelurahan'],
            'kecamatan' => $data['Kecamatan'],
            'kota' => $data['Kota'],
            'bentuk_sekolah' => $data['bentuk_sekolah'],
            'gambar' => $data['gambar'],
        ];
         ///////// upload ke database
         $this->db->trans_start();
         $this->db->where('nisekolah', $nis);
         $this->db->update('sekolah', $data);
         $this->db->trans_complete();
         $status = $this->db ->trans_status();
 
           //////// cek status insert //////////////////
         if( $status === FALSE){
             return FALSE;
         }else{
             return TRUE;
         }
    }
    public function tambahDataGuru($data, $nis)
    {
        $data = [
            'nip' => $data['nip'],
            'nisekolah' => $nis,
            'nama_guru' => $data['nama_guru'],
            'jk' => $data['jk'],
            'tanggal_lahir' => $data['tgl_lhr'],
            'tempat_lahir' => $data['tmp_lhr'],
            'pend_akh' => $data['pend_akh'],
            'agama' => $data['agama'],
            'jabatan' => $data['jabatan'],
            'mapel_diajar' => $data['mapel_diajar'],
            'gambar' => NULL,
        ];
        //////// upload ke database
        $this->db->trans_start();
        $this->db->insert('guru', $data);
        $this->db->trans_complete();
        $status = $this->db ->trans_status();

          //////// cek status insert //////////////////
        if( $status === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function tambahAkunGuru($data)
    {
        $data = [
            'id_akun_guru' => NULL,
            'nip' => $data['nip'],
            'username' => $data['username'],
            'pw' => $data['pw'],
            'id_user_level' => 2,
        ];
        //////// upload ke database
        $this->db->trans_start();
        $this->db->insert('akun_guru', $data);
        $this->db->trans_complete();
        $status = $this->db ->trans_status();

          //////// cek status insert //////////////////
        if( $status === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function cekUsernameGuru($username)
    {
        $this->db
        ->select('*')
        ->from("akun_guru")
        ->where('username', $username);
        $username = $this->db->get()->row_array();
        return $username;
    }
    public function cekUsernameSiswa($username)
    {
        $this->db
        ->select('*')
        ->from("akun_siswa")
        ->where('username', $username);
        $username = $this->db->get()->row_array();
        return $username;
    }
    public function cekUsernameAdmin($username)
    {
        $this->db
        ->select('*')
        ->from("akun_admin")
        ->where('username', $username);
        $username = $this->db->get()->row_array();
        return $username;
    }
    public function cekUsername($username)
    {
        //////////// cek username akun guru /////////////////
        $username = $this->cekUsernameGuru($username);
        if ($username != NULL){
            return TRUE;
        }
        //////////// cek username akun siswa/////////////////
        $username = $this->cekUsernameSiswa($username);
        if ($username != NULL){
            return TRUE;
        }
        //////////// cek username akun admin /////////////////
        $username = $this->cekUsernameAdmin($username);
        if ($username != NULL){
            return TRUE;
        }
    }
    public function cekJabatan($jabatan, $nis)
    {
        switch ($jabatan) {
            case 'Kepala Sekolah':
                    // get guru jabatan kepsek
                    $this->db
                    ->select('*')
                    ->from("guru")
                    ->where('nisekolah', $nis)
                    ->where('jabatan', $jabatan);
                    $guru = $this->db->get()->row_array();
                    $guru['jabatan'] = "Guru";
                    //update guru jabatan kepsek
                    $this->db->trans_start();
                    $this->db->where('nip', $guru['nip']);
                    $this->db->update('guru', $guru );
                    $this->db->trans_complete();
                break;
            case 'Wakil Kepala Sekolah':
                    // get guru jabatan wakepsek
                    $this->db
                    ->select('*')
                    ->from("guru")
                    ->where('nisekolah', $nis)
                    ->where('jabatan', $jabatan);
                    $guru = $this->db->get()->row_array();
                    $guru['jabatan'] = "Guru";
                    //update guru jabatan wakepsek
                    $this->db->trans_start();
                    $this->db->where('nip', $guru['nip']);
                    $this->db->update('guru', $guru );
                    $this->db->trans_complete();
                break;
        }
    }
    public function getAkunGuruByNIP($nip)
    {
        $this->db
        ->select('*')
        ->from('akun_guru')
        ->where('nip', $nip);
        $akun = $this->db->get()->row_array();  
        return $akun;
    }
    public function cekJabatanAsli($nip, $jabatan)
    {
        $this->db
        ->select('*')
        ->from("guru")
        ->where('nip', $nip)
        ->where('jabatan', $jabatan);
        $cek = $this->db->get()->row_array();
        if ($cek != NULL){
            return TRUE;
        }
    }
    public function cekUsernameAsli($id, $username)
    {
        $this->db
        ->select('*')
        ->from("akun_guru")
        ->where('id_akun_guru', $id)
        ->where('username', $username);
        $cek = $this->db->get()->row_array();
        if ($cek != NULL){
            return TRUE;
        }
        $this->db
        ->select('*')
        ->from("akun_siswa")
        ->where('id_akun_siswa', $id)
        ->where('username', $username);
        $cek = $this->db->get()->row_array();
        if ($cek != NULL){
            return TRUE;
        }
    }
    public function cekUsernameAsliAdmin($id, $username)
    {
        
        $this->db
        ->select('*')
        ->from("akun_admin")
        ->where('id_admin', $id)
        ->where('username', $username);
        $cek = $this->db->get()->row_array();
        if ($cek != NULL){
            return TRUE;
        }
    }
    public function updateDataGuru($data)
    {
        $data = [
            'nip' => $data['nip'],
            'nisekolah' => $data['nisekolah'],
            'nama_guru' => $data['nama_guru'],
            'jk' => $data['jk'],
            'tanggal_lahir' => $data['tgl_lhr'],
            'tempat_lahir' => $data['tmp_lhr'],
            'pend_akh' => $data['pend_akh'],
            'agama' => $data['agama'],
            'jabatan' => $data['jabatan'],
            'mapel_diajar' => $data['mapel_diajar'],
            'gambar' => $data['gambar'],
        ];
        //////// upload ke database
        $this->db->trans_start();
        $this->db->where('nip', $data['nip']);
        $this->db->update('guru', $data);
        $this->db->trans_complete();
        $status = $this->db ->trans_status();

          //////// cek status insert //////////////////
        if( $status === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function updateAkunGuru($data)
    {
        $data = [
            'id_akun_guru' => $data['id_akun_guru'],
            'nip' => $data['nip'],
            'username' => $data['username'],
            'pw' => $data['pw'],
            'id_user_level' => $data['id_user_level'],
        ];
        //////// upload ke database
        $this->db->trans_start();
        $this->db->where('id_akun_guru', $data['id_akun_guru']);
        $this->db->update('akun_guru', $data);
        $this->db->trans_complete();
        $status = $this->db ->trans_status();

          //////// cek status insert //////////////////
        if( $status === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function deleteAkunGuru($nip)
    {
        $this->db->trans_start();        
        $this->db
        ->where('nip', $nip)
        ->delete('akun_guru');
        $this->db->trans_complete();
        $status = $this->db->trans_status();

        ////////////////// cek status ////////////
        if( $status === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function deleteDataGuru($nip)
    {
        $this->db->trans_start();        
        $this->db
        ->where('nip', $nip)
        ->delete('guru');
        $this->db->trans_complete();
        $status = $this->db->trans_status();

        ////////////////// cek status ////////////
        if( $status === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function cekJabatanPenting($nip)
    {
         //////////// cek username akun guru /////////////////
        $this->db
        ->select('*')
        ->from('guru')
        ->where('nip', $nip)
        ->where('jabatan', 'Kepala Sekolah');
        $username = $this->db->get()->row_array();
        if ($username != NULL){
            return TRUE;
        }
        //////////// cek username akun siswa/////////////////
        $this->db
        ->select('*')
        ->from('guru')
        ->where('nip', $nip)
        ->where('jabatan', 'Wakil Kepala Sekolah');
        $username = $this->db->get()->row_array();
        if ($username != NULL){
            return TRUE;
        }
    }
    public function tambahDataSiswa($data, $nis)
    {
        $data['kelas'] = $data['kelas'] . " " . $data['sub_kelas'];
        $data = [
            'nisn' => $data['nisn'],
            'nisekolah' => $nis,
            'nama_siswa' => $data['nama_siswa'],
            'jk' => $data['jk'],
            'tanggal_lahir' => $data['tgl_lhr'],
            'tempat_lahir' => $data['tmp_lhr'],
            'agama' => $data['agama'],
            'kelas' => $data['kelas'],
            'jurusan' => $data['jurusan'],
            'gambar' => NULL,
        ];
        //////// upload ke database
        $this->db->trans_start();
        $this->db->insert('siswa', $data);
        $this->db->trans_complete();
        $status = $this->db ->trans_status();

          //////// cek status insert //////////////////
        if( $status === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function tambahAkunSiswa($data)
    {
        $data = [
            'id_akun_siswa' => NULL,
            'nisn' => $data['nisn'],
            'username' => $data['username'],
            'pw' => $data['pw'],
            'id_user_level' => 1,
        ];
        //////// upload ke database
        $this->db->trans_start();
        $this->db->insert('akun_siswa', $data);
        $this->db->trans_complete();
        $status = $this->db ->trans_status();

          //////// cek status insert //////////////////
        if( $status === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function cekOrtuSiswa($data)
    {
        //cek ortu 
        $this->db
        ->select('*')
        ->from('orangtua')
        ->where('nama_ayah', $data['nama_ayah'])
        ->where('nama_ibu', $data['nama_ibu']);
        $ortu = $this->db->get()->row_array();
        if ($ortu != NULL){
            /// update orto
            $data = [
                'id_ortu' => $ortu['id_ortu'],
                'nama_ayah' => $data['nama_ayah'],
                'tanggal_lahir_ayh' => $data['tgl_lhr_ayh'],
                'tempat_lahir_ayh' => $data['tmp_lhr_ayh'],
                'pekerjaan_ayh' => $data['pekerjaan_ayh'],
                'pend_akh_ayh' => $data['pend_akh_ayh'],
                'nama_ibu' => $data['nama_ibu'],
                'tanggal_lahir_ibu' => $data['tgl_lhr_ibu'],
                'tempat_lahir_ibu' => $data['tmp_lhr_ibu'],
                'pekerjaan_ibu' => $data['pekerjaan_ibu'],
                'pend_akh_ibu' => $data['pend_akh_ibu'],
            ];

            $this->db->trans_start();
            $this->db->where('id_ortu', $ortu['id_ortu']);
            $this->db->update('orangtua', $data);
            $this->db->trans_complete();
            return $ortu;
        }else{
            return FALSE;
        }
    }
    public function tambahOrtu($data, $cek)
    {
        /// cek jika ortu ternyata sudah terdafta
        if($cek != FALSE){
            //////// tambah anak
            $data2 = [
                'id_anak' => NULL,
                'id_ortu' => $cek['id_ortu'],
                'nisn' => $data['nisn'],
            ];
            //////// upload ke database
            $this->db->trans_start();
            $this->db->insert('anak', $data2);
            $this->db->trans_complete();
            $status = $this->db ->trans_status();

            //////// cek status insert //////////////////
            if( $status === FALSE){
                return FALSE;
            }else{
                return TRUE;
            }
        }
        $data1 = [
            'id_ortu' => NULL,
            'nama_ayah' => $data['nama_ayah'],
            'tanggal_lahir_ayh' => $data['tgl_lhr_ayh'],
            'tempat_lahir_ayh' => $data['tmp_lhr_ayh'],
            'pekerjaan_ayh' => $data['pekerjaan_ayh'],
            'pend_akh_ayh' => $data['pend_akh_ayh'],
            'nama_ibu' => $data['nama_ibu'],
            'tanggal_lahir_ibu' => $data['tgl_lhr_ibu'],
            'tempat_lahir_ibu' => $data['tmp_lhr_ibu'],
            'pekerjaan_ibu' => $data['pekerjaan_ibu'],
            'pend_akh_ibu' => $data['pend_akh_ibu'],
        ];
        //////// upload ke database
        $this->db->trans_start();
        $this->db->insert('orangtua', $data1);
        $this->db->trans_complete();
        $status = $this->db ->trans_status();

          //////// cek status insert //////////////////
        if( $status === FALSE){
            return FALSE;
        }

        ////////// get data ortu 
         $this->db
         ->select('*')
         ->from('orangtua')
         ->where('nama_ayah', $data1['nama_ayah'])
         ->where('nama_ibu', $data1['nama_ibu']);
         $ortu = $this->db->get()->row_array();
         if ($ortu == NULL){
             return FALSE;
         }

         //////// tambah anak
         $data2 = [
            'id_anak' => NULL,
            'id_ortu' => $ortu['id_ortu'],
            'nisn' => $data['nisn'],
         ];
        //////// upload ke database
        $this->db->trans_start();
        $this->db->insert('anak', $data2);
        $this->db->trans_complete();
        $status = $this->db ->trans_status();

          //////// cek status insert //////////////////
        if( $status === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function getAkunSiswaByNISN($nisn)
    {
        $this->db
        ->select('*')
        ->from('akun_siswa')
        ->where('nisn', $nisn);
        $akun_siswa = $this->db->get()->row_array();  
        return $akun_siswa;
    }
    public function updateDataSiswa($data)
    {
        $data['kelas'] = $data['kelas'] . " " . $data['sub_kelas'];
        $data = [
            'nisn' => $data['nisn'],
            'nisekolah' => $data['nisekolah'],
            'nama_siswa' => $data['nama_siswa'],
            'jk' => $data['jk'],
            'tanggal_lahir' => $data['tgl_lhr'],
            'tempat_lahir' => $data['tmp_lhr'],
            'agama' => $data['agama'],
            'kelas' => $data['kelas'],
            'jurusan' => $data['jurusan'],
            'gambar' => $data['gambar'],
        ];
        //////// upload ke database
        $this->db->trans_start();
        $this->db->where('nisn', $data['nisn']);
        $this->db->update('siswa', $data);
        $this->db->trans_complete();
        $status = $this->db ->trans_status();

          //////// cek status insert //////////////////
        if( $status === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function updateAkunSiswa($data)
    {
        $data = [
            'id_akun_siswa' => $data['id_akun_siswa'],
            'nisn' => $data['nisn'],
            'username' => $data['username'],
            'pw' => $data['pw'],
            'id_user_level' => $data['id_user_level'],
        ];
        //////// upload ke database
        $this->db->trans_start();
        $this->db->where('id_akun_siswa', $data['id_akun_siswa']);
        $this->db->update('akun_siswa', $data);
        $this->db->trans_complete();
        $status = $this->db ->trans_status();

          //////// cek status insert //////////////////
        if( $status === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function updateOrtu($data)
    {
        $data = [
            'id_ortu' => $data['id_ortu'],
            'nama_ayah' => $data['nama_ayah'],
            'tanggal_lahir_ayh' => $data['tgl_lhr_ayh'],
            'tempat_lahir_ayh' => $data['tmp_lhr_ayh'],
            'pekerjaan_ayh' => $data['pekerjaan_ayh'],
            'pend_akh_ayh' => $data['pend_akh_ayh'],
            'nama_ibu' => $data['nama_ibu'],
            'tanggal_lahir_ibu' => $data['tgl_lhr_ibu'],
            'tempat_lahir_ibu' => $data['tmp_lhr_ibu'],
            'pekerjaan_ibu' => $data['pekerjaan_ibu'],
            'pend_akh_ibu' => $data['pend_akh_ibu'],
        ];
        //////// upload ke database
        $this->db->trans_start();
        $this->db->where('id_ortu', $data['id_ortu']);
        $this->db->update('orangtua', $data);
        $this->db->trans_complete();
        $status = $this->db ->trans_status();

          //////// cek status insert //////////////////
        if( $status === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function cekJumlahAnakOrtuById($id)
    {
        $this->db
         ->select('*')
         ->from('anak')
         ->where('id_ortu', $id['id_ortu']);
         $count = $this->db->get()->num_rows();
         return $count;
    }
    public function deleteSiswa($nisn)
    {
        $this->db->trans_start();        
        $this->db
        ->where('nisn', $nisn)
        ->delete('siswa');
        $this->db->trans_complete();
        $status = $this->db->trans_status();

        ////////////////// cek status ////////////
        if( $status === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function deleteAnak($nisn)
    {
        $this->db->trans_start();        
        $this->db
        ->where('nisn', $nisn)
        ->delete('anak');
        $this->db->trans_complete();
        $status = $this->db->trans_status();

        ////////////////// cek status ////////////
        if( $status === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function deleteAkunSiswa($nisn)
    {
        $this->db->trans_start();        
        $this->db
        ->where('nisn', $nisn)
        ->delete('akun_siswa');
        $this->db->trans_complete();
        $status = $this->db->trans_status();

        ////////////////// cek status ////////////
        if( $status === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function deleteOrtuSiswa($id_ortu)
    {
        $this->db->trans_start();        
        $this->db
        ->where('id_ortu', $id_ortu)
        ->delete('orangtua');
        $this->db->trans_complete();
        $status = $this->db->trans_status();

        ////////////////// cek status ////////////
        if( $status === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function getAllAdmin()
    {
        $this->db
        ->select('*')
        ->from('akun_admin');
        $admin = $this->db->get()->result_array();
        return $admin;
    }
    public function tambahAdmin($data)
    {
        $data = [
            'id_admin' => NULL,
            'username' => $data['username'],
            'pw' => $data['pw'],
            'id_user_level' => 3,
        ];
        //////// upload ke database
        $this->db->trans_start();
        $this->db->insert('akun_admin', $data);
        $this->db->trans_complete();
        $status = $this->db ->trans_status();

        //////// cek status insert //////////////////
        if( $status === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function updateAdmin($data)
    {
        $data = [
            'id_admin' => $data['id_admin'],
            'username' => $data['username'],
            'pw' => $data['pw'],
            'id_user_level' => $data['id_user_level'],
        ];
        //////// upload ke database
        $this->db->trans_start();
        $this->db->where('id_admin', $data['id_admin']);
        $this->db->update('akun_admin', $data);
        $this->db->trans_complete();
        $status = $this->db ->trans_status();

          //////// cek status insert //////////////////
        if( $status === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function getAdminById($id)
    {
        $this->db
        ->select('*')
        ->from('akun_admin')
        ->where('id_admin', $id);
        $admin = $this->db->get()->row_array();
        return $admin;
    }
    public function deleteAdmin($id)
    {
        $this->db->trans_start();        
        $this->db
        ->where('id_admin', $id)
        ->delete('akun_admin');
        $this->db->trans_complete();
        $status = $this->db->trans_status();

        ////////////////// cek status ////////////
        if( $status === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
}
<?php

class Admin extends CI_Controller {
    
    private $nisekolah = 121221;
    private $user_level = 3;

    public function __construct()
    {
        parent::__construct();
        ///// cek session
        $sessionCek = [
            'username' => $this->session->userdata('username'),
            'user_level' => $this->session->userdata('user_level')
        ];        
        if( $sessionCek['username']  != FALSE && isset($sessionCek['user_level'])){
			switch ($sessionCek['user_level']) {
                case '3':
                    break;
                default :
                    redirect('login/index');
                    break;
            }
        }else{
            redirect('login/login');
        }
        $this->load->model('model_sekolah');
        $this->load->model('model_admin');
    }
    public function logOut()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('user_level');
        redirect('login');
    }
    public function index()
    {
        //get data post
        $submit = $this->input->post('submit');
        if($submit == TRUE) {
            //update data sekolah
            $datPost = $this->input->post(NULL, TRUE);
            $cek = $this->model_admin->updateDataSekolah($datPost, $this->nisekolah);
            if($cek == TRUE){
                $this->session->set_flashdata('flash', 'Data Berhasil Di Tambahkan');
                    redirect('admin/index');
            }else{
                $this->session->set_flashdata('flash', 'Data Gagal Di Tambahkan');
                    redirect('admin/index');
            }
        }
        $dataSekolah = $this->model_sekolah->getDataSekolahByNisekolah($this->nisekolah);
        // get info total guru dan siswa
        $total = $this->model_sekolah->getTotalGuruSiswa($dataSekolah['nisekolah']);
        //get jenjang 
        $jenjang = $this->model_admin->getAllJenjang();
        $data = [
            'jenjang' => $jenjang,
            'sekolah' => $dataSekolah,
            'tguru' => $total['tguru'],
            'tsiswa' => $total['tsiswa'],
            'login' => FALSE,
        ];
        // templates
        $this->load->view('admin/templates/head');  
        $this->load->view('admin/templates/navbar', $data);  
        // end templates
        $this->load->view('admin/admin', $data);  
        // templates
        $this->load->view('admin/templates/footer');  
        $this->load->view('admin/templates/script');  
        // end telplates
        
    }
    public function dgs()
    {
        $dataSekolah = $this->model_sekolah->getDataSekolahByNisekolah($this->nisekolah);
        // get all data siswa
        $siswa = $this->model_sekolah->getAllDataSiswaByNisekolah($this->nisekolah);
        // get all data guru
        $guru = $this->model_sekolah->getAllDataGuruByNisekolah($this->nisekolah);
        $data = [
            'siswa' => $siswa,
            'guru' => $guru,
            'login' => FALSE,
        ] ;
        // templates
        $this->load->view('admin/templates/head');  
        $this->load->view('admin/templates/navbar', $data);  
        // end templates
        $this->load->view('admin/dgs', $data);  
        // templates
        $this->load->view('admin/templates/footer');  
        $this->load->view('admin/templates/script');  
        // end telplates
    }
    public function tambah_guru()
    {
        // get input post
        $submit = $this->input->post('submit');
        if($submit == TRUE){
            //get data post
            $datPost = $this->input->post(NULL, TRUE);
            //cek username 
            $cek = $this->model_admin->cekUsernameGuru($datPost['username']);
                    if($cek == TRUE){
                    $this->session->set_flashdata('flash', 'Username Telah Di Pakai');
                        redirect('admin/tambah_guru');
                    }
                    $cek = $this->model_admin->cekUsernameSiswa($datPost['username']);
                    if($cek == TRUE){
                        $this->session->set_flashdata('flash', 'Username Telah Di Pakai');
                            redirect('admin/tambah_guru');
                    }
                    $cek = $this->model_admin->cekUsernameAdmin($datPost['username']);
                    if($cek == TRUE){
                        $this->session->set_flashdata('flash', 'Username Telah Di Pakai');
                            redirect('admin/tambah_guru');
                    }
            //cek password 
            if($datPost['pw'] != $datPost['re_pw']){
                $this->session->set_flashdata('flash', 'password tidak sama');
                    redirect('admin/tambah_guru');
            }
            //encrypt password
            $datPost['pw'] = $this->encryption->encrypt($datPost['pw']);
            //cek jabatan 
            $this->model_admin->cekJabatan($datPost['jabatan'], $this->nisekolah);
            //insert data guru
            $cek = $this->model_admin->tambahDataGuru($datPost, $this->nisekolah);
            if($cek == FALSE){
                $this->session->set_flashdata('flash', 'Data Gagal Tambahkan');
                    redirect('admin/dgs');
            }
            //insert akun guru
            $cek = $this->model_admin->tambahAkunGuru($datPost);
            if($cek == TRUE){
                $this->session->set_flashdata('flash', 'Data Berhasil Di Tambahkan');
                    redirect('admin/dgs');
            }else{
                $this->session->set_flashdata('flash', 'Data Gagal Di Tambahkan');
                    redirect('admin/dgs');
            }
        }

        $data = [
            'login' => FALSE,
        ] ;
        // templates
        $this->load->view('admin/templates/head');  
        $this->load->view('admin/templates/navbar', $data);  
        // end templates
        $this->load->view('admin/guru/tambah_guru', $data);  
        // templates
        $this->load->view('admin/templates/footer');  
        $this->load->view('admin/templates/script');  
        // end telplates
    }
    public function info_guru($nip = '')
    {

        if($nip != ''){
            //get data guru 
            $guru = $this->model_sekolah->getGuruByNIP($nip);
            $data = [
                'guru' => $guru,
                'login' => FALSE,
            ] ;
                // templates
                $this->load->view('admin/templates/head');  
                $this->load->view('admin/templates/navbar', $data);  
                // end templates
                $this->load->view('sekolah/guru/info_guru', $data);    
                // templates
                $this->load->view('admin/templates/footer');  
                $this->load->view('admin/templates/script');  
        }else{
            redirect('admin/dgs ');
        }
    }
    public function info_siswa($nisn = '')
    {
        if($nisn != ''){
            //get data siswa 
            $siswa = $this->model_sekolah->getSiswaByNISN($nisn);
            //get ortu by nisn
            $ortu = $this->model_sekolah->getOrtuByNISN($nisn);
            $data = [
                'siswa' => $siswa,
                'ortu' => $ortu,
                'login' => FALSE,
            ] ;
            // templates
            $this->load->view('admin/templates/head');  
            $this->load->view('admin/templates/navbar', $data);  
            // end templates
            $this->load->view('sekolah/siswa/info_siswa', $data);  
            // templates
            $this->load->view('admin/templates/footer');  
            $this->load->view('admin/templates/script');  
        }else{
            redirect('home/profile_siswa');
        }
        // end telplates
    }
    public function update_guru($nip = '')
    {
        if($nip != ''){
            
            //get data guru
            $guru = $this->model_sekolah->getGuruByNIP($nip);
            //get akun guru
            $akun_guru = $this->model_admin->getAkunGuruByNIP($nip);
            $data = [
                'akun_guru' => $akun_guru,
                'guru' => $guru,
                'login' => FALSE,
            ] ;
            // templates
            $this->load->view('admin/templates/head');  
            $this->load->view('admin/templates/navbar', $data);  
            // end templates
            $this->load->view('admin/guru/edit_guru', $data);  
            // templates
            $this->load->view('admin/templates/footer');  
            $this->load->view('admin/templates/script');  
            // end telplates
        }else{
            redirect('admin/dgs');
        }
        
    }
    public function updet_guru()
    {
        // get input post
        $submit = $this->input->post('submit');
            if($submit == TRUE){
                //get data post
                $datPost = $this->input->post(NULL, TRUE);
                //cek username lama
                $cek = $this->model_admin->cekUsernameAsli($datPost['id_akun_guru'],$datPost['username']);
                if( $cek != TRUE ){
                    $cek = $this->model_admin->cekUsernameGuru($datPost['username']);
                    if($cek == TRUE){
                    $this->session->set_flashdata('flash', 'Username Telah Di Pakai');
                        redirect('admin/update_guru/' . $datPost['nip']);
                    }
                    $cek = $this->model_admin->cekUsernameSiswa($datPost['username']);
                    if($cek == TRUE){
                        $this->session->set_flashdata('flash', 'Username Telah Di Pakai');
                            redirect('admin/update_guru/' . $datPost['nip']);
                    }
                    $cek = $this->model_admin->cekUsernameAdmin($datPost['username']);
                    if($cek == TRUE){
                        $this->session->set_flashdata('flash', 'Username Telah Di Pakai');
                            redirect('admin/update_guru/' . $datPost['nip']);
                    }
                }
                //cek password 
                if($datPost['pw'] != ''){
                    if($datPost['pw'] != $datPost['re_pw']){
                    $this->session->set_flashdata('flash', 'password tidak sama');
                        redirect('admin/update_guru/' . $datPost['nip']);
                    }
                }else{
                    $datPost['pw'] = $this->encryption->decrypt($datPost['old_pw']);
                }
                $datPost['pw'] =  $this->encryption->encrypt($datPost['pw']);
                //cek jabatan lama
                $cek = $this->model_admin->cekJabatanAsli($datPost['nip'] ,$datPost['jabatan']);
                if($cek != TRUE){
                    $this->model_admin->cekJabatan($datPost['jabatan'], $this->nisekolah);
                }
                //update data guru
                $cek = $this->model_admin->updateDataGuru($datPost);
                if($cek != TRUE){
                    $this->session->set_flashdata('flash', 'Data Gagal Di Update');
                    redirect('admin/dgs');
                }
                //update akun guru
                $cek = $this->model_admin->updateAkunGuru($datPost);
                if($cek == TRUE){
                    $this->session->set_flashdata('flash', 'Data Berhasil Di Update');
                        redirect('admin/dgs');
                }else{
                    $this->session->set_flashdata('flash', 'Data Gagal Di Update');
                        redirect('admin/dgs');
                }
            }else{
                redirect('admin/dgs');
            }
    }
    public function delete_guru($nip = '')
    {
        if($nip != ''){
            //get data guru
            $datGuru = $this->model_sekolah->getGuruByNIP($nip);
            //cek jika jabatan kepsek/wakepsek 
            $cek = $this->model_admin->cekJabatanPenting($nip);
            if($cek == TRUE){
                $this->session->set_flashdata('flash', 'Kepala Sekolah / Wakil Kepala Sekolah Tidak Bisa di Delete');
                    redirect('admin/dgs');
            }
            //delete akun guru
            $cek = $this->model_admin->deleteAkunGuru($nip);
            if($cek != TRUE){
                $this->session->set_flashdata('flash', 'Data Gagal Di delete');
                redirect('admin/dgs');
            }
            //delete data guru
            $cek = $this->model_admin->deleteDataGuru($nip);
            if($cek == TRUE){
                $this->session->set_flashdata('flash', 'Data Berhasil Di delete');
                    redirect('admin/dgs');
            }else{
                $this->session->set_flashdata('flash', 'Data Gagal Di delete');
                    redirect('admin/dgs');
            }
        }else{
            redirect('admin/index');
        }
    }
    public function tambah_siswa()
    {
        // cek tombol submit
        $submit = $this->input->post('submit');
        if($submit == TRUE){
            
            $datPost = $this->input->post(NULL, TRUE);
            //cek username 
            $cek = $this->model_admin->cekUsernameGuru($datPost['username']);
                if($cek == TRUE){
                    $this->session->set_flashdata('flash', 'Username Telah Di Pakai');
                        redirect('admin/tambah_siswa');
                }
                $cek = $this->model_admin->cekUsernameSiswa($datPost['username']);
                if($cek == TRUE){
                    $this->session->set_flashdata('flash', 'Username Telah Di Pakai');
                        redirect('admin/tambah_siswa');
                }
                $cek = $this->model_admin->cekUsernameAdmin($datPost['username']);
                if($cek == TRUE){
                    $this->session->set_flashdata('flash', 'Username Telah Di Pakai');
                        redirect('admin/tambah_siswa');
                }
            //cek password 
            if($datPost['pw'] != $datPost['re_pw']){
                $this->session->set_flashdata('flash', 'password tidak sama');
                    redirect('admin/tambah_siswa');
            }
            // encrypt password
            $datPost['pw'] = $this->encryption->encrypt($datPost['pw']);
            //insert data siswa
            $cek = $this->model_admin->tambahDataSiswa($datPost, $this->nisekolah);
            if($cek != TRUE){
                $this->session->set_flashdata('flash', 'Data Gagal Di tambahkan');
                    redirect('admin/tambah_siswa');
            }
            //insert akun siswa
            $cek = $this->model_admin->tambahAkunSiswa($datPost);
            if($cek != TRUE){
                $this->session->set_flashdata('flash', 'Data Gagal Di tambahkan');
                    redirect('admin/tambah_siswa');
            }
            //cek ortu sudah terdaftar atau belum
            $ortu = [];
            $cek = $this->model_admin->cekOrtuSiswa($datPost);
            if($cek != FALSE){
                $ortu = $cek;
            }
            //insert ortu
            $cek = $this->model_admin->tambahOrtu($datPost, $ortu);
            if($cek == TRUE){
                $this->session->set_flashdata('flash', 'Data Berhasil Di tambah');
                    redirect('admin/dgs');
            }else{
                $this->session->set_flashdata('flash', 'Data Gagal Di tambah');
                    redirect('admin/tambah_siswa');
            }
        }
        $data = [
            'login' => FALSE,
        ] ;
        // templates
        $this->load->view('admin/templates/head');  
        $this->load->view('admin/templates/navbar', $data);  
        // end templates
        $this->load->view('admin/siswa/tambah_siswa', $data);  
        // templates
        $this->load->view('admin/templates/footer');  
        $this->load->view('admin/templates/script');  
        // end telplates
    }
    public function update_siswa($nisn = '')
    {
        if($nisn != ''){
            $post=$this->input->post(NULL, TRUE);
            //get data siswa 
            $siswa = $this->model_sekolah->getSiswaByNISN($nisn);
            //get data siswa    
            $akun_siswa = $this->model_admin->getAkunSiswaByNISN($nisn);
            //get ortu by nisn
            $ortu = $this->model_sekolah->getOrtuByNISN($nisn);
            $kelas = explode(" ", $siswa['kelas']);
            $data = [
                'siswa' => $siswa,
                'kelas' => $kelas,
                'akun_siswa' => $akun_siswa,
                'ortu' => $ortu,
                'login' => FALSE,
            ] ;
            // templates
            $this->load->view('admin/templates/head');  
            $this->load->view('admin/templates/navbar', $data);  
            // end templates
            $this->load->view('admin/siswa/edit_siswa', $data);  
            // templates
            $this->load->view('admin/templates/footer');  
            $this->load->view('admin/templates/script');  
            // end telplates
        }else{
            redirect('admin/dgs');
        }
    }
    public function edit_siswa()
    {
        // cek data post
        $submit = $this->input->post('submit');
        if($submit == TRUE){
            // get data post
            $datPost = $this->input->post(NULL, TRUE);
             //cek username lama
            $cek = $this->model_admin->cekUsernameAsli($datPost['id_akun_siswa'],$datPost['username']);
            if( $cek != TRUE ){
                //cek username 
                $cek = $this->model_admin->cekUsernameGuru($datPost['username']);
                if($cek == TRUE){
                    $this->session->set_flashdata('flash', 'Username Telah Di Pakai');
                        redirect('admin/update_siswa/' . $datPost['nisn']);
                }
                $cek = $this->model_admin->cekUsernameSiswa($datPost['username']);
                if($cek == TRUE){
                    $this->session->set_flashdata('flash', 'Username Telah Di Pakai');
                        redirect('admin/update_siswa/' . $datPost['nisn']);
                }
                $cek = $this->model_admin->cekUsernameAdmin($datPost['username']);
                if($cek == TRUE){
                    $this->session->set_flashdata('flash', 'Username Telah Di Pakai');
                        redirect('admin/update_siswa/' . $datPost['nisn']);
                }
            }
             //cek password 
            if($datPost['pw'] != ''){
                if($datPost['pw'] != $datPost['re_pw']){
                $this->session->set_flashdata('flash', 'password tidak sama');
                    redirect('admin/update_siswa/' . $datPost['nisn']);
                }
            }else{
                //decrypt old password
                $datPost['pw'] = $datPost['pw'] = $this->encryption->decrypt($datPost['old_pw']);
            }
            // encrypt password
            $datPost['pw'] = $this->encryption->encrypt($datPost['pw']);
            //update data siswa 
            $cek = $this->model_admin->updateDataSiswa($datPost);
                if($cek != TRUE){
                    $this->session->set_flashdata('flash', 'Data gagal di Tambah');
                        redirect('admin/update_siswa/' . $datPost['nisn']);
                }
            //update akun siswa 
            $cek = $this->model_admin->updateAkunSiswa($datPost);
                if($cek != TRUE){
                    $this->session->set_flashdata('flash', 'Data gagal di Tambah');
                        redirect('admin/update_siswa/' . $datPost['nisn']);
                }
            //update ortu
            $cek = $this->model_admin->updateOrtu($datPost);
            if($cek == TRUE){
                $this->session->set_flashdata('flash', 'Data Berhasil Di tambah');
                    redirect('admin/dgs');
            }else{
                $this->session->set_flashdata('flash', 'Data Gagal Di tambah');
                    redirect('admin/update_siswa/' . $datPost['nisn']);
            }
        }else{
            redirect('admin/dgs');
        }
    }
    public function delete_siswa($nisn = '')
    {
        if($nisn != ''){
            //delete akun_siswa
            $cek = $this->model_admin->deleteAkunSiswa($nisn);
            if($cek != TRUE){
                $this->session->set_flashdata('flash', 'Data gagal di Hapus');
                    redirect('admin/dgs');
            }
            //delete anak
            $cek = $this->model_admin->deleteAnak($nisn);
            if($cek != TRUE){
                $this->session->set_flashdata('flash', 'Data gagal di Hapus');
                    redirect('admin/dgs');
            }
            //delete siswa
            $cek = $this->model_admin->deleteSiswa($nisn);
            if($cek != TRUE){
                $this->session->set_flashdata('flash', 'Data gagal di Hapus');
                redirect('admin/dgs');
            }
            //cek if parent have more than 1 child
            //get ortu by nisn
            $ortu = $this->model_sekolah->getOrtuByNISN($nisn);
            $cek = $this->model_admin->cekJumlahAnakOrtuById($ortu['id_ortu']);
            //anak hanya 1
            if($cek == 1){
                //delete ortu
                $cek = $this->model_admin->deleteOrtuSiswa($ortu['id_ortu']);
                if($cek == TRUE){
                    $this->session->set_flashdata('flash', 'Data Berhasil Di hapus');
                        redirect('admin/dgs');
                }else{
                    $this->session->set_flashdata('flash', 'Data Gagal Di hapus');
                    redirect('admin/dgs');
                }
            }else{
                $this->session->set_flashdata('flash', 'Data Berhasil Di hapus');
                redirect('admin/dgs');
            }
            
        }else{
            redirect('admin/dgs');
        }
    }
    public function data_admin()
    {
        $admin = $this->model_admin->getAllAdmin();
        $data = [
            'admin' => $admin,
            'login' => FALSE,
        ] ;
        // templates
        $this->load->view('admin/templates/head');  
        $this->load->view('admin/templates/navbar', $data);  
        // end templates
        $this->load->view('admin/admin/data_admin', $data);  
        // templates
        $this->load->view('admin/templates/footer');  
        $this->load->view('admin/templates/script');  
        // end telplates
    }
    public function tambah_admin()
    {
        $submit = $this->input->post('submit');
        if($submit != ''){
            $datPost = $this->input->post(NULL, TRUE);
            //cek username 
            $cek = $this->model_admin->cekUsernameGuru($datPost['username']);
            if($cek == TRUE){
                $this->session->set_flashdata('flash', 'Username Telah Di Pakai');
                    redirect('admin/tambah_admin');
            }
            $cek = $this->model_admin->cekUsernameSiswa($datPost['username']);
            if($cek == TRUE){
                $this->session->set_flashdata('flash', 'Username Telah Di Pakai');
                    redirect('admin/tambah_admin');
            }
            $cek = $this->model_admin->cekUsernameAdmin($datPost['username']);
            if($cek == TRUE){
                $this->session->set_flashdata('flash', 'Username Telah Di Pakai');
                    redirect('admin/tambah_admin');
            }
            //cek password 
            if($datPost['pw'] != $datPost['re_pw']){
                $this->session->set_flashdata('flash', 'password tidak sama');
                    redirect('admin/tambah_admin');
            }
            // encrpyt password
            $datPost['pw'] = $this->encryption->encrypt($datPost['pw']);
            //insert admin
            $cek = $this->model_admin->tambahAdmin($datPost);
                if($cek == TRUE){
                    $this->session->set_flashdata('flash', 'Data Berhasil Di tambah');
                        redirect('admin/data_admin');
                }else{
                    $this->session->set_flashdata('flash', 'Data Gagal Di tambah');
                    redirect('admin/tambah_admin');
                }
        }
        $data = [
            'login' => FALSE,
        ] ;
        // templates
        $this->load->view('admin/templates/head');  
        $this->load->view('admin/templates/navbar', $data);  
        // end templates
        $this->load->view('admin/admin/tambah_admin', $data);  
        // templates
        $this->load->view('admin/templates/footer');  
        $this->load->view('admin/templates/script');  
        // end telplates
    }
    public function update_admin($id = '')
    {
        if($id != ''){
            $admin = $this->model_admin->getAdminById($id);
        $data = [
            'admin' => $admin,
            'login' => FALSE,
        ] ;
        // templates
        $this->load->view('admin/templates/head');  
        $this->load->view('admin/templates/navbar', $data);  
        // end templates
        $this->load->view('admin/admin/edit_admin', $data);  
        // templates
        $this->load->view('admin/templates/footer');  
        $this->load->view('admin/templates/script');  
        // end telplates
        }else{
            redirect('admin/data_admin');
        }
    }
    public function edit_admin()
    {
        $submit = $this->input->post('submit');
        if($submit != ''){
            $datPost = $this->input->post(NULL, TRUE);
             //cek username lama
             $cek = $this->model_admin->cekUsernameAsliAdmin($datPost['id_admin'],$datPost['username']);
             if( $cek != TRUE ){
                 //cek username 
                 $cek = $this->model_admin->cekUsernameGuru($datPost['username']);
                 if($cek == TRUE){
                     $this->session->set_flashdata('flash', 'Username Telah Di Pakai');
                         redirect('admin/update_admin/' . $datPost['id_admin']);
                 }
                 $cek = $this->model_admin->cekUsernameSiswa($datPost['username']);
                 if($cek == TRUE){
                     $this->session->set_flashdata('flash', 'Username Telah Di Pakai');
                         redirect('admin/update_admin/' . $datPost['id_admin']);
                 }
                 $cek = $this->model_admin->cekUsernameAdmin($datPost['username']);
                 if($cek == TRUE){
                     $this->session->set_flashdata('flash', 'Username Telah Di Pakai');
                         redirect('admin/update_admin/' . $datPost['id_admin']);
                 }
             }
              //cek password 
             if($datPost['pw'] != ''){
                 if($datPost['pw'] != $datPost['re_pw']){
                 $this->session->set_flashdata('flash', 'password tidak sama');
                 redirect('admin/update_admin/' . $datPost['id_admin']);
                 }
             }else{
                 $datPost['pw'] = $this->encryption->decrypt($datPost['old_pw']);
             }
             $datPost['pw'] = $this->encryption->encrypt($datPost['pw']);
             //update akun admin
             $cek = $this->model_admin->updateAdmin($datPost);
                if($cek == TRUE){
                    $this->session->set_flashdata('flash', 'Data Berhasil Di update ');
                        redirect('admin/data_admin');
                }else{
                    $this->session->set_flashdata('flash', 'Data Gagal Di update    ');
                    redirect('admin/update_admin/' . $datPost['id_admin']);
                }
        }else{
            redirect('admin/data_admin');
        }
    }
    public function delete_admin($id = '')
    {
        if($id != ''){
            /// delete admin
            $cek = $this->model_admin->deleteAdmin($id);
                if($cek == TRUE){
                    $this->session->set_flashdata('flash', 'Data Berhasil Di delete ');
                        redirect('admin/data_admin');
                }else{
                    $this->session->set_flashdata('flash', 'Data Gagal Di delete    ');
                    redirect('admin/update_admin/' . $datPost['id_admin']);
                }
        }else{
            redirect('admin/data_admin');
        }
    }
}
<?php

class Home extends CI_Controller {


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
                case '1':
                    break;
                case '2':
                    break;
                default :
                    redirect('login/login');
                    break;
            }
        }else{
            redirect('login/login');
        }
        $this->load->model('model_sekolah');
    }
    public function logOut()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('user_level');
        redirect('login');
    }
    private function getInfoSekolah()
    {
        $username = $this->session->userdata('username');
        $dataSekolah = $this->model_sekolah->getDataSekolah($username);
        return $dataSekolah;
    }
    public function index()
    {
        // get data sekolah
        $dataSekolah = $this->getInfoSekolah();
        // get info total guru dan siswa
        $total = $this->model_sekolah->getTotalGuruSiswa($dataSekolah['nisekolah']);
        $data = [
            'sekolah' => $dataSekolah,
            'tguru' => $total['tguru'],
            'tsiswa' => $total['tsiswa'],
            'login' => FALSE,
        ];
        // templates
        $this->load->view('templates/head');  
        $this->load->view('templates/navbar', $data);  
        // end templates
        $this->load->view('sekolah/info_sekolah', $data);  
        // templates
        $this->load->view('templates/footer');  
        $this->load->view('templates/script');  
        // end telplates
    }
    public function profile_siswa()
    {
        $nisekolah = $this->getInfoSekolah();
        // get all data siswa
        $siswa = $this->model_sekolah->getAllDataSiswaByNisekolah($nisekolah['nisekolah']);
        $data = [
            'siswa' => $siswa,
            'login' => FALSE,
        ] ;
        // templates
        $this->load->view('templates/head');  
        $this->load->view('templates/navbar', $data);  
        // end templates
        $this->load->view('sekolah/siswa/profile_siswa', $data);  
        // templates
        $this->load->view('templates/footer');  
        $this->load->view('templates/script');  
        // end telplates
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
            $this->load->view('templates/head');  
            $this->load->view('templates/navbar', $data);  
            // end templates
            $this->load->view('sekolah/siswa/info_siswa', $data);  
            // templates
            $this->load->view('templates/footer');  
            $this->load->view('templates/script');  
        }else{
            redirect('home/profile_siswa');
        }
        // end telplates
    }
    public function profile_guru()
    {
        ///// cek session
        $sessionCek = [
            'username' => $this->session->userdata('username'),
            'user_level' => $this->session->userdata('user_level')
        ];  
        if( $sessionCek['username']  != FALSE && isset($sessionCek['user_level'])){
			switch ($sessionCek['user_level']) {
                case '2':
                    # code...
                    break;
                
                default:
                    $this->session->set_flashdata('flash', 'Hanya Akun Guru Yang Bisa Akses');
                    redirect('home/index');
                    break;
            }
        }


        $nisekolah = $this->getInfoSekolah();
        // get all data guru
        $guru = $this->model_sekolah->getAllDataGuruByNisekolah($nisekolah['nisekolah']);
        $data = [
            'guru' => $guru,
            'login' => FALSE,
        ] ;
        // templates
        $this->load->view('templates/head');  
        $this->load->view('templates/navbar', $data);  
        // end templates
        $this->load->view('sekolah/guru/profile_guru', $data);  
        // templates
        $this->load->view('templates/footer');  
        $this->load->view('templates/script');  
        // end telplates
    }
    public function info_guru($nip = '')
    {
        ///// cek session
        $sessionCek = [
            'username' => $this->session->userdata('username'),
            'user_level' => $this->session->userdata('user_level')
        ];  
        if( $sessionCek['username']  != FALSE && isset($sessionCek['user_level'])){
			switch ($sessionCek['user_level']) {
                case '2':
                    # code...
                    break;
                
                default:
                
                    redirect('home/index');
                    break;
            }
        }

        if($nip != ''){
            //get data guru 
            $guru = $this->model_sekolah->getGuruByNIP($nip);
            $data = [
                'guru' => $guru,
                'login' => FALSE,
            ] ;
            // templates
            $this->load->view('templates/head');  
            $this->load->view('templates/navbar', $data);  
            // end templates
            $this->load->view('sekolah/guru/info_guru', $data);  
            // templates
            $this->load->view('templates/footer');  
            $this->load->view('templates/script');  
        }else{
            redirect('home/profile_guru ');
        }
    }
    public function info_kita()
    {
        //get info session
        $sessionCek = [
            'username' => $this->session->userdata('username'),
            'user_level' => $this->session->userdata('user_level')
        ];
        // cari session guru / siswa
        switch ($sessionCek['user_level']) {
            case '1':
                    //get nisn siswa by username
                    $nisn = $this->model_sekolah->getNISNByUsername($sessionCek['username']);
                    redirect('home/info_siswa/' . $nisn);
                    break;
                    case '2':
                    //get nisn guru by username
                    $nip = $this->model_sekolah->getNIPByUsername($sessionCek['username']);
                    redirect('home/info_guru/' . $nip);
                break;
        }
    }
    
}
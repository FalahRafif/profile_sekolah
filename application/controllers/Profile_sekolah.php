<?php

class Profile_sekolah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $sessionCek = [
            'username' => $this->session->userdata('username'),
            'user_level' => $this->session->userdata('user_level')
        ];        
        if( $sessionCek['username']  != FALSE && isset($sessionCek['user_level'])){
			switch ($sessionCek['user_level']) {
                case '3':
                    redirect('login/login');
                    break;
            }
        }
        $this->load->model('model_sekolah');
    }
    
    public function index()
    {
        $nisekolah = 121221;
        $datSekolah = $this->model_sekolah->getDataSekolahByNisekolah($nisekolah);
        // get info total guru dan siswa
        $total = $this->model_sekolah->getTotalGuruSiswa($nisekolah);
        //get data kepsek
        $datKepsek = $this->model_sekolah->getDataKepsekByNisekolah($nisekolah);
        $login = TRUE;
        //cek session 
        $sessionCek = [
            'username' => $this->session->userdata('username'),
            'user_level' => $this->session->userdata('user_level')
        ];  
        if( $sessionCek['username']  != FALSE && isset($sessionCek['user_level'])){
			$login = "";
        }
        
        $data = [
            'kepsek' => $datKepsek,
            'sekolah' => $datSekolah,
            'tguru' => $total['tguru'],
            'tsiswa' => $total['tsiswa'],
            'login' => $login,
        ] ;
        // templates
        $this->load->view('templates/head');  
        $this->load->view('templates/navbar', $data);  
        // end templates
        $this->load->view('sekolah/profile_sekolah', $data);  
        // templates
        $this->load->view('templates/footer');  
        $this->load->view('templates/script');  
        // end telplates
    }
}
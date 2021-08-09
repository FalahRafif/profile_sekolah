<?php

class Login extends CI_Controller {

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
                    redirect('Home');
                    break;
                case '2':
                    redirect('Home');
                    break;
                case '3':
                    redirect('Admin');
                    break;
            }
        }
        $this->load->model('model_login');
    }
    public function index()
    {
        $data = '';
        
        $this->load->view('login/login', $data);
    }
    public function login()
    {
        $button = $this->input->post('submit');
        if($button == TRUE){
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);
            //// cari data akun
            $cekUser = $this->model_login->getDataUser($username);
            if(isset($cekUser)){
                //// cek password sama atau tidak 
                if($password === $this->encryption->decrypt($cekUser['pw'])){
                    //get user level
                    $userLevel = $this->model_login->getUserLevel($cekUser['id_user_level']);
                    // set session
                    $sessionData = [
                        'username' => $cekUser['username'],
                        'user_level' => $userLevel
                    ];
                    $this->session->set_userdata($sessionData);
                    
                    redirect('home/index');
                }else{
                    $this->session->set_flashdata('flash', 'Username atau password salah');
                    redirect('login/index');
                }
            }else{
                $this->session->set_flashdata('flash', 'Username atau password salah');
                    redirect('login/index');
            }
        }else{
            redirect('login/index');
        }
    }
}
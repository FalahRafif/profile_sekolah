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
        $plain_text = 'This is a plain-text message!';
        $ciphertext = $this->encryption->encrypt($plain_text);

        // Outputs: This is a plain-text message!
        echo $this->encryption->decrypt($ciphertext);
        var_dump($ciphertext);

    }
    public function updating_data()
    {
        echo 'Updating data.....';
        //// get all data user
        $siswa = $this->model_login->getAllDataUser('siswa');
        $guru = $this->model_login->getAllDataUser('guru');
        $admin = $this->model_login->getAllDataUser('admin');
        // count all data
        $countData = $siswa[0] + $guru[0] + $admin[0];
        $countDataCek = $siswa[0] + $guru[0] + $admin[0];
        /// update password all akun
        // siswa 
        for ($i = $siswa[0] - 1; $i != -1; $i--) { 
            $siswa[1][$i]['pw'] = $this->encryption->encrypt($siswa[1][$i]['pw']);
            $countData = $countData - 1;
        }
        // guru
        for ($i = $guru[0] - 1; $i != -1; $i--) { 
            $guru[1][$i]['pw'] = $this->encryption->encrypt($guru[1][$i]['pw']);
            $countData = $countData - 1;
        }
        // admin
        for ($i = $admin[0] - 1; $i != -1; $i--) { 
            $admin[1][$i]['pw'] = $this->encryption->encrypt($admin[1][$i]['pw']);
            $countData = $countData - 1;
        }
        /// cek data error 
        if($countData != $countDataCek){
            $countDataError = $countData;
        }
        /// insert data
        $cek['siswa'] = $this->model_login->insertDatasNew($siswa, 'akun_siswa', 'id_akun_siswa');
        $cek['guru'] = $this->model_login->insertDatasNew($guru, 'akun_guru', 'id_akun_guru');
        $cek['admin'] = $this->model_login->insertDatasNew($admin, 'akun_admin', 'id_admin');
        /// result method 
        /// error while encryption 
        echo '
            <h1> Result Updating Data </h1>
            <hr>
            <h3>Error While Encryption :</h3>
            <p>' . $countDataError . ' <p>
            <h3>Error While Updating :</h3>
            <p> Siswa : ' . $cek['siswa'] . ' <p>
            <p> Guru : ' . $cek['guru'] . ' <p>
            <p> Admin : ' . $cek['admin'] . ' <p>
        ';
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
                if($password === $cekUser['pw']){
                    //get user level
                    $userLevel = $this->model_login->getUserLevel($cekUser['id_user_level']);
                    // set session
                    $sessionData = [
                        'username' => $cekUser['username'],
                        'password' => $cekUser['pw'],
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
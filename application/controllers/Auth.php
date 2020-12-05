<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index(){
		if($this->session->userdata('nik')){
            redirect('user');
        }
        
        $this->form_validation->set_rules('nik', 'Nik', 'trim|required',[
            'required' => "Masukkan NIK Anda",
        ]);

        $this->form_validation->set_rules('password', 'Password', 'trim|required',[
            'required' => "Masukkan Password Anda",
        ]);

        if($this->form_validation->run() == FALSE){
            $data['title']='Halaman Login';
            $this->load->view('auth/template/auth_header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('auth/template/auth_footer', $data);
        }else{
            $this->_login();
        }
    }
    
    public function _login(){
        $nik = $this->input->post('nik');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['nik' => $nik])->row_array();

        if($user){
            if($user['status'] == 1){
                if(password_verify($password, $user['password'])){
                    $data = [
                        'nik' => $user['nik'],
                        'id_role' => $user['id_role'],
                        'name' => $user['name']
                    ];
                    $this->session->set_userdata($data);
                    if($user['id_role'] == 1){
                        redirect('admin','refresh');
                    }else if($user['id_role'] == 6){
                        redirect('rt/verifikasi','refresh');
                    }else{
                        redirect('user','refresh');
                    }
                }else{
                    $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger" role="alert">
                        Password Anda Salah
                    </div>');
                    redirect('auth', 'refresh');
                }
            }
        }else{
            $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger" role="alert">
                        NIK Anda Belum Terdaftar
                    </div>');
                    redirect('auth', 'refresh');
        }
    }

    public function registration(){
        if ($this->session->userdata('nik')) {
            redirect('user');
        }
        
        $this->form_validation->set_rules('nik', 'Nik', 'trim|required',
            ['required' => 'nik tidak boleh kosong']
        );
        $this->form_validation->set_rules('name', 'Name', 'trim|required',
            ['required' => 'nama tidak boleh kosong']
        );
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tb_user.email]',
            ['is_unique' => 'Email sudah terdaftar',
            'required' => 'email tidak boleh kosong']
        );
        $this->form_validation->set_rules('nik', 'Nik', 'trim|required|is_unique[tb_user.nik]',
            ['is_unique' => 'Nik sudah terdaftar',
            'required' => 'nik tidak boleh kosong']
        );
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]',
            ['matches'	=> 'Password tidak sama',
            'min_length' => 'Password lemah', 
            'required' => 'password tidak boleh kosong']
        );
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $data['title']='User Registration';
            $this->load->view('auth/template/auth_header',$data);
            $this->load->view('auth/registration');
            $this->load->view('auth/template/auth_footer');
        } else{
            $email = $this->input->post('email',true); 
            $nik = $this->input->post('nik',true); 
            $data=[
                'nik'	=> htmlspecialchars($nik),
                'name'	=> htmlspecialchars($this->input->post('name',true)),
                'email'	=> htmlspecialchars($email),
                'gambar'	=> 'default.jpg',
                'password'	=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                'id_role'	=> 2,
                'status'	=> 1,
                'tanggal_dibuat' => time()
            ];

            // $pdk =$this->db->get_where('tb_pdk',['nik' => $nik])->row_array(); 
            // if ($pdk) {
            $this->db->insert('tb_user', $data);
            // } else{
            //     $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">maaf anda tidak dapat mendaftar </div>'); redirect('auth/registration');
            // }

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat Akun anda telah di buat , silahkan login </div>' );
        redirect('auth');

        }

    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('/');
    }

}

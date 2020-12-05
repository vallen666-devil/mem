<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('M_pengaduan');
        // $this->load->model('M_user');
        // $this->load->model('M_surat');
        // $this->load->model('M_berita');
    }

    public function index()
    {
        if ($this->session->userdata('nik')) {
            if ($this->session->userdata('nik')) {
                $data['title'] = 'tess';
                $data['user'] = $this->db->get_where('tb_user', [
                    'nik' => $this->session->userdata('nik')
                ])->row_array();

                $this->load->view('user/template/header', $data);
                $this->load->view('user/template/navbar', $data);
                $this->load->view('user/template/slider', $data);
                $this->load->view('user/index', $data);
                $this->load->view('user/template/footer', $data);
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Silahkan login atau daftar dahulu , sebelum menggunakan l ayanan silama ini</div>');
                redirect('user');
            }
        } else {
            $data['title'] = 'tess';
            $data['user'] = $this->db->get_where('tb_user', [
                'nik' => $this->session->userdata('nik')
            ])->row_array();

            $this->load->view('user/template/header', $data);
            $this->load->view('user/template/navbar', $data);
            $this->load->view('user/template/slider', $data);
            $this->load->view('user/index', $data);
            $this->load->view('user/template/footer', $data);
        }
    }

    // public function user()
    // {
    //     if ($this->session->userdata('nik')) {
    //         $data['title']= 'tess';
    //         $data['user']=$this->db->get_where('tb_user', [
    //         'nik'=> $this->session->userdata('nik')
    //         ])->row_array();

    //         $this->load->view('user/template/header', $data);
    //         $this->load->view('user/template/navbar', $data);
    //         $this->load->view('user/template/slider', $data);
    //         $this->load->view('user/index', $data);
    //         $this->load->view('user/template/footer', $data);
    //     } else {
    //         $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Silahkan login atau daftar dahulu , sebelum menggunakan l ayanan silama ini</div>');
    //         redirect('user');
    //     }
    // }

    public function myprofile()
    {
        if ($this->session->userdata('nik')) {
            $data['title'] = 'My Profile';
            $data['user'] = $this->db->get_where('tb_user', [
                'nik' => $this->session->userdata('nik')
            ])->row_array();

            $this->load->view('user/template/header', $data);
            $this->load->view('user/template/navbar', $data);
            $this->load->view('user/myprofile', $data);
            $this->load->view('user/template/footer', $data);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Silahkan login atau daftar dahulu , sebelum menggunakan layanan silama ini</div>');
            redirect('user');
        }
    }

    public function edit_profile()
    {
        if ($this->session->userdata('nik')) {
            $data['title'] = 'Edit Profile';
            $data['user'] = $this->db->get_where('tb_user', [
                'nik' => $this->session->userdata('nik')
            ])->row_array();

            $this->form_validation->set_rules('name', 'Name', 'trim|required', ['required' => 'nama tidak boleh kosong']);

            if ($this->form_validation->run() == false) {
                $this->load->view('user/template/header', $data);
                $this->load->view('user/template/navbar', $data);
                $this->load->view('user/editprofile', $data);
                $this->load->view('user/template/footer', $data);
            } else {
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                //cek jika ada gambar yg di upload
                $upload_image = $_FILES['gambar']['name'];

                if ($upload_image) {
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './assets/img/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('gambar')) {
                        $old_image = $data['user']['gambar'];
                        if ($old_image != 'default.jpg') {
                            unlink(FCPATH . 'assets/img/' . $old_image);
                        }
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('gambar', $new_image);
                    } else {
                        $this->session->set_flashdata('pesan', $this->upload->display_errors('', ''));
                        redirect('user/myprofile');
                    }
                }

                $this->db->set('name', $name);
                $this->db->where('email', $email);
                $this->db->update('tb_user');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Profil berhasil di ubah</div>');
                redirect('user/myprofile');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Silahkan login atau daftar dahulu , sebelum menggunakan l ayanan silama ini</div>');
            redirect('user');
        }
    }

    public function ganti_password()
    {
        if ($this->session->userdata('nik')) {
            $data['title'] = 'Ubah Password';
            $data['user'] = $this->db->get_where('tb_user', [
                'nik' => $this->session->userdata('nik')
            ])->row_array();

            $this->form_validation->set_rules('password_lama', 'Password_lama', 'trim|required');
            $this->form_validation->set_rules('password_baru1', 'Password_baru1', 'trim|required|min_length[3]|matches[password_baru2]');
            $this->form_validation->set_rules('password_baru2', 'Password_baru2', 'trim|required|min_length[3]|matches[password_baru1]');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('user/template/header', $data);
                $this->load->view('user/template/navbar', $data);
                $this->load->view('user/editprofile', $data);
                $this->load->view('user/template/footer', $data);
            } else {
                $password_lama = $this->input->post('password_lama');
                $password_baru = $this->input->post('password_baru1');

                if (!password_verify($password_lama, $data['user']['password'])) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">password lama salah</div>');
                    redirect('user/edit_profile');
                } else {
                    if ($password_lama == $password_baru) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password lama tidak boleh sama dengan password baru</div> ');
                        redirect('user/edit_profile');
                    } else {
                        $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
                        $this->db->set('password', $password_hash);
                        $this->db->where('nik', $this->session->userdata('nik'));
                        $this->db->update('tb_user');
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password berhasil di ganti</div>');
                        redirect('user/myprofile');
                    }
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Silahkan login atau daftar dahulu , sebelum menggunakan l ayanan silama ini</div>');
            redirect('user');
        }
    }
}

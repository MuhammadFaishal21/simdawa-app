<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PendaftaranModel');
    }

    public function index()
    {
        $data['title'] = "Data Beasiswa | SIMDAWA-APP";
    $data['pendaftaran'] = $this->PendaftaranModel->get_pendaftaran();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar');
    $this->load->view('pendaftaran/pendaftaran_read', $data);
    $this->load->view('template/footer');
    }

    public function daftar()
    {
        /*
        Proses daftar:
        - Jika tombol btn_daftar diklik
        - Cek no pendaftaran apakah sudah ada di sistem
        - Jika sudah ada, tampilkan pesan flash dan arahkan ulang ke halaman daftar
        - Jika tidak ada, lakukan proses upload bukti daftar
        - Jika upload berhasil, simpan data dan arahkan ulang ke halaman daftar
        - Jika upload gagal, tampilkan pesan flash dan arahkan ulang ke halaman daftar
        - Jika tombol btn_daftar tidak diklik, tampilkan form pendaftaran
        */

        if (isset($_POST['btn_daftar'])) {
            $cek_nopendaftaran = $this->PendaftaranModel->cek_nopendaftaran();

            if ($cek_nopendaftaran) {
                $this->session->set_flashdata('pesan', 'No Pendaftaran sudah terdaftar di sistem!');
                redirect('pendaftaran/daftar');
            } else {
                $upload = $this->PendaftaranModel->upload_bukti('bukti_daftar');

                if ($upload['result'] === 'success') {
                    $this->PendaftaranModel->insert_pendaftaran($upload);
                    redirect('pendaftaran/daftar');
                } else {
                    $this->session->set_flashdata('pesan', $upload['error']);
                    redirect('pendaftaran/daftar');
                }
            }
        } else {
            $data['title'] = "Pendaftaran Pengguna | SIMDAWA-APP";
            $this->load->view('pendaftaran/daftar_create', $data);
        }
    }
    public function verifikasi($keterangan, $id)
{
if (isset($id)) {
$status = ($keterangan == "acc") ? "Sudah Diverifikasi" : "Akun Dibatalkan";
$this->PendaftaranModel->verifikasi_akun($status, $id);
redirect('pendaftaran');
}
}
}

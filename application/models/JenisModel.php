<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisModel extends CI_Model
{
  private $tabel = 'jenis_beasiswa';

  public function get_jenis()
  {
    return $this->db->get($this->tabel)->result();
    // return $this->db->query('SELECT * FROM jenis_beasiswa')->result();
  }

  public function insert_jenis()
  {
    $data = [
      'nama_jenis' => $this->input->post('nama_jenis'),
      'keterangan' => $this->input->post('keterangan')
    ];

    $this->db->insert($this->tabel, $data);
    if ($this->db->affected_rows() > 0) { // cek proses perubahan data pada tabel, apabila lebih dari 0 maka berhasil
            $this->session->set_flashdata('pesan', "Data beasiswa berhasil ditambahkan!");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data beasiswa gagal ditambahkan!");
            $this->session->set_flashdata('status', false);
        }
  }

  public function get_jenis_byid($id)
  {
    return $this->db->get_where($this->tabel, ['id' => $id])->row();
  }

  public function update_jenis()
  {
    $data = [
      'nama_jenis' => $this->input->post('nama_jenis'),
      'keterangan' => $this->input->post('keterangan')
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update($this->tabel, $data);
     if ($this->db->affected_rows() > 0) { // cek proses perubahan data pada tabel, apabila lebih dari 0 maka berhasil
            $this->session->set_flashdata('pesan', "Data beasiswa berhasil diupdate!");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data beasiswa gagal diupdate!");
            $this->session->set_flashdata('status', false);
        }
  }
  public function delete_jenis($id)
  {
    $this->db->where('id', $id);
    $this->db->delete($this->tabel);
     if ($this->db->affected_rows() > 0) { // cek proses perubahan data pada tabel, apabila lebih dari 0 maka berhasil
            $this->session->set_flashdata('pesan', "Data beasiswa berhasil dihapus!");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data beasiswa gagal dihapus!");
            $this->session->set_flashdata('status', false);
        }
  }
}
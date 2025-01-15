<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProdiModel extends CI_Model
{
    private $table = 'prodi';

    // Mengambil semua data prodi
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    // Menambah data prodi
    public function insert_prodi()
    {
        $data = [
            'nama_prodi' => $this->input->post('nama_prodi')
        ];

        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() > 0) { // cek proses perubahan data pada tabel, apabila lebih dari 0 maka berhasil
            $this->session->set_flashdata('pesan', "Data beasiswa berhasil ditambahkan!");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data beasiswa gagal ditambahkan!");
            $this->session->set_flashdata('status', false);
        }
        
    }

    // Mengambil data prodi berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    // Mengubah data prodi
    public function update_prodi()
    {
        $data = [
            'nama_prodi' => $this->input->post('nama_prodi')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->table, $data);
             if ($this->db->affected_rows() > 0) { // cek proses perubahan data pada tabel, apabila lebih dari 0 maka berhasil
            $this->session->set_flashdata('pesan', "Data beasiswa berhasil diupdate!");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data beasiswa gagal diupdate!");
            $this->session->set_flashdata('status', false);
        }
    }
    

    // Menghapus data prodi
    public function delete_prodi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
         if ($this->db->affected_rows() > 0) { // cek proses perubahan data pada tabel, apabila lebih dari 0 maka berhasil
            $this->session->set_flashdata('pesan', "Data beasiswa berhasil dihapus!");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data beasiswa gagal dihapus!");
            $this->session->set_flashdata('status', false);
        }
    }
    
}

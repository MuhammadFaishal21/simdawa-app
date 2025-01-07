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
    }

    // Menghapus data prodi
    public function delete_prodi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
	public function get_all()
	{
		$this->db->select('s.*, l.lembaga AS lembaga_nama');
		$this->db->from('siswa s');
		$this->db->join('lembaga l', 's.lembaga = l.id', 'left');
		return $this->db->get()->result();
	}

	public function get_by_lembaga($lembaga_id)
	{
		$this->db->select('s.*, l.lembaga AS lembaga_nama');
		$this->db->from('siswa s');
		$this->db->join('lembaga l', 's.lembaga = l.id', 'left');
		$this->db->where('s.lembaga', $lembaga_id);
		return $this->db->get()->result();
	}

	public function insert($data)
	{
		return $this->db->insert('siswa', $data);
	}

	public function generateNIS()
	{
		$tahun = date('y');
		// Ambil NIS terakhir yang dimulai dengan tahun ini
		$this->db->like('nis', $tahun, 'after');
		$this->db->order_by('nis', 'DESC');
		$this->db->limit(1);
		$last = $this->db->get('siswa')->row();

		if ($last) {
			$lastNumber = (int)substr($last->nis, 2); // ambil urutan
			$newNumber = $lastNumber + 1;
		} else {
			$newNumber = 1;
		}

		// gabungkan tahun + urutan 3 digit
		return $tahun . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
	}

	public function update_by_nis($nis, $data)
	{
		$this->db->where('nis', $nis);
		return $this->db->update('siswa', $data);
	}

	public function get_by_nis($nis)
	{
		return $this->db->get_where('siswa', ['nis' => $nis])->row();
	}

	public function delete_by_nis($nis)
	{
		$this->db->where('nis', $nis);
		return $this->db->delete('siswa');
	}
}
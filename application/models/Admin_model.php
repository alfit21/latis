<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function get_all()
	{
		return $this->db->get('admin')->result();
	}

	public function get_by_id($id)
	{
		return $this->db->get_where('admin', ['id' => $id])->row();
	}

	public function insert($data)
	{
		return $this->db->insert('admin', $data);
	}

	public function update($id, $data)
	{
		return $this->db->where('id', $id)->update('admin', $data);
	}

	public function delete($id)
	{
		return $this->db->delete('admin', ['id' => $id]);
	}

	public function check_username_exists($username, $ignore_id = null)
	{
		$this->db->where('username', $username);
		if ($ignore_id != null) {
			$this->db->where('id !=', $ignore_id);
		}
		return $this->db->get('admin')->row();
	}
}
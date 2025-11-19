<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lembaga_model extends CI_Model
{
	public function get_all()
	{
		return $this->db->get('lembaga')->result();
	}

	public function get_by_id($id)
	{
		return $this->db->get_where('lembaga', ['id' => $id])->row();
	}
}
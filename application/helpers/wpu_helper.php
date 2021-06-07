<?php

	function is_logged_in()
	{
		$ci = get_instance();
		if(!$ci->session->userdata('email')) {
			redirect('auth');
		} else {
			$role_id 	= $ci->session->userdata('role_id');
			$menu 		= $ci->uri->segment(1);

			$queryMenu 	= $ci->db->get_where('user_menu', ['menu' => $menu]) ->row_array();
			$menu_id	= $queryMenu['id'];

			$userAccess	= $ci->db->get_where('user_access_menu', [
				'role_id' => $role_id,
				'menu_id' => $menu_id
			]);

			if($userAccess->num_rows() < 1) {
				redirect('auth/blocked');
			}
		}
	}

	function check_access($role_id, $menu_id)
	{
		$ci = get_instance();

		$ci->db->where('role_id', $role_id);
		$ci->db->where('menu_id', $menu_id);
		// $ci->db->get('user_access_menu');

		// $ci->db->get_where('user_access_menu', [
		// 		'role_id' => $role_id,
		// 		'menu_id' => $menu_id
		// 	]);

		$result = $ci->db->get('user_access_menu');

		if ($result->num_rows() > 0) {
			return "checked='checked'";
		}
	}

	function tanggalIndo($tanggal) {
		$bulans = [1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'];
		$tanggals = explode('-', $tanggal);

		return (int) $tanggals[2] . ' ' . $bulans[(int)$tanggals[1]] . ' ' . $tanggals[0];
	}


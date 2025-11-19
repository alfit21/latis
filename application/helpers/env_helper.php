<?php
if (!function_exists('env')) {
	function env($key, $default = null)
	{
		$env = @file_get_contents(FCPATH . '.env');
		if (!$env) return $default;

		$lines = explode("\n", $env);
		$data = [];
		foreach ($lines as $line) {
			$line = trim($line);
			if (!$line || strpos($line, '#') === 0) continue;
			$parts = explode('=', $line, 2);
			if (count($parts) == 2) {
				$data[trim($parts[0])] = trim($parts[1]);
			}
		}

		return isset($data[$key]) ? $data[$key] : $default;
	}
}
<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class HostnameController
{
	public function get()
	{

		/////////////////////////////////////////////////


		$command = Command::runSudo("ls -lah /home/liman");
		$files = explode("\n", $command);
		array_splice($files, 0, 1);
		
		foreach ($files as &$file) {
			$file = preg_replace('/\s+/', ' ', $file);
			$file = explode(" ", $file);
			$file = [
				"permissions" => $file[0],
				"user" => $file[2],
				"group" => $file[3],
				"size" => $file[4],
				"date" => $file[5] . " " . $file[6] . " " . $file[7],
				"name" => $file[8]
			];
		}
		
		return view("table", [
			"value" => $files,
			"title" => ["İsim", "İzinler", "Sahip", "Grup", "Dosya Boyutu", "Son Değiştirilme"],
			"display" => ["name", "permissions", "user", "group", "size", "date"]
		]);


		/////////////////////////////////////////////
		$output = Command::run('whoami');
		return respond($output, 200);
	}

	public function set()
	{
		validate([
			'hostname' => 'required|string'
		]);
	
		$status = (bool) Command::runSudo('hostnamectl set-hostname @{:hostname} 2>/dev/null 1>/dev/null && echo 1 || echo 0', [
			'hostname' => request('hostname')
		]);
	
		if ($status) {
			return respond(__('Hostname değiştirildi.'), 200);
		} else {
			return respond(__('Hostname değiştirilirken bir hata oluştu!'), 201);
		}
	}
}

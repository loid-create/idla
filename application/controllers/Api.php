<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters('', '');
		$this->load->helper('algo_helper');
		$this->KKD = [
			[
				"pasien" => 'P1',
				"penyakit" => 'Demodekosis',
				"avgKerja" => [0.42, 0.58]
			],
			[
				"pasien" => 'P2',
				"penyakit" => 'Demodekosis2',
				"avgKerja" => [0.42, 0.58]
			],
			[
				"pasien" => 'P3',
				"penyakit" => 'Demodekosis3',
				"avgKerja" => [0.42, 0.58]
			],
			[
				"pasien" => 'P4',
				"penyakit" => 'Demodekosis4',
				"avgKerja" => [0.42, 0.58]
			],
			[
				"pasien" => 'P5',
				"penyakit" => 'Demodekosis5',
				"avgKerja" => [0.42, 0.58]
			],
			[
				"pasien" => 'P6',
				"penyakit" => 'Demodekosis6',
				"avgKerja" => [0.42, 0.58]
			],
			[
				"pasien" => 'P7',
				"penyakit" => 'Demodekosis7',
				"avgKerja" => [0.42, 0.58]
			],
			[
				"pasien" => 'P8',
				"penyakit" => 'Demodekosis8',
				"avgKerja" => [0.42, 0.58]
			],
			[
				"pasien" => 'P9',
				"penyakit" => 'Demodekosis9',
				"avgKerja" => [0.42, 0.58]
			],
			[
				"pasien" => 'P10',
				"penyakit" => 'Demodekosis10',
				"avgKerja" => [0.42, 0.58]
			],
			[
				"pasien" => 'P11',
				"penyakit" => 'Demodekosis11',
				"avgKerja" => [0.42, 0.58]
			],
			[
				"pasien" => 'P12',
				"penyakit" => 'Demodekosis12',
				"avgKerja" => [0.42, 0.58]
			],
			[
				"pasien" => 'P13',
				"penyakit" => 'Demodekosis13',
				"avgKerja" => [0.42, 0.58]
			],
			[
				"pasien" => 'P14',
				"penyakit" => 'Demodekosis14',
				"avgKerja" => [0.42, 0.58]
			],
			[
				"pasien" => 'P15',
				"penyakit" => 'Demodekosis15',
				"avgKerja" => [0.42, 0.58]
			],
			[
				"pasien" => 'P16',
				"penyakit" => 'Demodekosis16',
				"avgKerja" => [0.42, 0.58]
			]
		];
		$this->dokter = ['dokter1', 'dokter2'];
		$this->hari = 6;
	}

	public function index()
	{
		$response['success'] = 1;
		$response['meta'] = ["message" => "ini message"];
		$response['data'] = $this->getUserByToken();

		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function daftar()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email telah terdaftar !'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
			'matches' => 'Password tidak sama !',
			'min_length' => 'Password minimal 4 digit!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$response['success'] = 0;
			$response['meta'] = ["message" => validation_errors()];
			$response['data'] = [];
		} else {
			$user = $this->authen->register();
			$response['success'] = 1;
			$response['meta'] = ["message" => "Kamu berhasil membuat akun, silahkan login!"];
			$response['data'] = $user;
		}
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function masuk()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$response['success'] = 0;
			$response['meta'] = ["message" => validation_errors()];
			$response['data'] = [];
		} else {
			//validasi success
			$response = $this->_login();
		}
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}

	private function generateToken($user)
	{
		$ciphering = "AES-128-CTR";
		$iv_length = openssl_cipher_iv_length($ciphering);
		$options = 0;

		// Non-NULL Initialization Vector for encryption 
		$encryption_iv = '1234567891011121';

		// Store the encryption key 
		$encryption_key = "eldoraKey";

		$jwt = json_encode((object)$user);

		// Use openssl_encrypt() function to encrypt the data 
		$encryption = openssl_encrypt(
			$jwt,
			$ciphering,
			$encryption_key,
			$options,
			$encryption_iv
		);
		return $encryption;
	}

	private function getUserByToken()
	{
		$header = getallheaders();
		if (!isset($header['Authorization'])) {
			throw new Exception("Error Token Is Required!");
		}
		$dataToken = $header['Authorization'];

		$token = explode(' ', $dataToken)[1];
		$ciphering = "AES-128-CTR";
		$iv_length = openssl_cipher_iv_length($ciphering);
		$options = 0;

		// Non-NULL Initialization Vector for encryption 
		$decryption_iv = '1234567891011121';

		// Store the encryption key 
		$decryption_key = "eldoraKey";

		$decryption = openssl_decrypt(
			$token,
			$ciphering,
			$decryption_key,
			$options,
			$decryption_iv
		);

		$decryption = json_decode($decryption);

		return $decryption;
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');


		$masuk = $this->authen->getUser($email);
		if ($masuk) {
			//cek aktif
			if ($masuk['is_active'] == 1) {
				//cek password
				if (password_verify($password, $masuk['password'])) {
					$data = [
						'email' => $masuk['email'],
						'role_id' => $masuk['role_id']
					];
					//session
					$this->session->set_userdata($data);
					$masuk['token'] = $this->generateToken($masuk);
					//login berdasarkan role
					if ($masuk['role_id'] == 1) {
						$response['success'] = 1;
						$response['meta'] = ["message" => 'Login success'];
						$masuk['role'] = "admin";
					} elseif ($masuk['role_id'] == 2) {
						$response['success'] = 1;
						$response['meta'] = ["message" => 'Login success'];
						$masuk['role'] = "member";
					} else {
						$response['success'] = 1;
						$response['meta'] = ["message" => 'Login success'];
						$masuk['role'] = "dokter";
					}

					$response['data'] = $masuk;
				} else {
					$response['success'] = 0;
					$response['meta'] = ["message" => 'Password Salah!'];
					$response['data'] = [];
				}
			} else {
				//akun tidak aktif
				$response['success'] = 0;
				$response['meta'] = ["message" => 'Akun ini tidak aktif!'];
				$response['data'] = [];
			}
		} else {
			//akun tidak terdaftar
			$response['success'] = 0;
			$response['meta'] = ["message" => 'Akun belum terdaftar!'];
			$response['data'] = [];
		}
		return $response;
	}


	public function my_profile()
	{
		$user = $this->getUserByToken();
		$ambil = $this->db->get_where('user', ['email' => $user->email])->row_array();

		$response['success'] = 1;
		$response['meta'] = ["message" => "Get informasi akun kamu berhasil."];
		$response['data'] = $ambil;

		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function edit_profile()
	{
		$user = $this->getUserByToken();
		$ambil = $this->db->get_where('user', ['email' => $user->email])->row_array();

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'No Telp', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('kota', 'kota', 'trim|required');

		if ($this->form_validation->run() == false) {
			$response['success'] = 0;
			$response['meta'] = ["message" => validation_errors()];
			$response['data'] = [];
		} else {
			$ambil = $this->authen->editMemberApi($user);
			$response['success'] = 1;
			$response['meta'] = ["message" => "Informasi akun kamu telah diubah."];
			$response['data'] = $ambil;
		}
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}


	public function janji()
	{
		$user = $this->getUserByToken();
		$ambil = $this->db->get_where('janji_temu', ['userId' => $user->id])->row_array();

		$response['success'] = 1;
		$response['meta'] = ["message" => "janji temu get success"];
		$response['data'] = $ambil;

		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}


	public function ajukan()
	{
		$user = $this->getUserByToken();
		$ambil = $this->authen->tambahJanji($user->id);

		if ($ambil) {
			$response['success'] = 1;
			$response['meta'] = ["message" => "janji temu created success"];
			$response['data'] = $ambil;
			$httpCode = 200;
		} else {
			$response['success'] = 0;
			$response['meta'] = ["message" => "janji temu sudah di booking"];
			$response['data'] = [];
			$httpCode = 400;
		}
		$this->output->set_status_header($httpCode)->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function edit_janji()
	{
		//POST url = /Api/edit_janji/:id
		$user = $this->getUserByToken();
		$ambil = $this->authen->editJanji($user->id);

		if ($ambil) {
			$response['success'] = 1;
			$response['meta'] = ["message" => "janji temu updated success"];
			$response['data'] = $ambil;
			$httpCode = 200;
		} else {
			$response['success'] = 0;
			$response['meta'] = ["message" => "janji temu sudah di booking"];
			$response['data'] = [];
			$httpCode = 400;
		}

		$this->output->set_status_header($httpCode)->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function delete_janji()
	{
		// GET url= /Api/delete_janji/:id
		$user = $this->getUserByToken();
		$ambil = $this->authen->deleteJanji();

		$response['success'] = 1;
		$response['meta'] = ["message" => "janji temu deleted success"];
		$response['data'] = $ambil;

		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}

	function generateAlgorima($test = 0)
	{
		$hasil = generatePemesanan($this->KKD, $this->dokter, $this->hari, $test);
		$individu = generateIndividu($hasil, $this->dokter, $this->hari);
		$fitnesIndividu = calculateFitness($individu);
		$selectedParent = selectParent($fitnesIndividu);
		$firstCrossover = generateFirstCrossover($selectedParent);
		$secondCrossover = generateSecondCrossover($selectedParent, $firstCrossover->crossReal);
		$mutasi =  generateMutasi($selectedParent);
		$bestFitCrossover = calculateBestCross([$firstCrossover->childA, $firstCrossover->childB], $secondCrossover);
		$bestFitMutasi = calculateBestMutasi($mutasi);
		$minute = transformToMinute($bestFitCrossover['id'], $bestFitMutasi['id'], $fitnesIndividu);
		$allResult = [
			"dataAwal" => $this->KKD,
			"pemesanan" => $hasil,
			"allIndividu" => $individu,
			"fitnesIndividu" => $fitnesIndividu,
			"selectedParent" => $selectedParent,
			"firstCrossover" => $firstCrossover,
			"secondCrossover" => $secondCrossover,
			"mutasi" => $mutasi,
			"bestFitCrossover" => $bestFitCrossover,
			"bestFitMutasi" => $bestFitMutasi,
			"result" => $minute
		];

		return (object)[
			"minute" => $minute,
			"all" => $allResult
		];
	}

	public function algo_run()
	{
		$algo = $this->generateAlgorima();
		$response['success'] = 1;
		$response['meta'] = ["message" => "get algoritma success"];
		$response['data'] = $algo->minute;
		if ($this->input->get("type") === "all") {
			$response['data'] = $algo->all;
		}
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function get_jadwal()
	{
		//GET /Api/get_jadwal/:id?date=2020-08-14
		//id merupakan id dokter
		$date = $this->input->get("date");
		$dokterId = $this->uri->segment(3);
		if (!$this->input->get("date")) {
			$date = date("Y-m-d");
		}
		$algo = $this->generateAlgorima();
		$totalMinute = 8 * 60;
		$avgTime = $algo->minute->avgCeil;
		$splitTo = $totalMinute / $avgTime;
		$modSplit = $totalMinute % $avgTime;

		if ($modSplit > 0) {
			$splitTo = ($totalMinute - $modSplit) / $avgTime;
		}

		$checkDate = $this->authen->checkJadwal($date);
		$jadwalToSave = [];
		if (!$checkDate) {
			$dokters = $this->authen->getDokter();
			foreach ($dokters as $keyDokter => $dokter) {
				$startTime = "09:00:00";
				for ($i = 0; $i < $splitTo; $i++) {
					$endTime = strtotime("+$avgTime minutes", strtotime($startTime));
					$jadwalToSave[] = [
						"dokterId" => $dokter->id,
						"durasi" => $avgTime,
						"date" => $date,
						"startAt" => $startTime,
						"endAt" => date('H:i:s', $endTime),
					];
					$startTime = date('H:i:s', $endTime);
				}
			}
			if (count($jadwalToSave)) {
				$this->authen->tambahJadwal($jadwalToSave);
			}
		}

		$jadwal = $this->authen->getJadwal($dokterId, $date);

		$response['success'] = 1;
		$response['meta'] = ["message" => "get jadwal success"];
		$response['data'] = $jadwal;
		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
	}
}

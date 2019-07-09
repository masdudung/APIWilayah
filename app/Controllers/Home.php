<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\WilayahModel;

class Home extends BaseController
{
	private $wilayah;

	public function __construct()
	{
		/**
		 * Setting header json & load model
		 */

		header('Content-Type: application/json');
		$this->wilayah = new WilayahModel();
	}

	public function index()
	{
		/**
		 * Mengambil semua data propinsi
		 * 
		 */

		$data['propinsi'] = $this->wilayah->getPropinsi();
		if($data['propinsi'])
		{
			$this->message(false, 'Propinsi', $data['propinsi']);
		}
		$this->message(true, 'something error');
	}

	public function kabupaten($idPropinsi)
	{
		/**
		 * Mengambil semua data kabupaten di sebuah propinsi
		 * 
		 */
		
		$data['kabupaten'] = $this->wilayah->getKabupaten($idPropinsi);
		if($data['kabupaten'])
		{
			$this->message(false, 'Kabupaten', $data['kabupaten']);
		}
		$this->message(true, 'something error');
	}

	public function kecamatan($idKabupaten)
	{
		/**
		 * Mengambil semua data kecamatan di sebuah kabupaten
		 * 
		 */

		$data['kecamatan'] = $this->wilayah->getKecamatan($idKabupaten);
		if($data['kecamatan'])
		{
			$this->message(false, 'Kecamatan', $data['kecamatan']);
		}
		$this->message(true, 'something error');
	}

	public function desa($idKecamatan)
	{
		/**
		 * Mengambil semua data desa di sebuah kecamatan
		 * 
		 */

		$data['desa'] = $this->wilayah->getDesa($idKecamatan);
		if($data['desa'])
		{
			$this->message(false, 'Desa', $data['desa']);
		}
		$this->message(true, 'something error');
	}

	public function message($error=true, $message="", $data=NULL)
	{
		/**
		 * Menampilkan data dengan format json
		 *
		 */

		$message = array(
			'error' => $error,
			'message' => $message,
			'data' => $data
		);
		echo json_encode($message);
		exit;
	}

	//--------------------------------------------------------------------

}

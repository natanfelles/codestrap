<?php
/**
 * Codestrap
 *
 * @package    Codestrap
 * @author     Natan Felles
 * @link       https://github.com/natanfelles/codestrap
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Upload
 * Simple single file upload
 */
class Upload extends CI_Controller {

	/**
	 * @var string $allowed_types Allowed file types to upload
	 */
	protected $allowed_types = 'gif|jpg|png|flv|mp3|mp4';


	/**
	 * Loads the necessary librarys
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
	}


	/**
	 * Loads the page and do necessary verifications
	 */
	public function index()
	{
		if ($this->input->post())
		{
			$data = $this->uploader();
		}

		$data['allowed_types'] = str_replace('|', ', ', $this->allowed_types);

		$data['title'] = 'Upload';
		$data['page'] = 'upload';
		$this->load->view('view', $data);
	}


	/**
	 * Executes the uploading process
	 *
	 * @return array Returns error or success
	 */
	protected function uploader()
	{
		$validation = array();

		$config['upload_path'] = APPPATH . 'tmp';
		$config['allowed_types'] = $this->allowed_types;

		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('upload'))
		{
			$validation['error'] = $this->upload->display_errors();
		}
		else
		{
			$this->upload->data();
			$validation['success'] = TRUE;
		}

		return $validation;
	}

}
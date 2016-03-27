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
 * Class Email
 * Send email interaction code example
 */
class Email extends CI_Controller {

	/**
	 * Loads necessary librarys
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->library('email');
	}


	/**
	 * Determines what needs to happen
	 */
	public function index()
	{
		$data = $this->input->post();

		if ($data)
		{
			$data['validation'] = $this->validation($data);
			if ($data['validation']['status'] == TRUE)
			{
				$this->sendmail($data);
			}
		}

		// Config and Load view
		$data['title'] = 'Email';
		$data['page'] = 'email';
		$this->load->view('view', $data);
	}


	/**
	 * @param array $data Email input data
	 */
	protected function sendmail($data = array())
	{
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$this->email->initialize($config);

		$this->email->from($data['from_email'], $data['from_name']);
		$this->email->to($data['to_email']);
		// Todo: Continues it later!
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');

		$this->email->subject($data['subject']);
		$this->email->message($data['message']);

		$this->email->send();
	}


	/**
	 * @param array $data All inputs
	 * @return mixed Validation status and error
	 */
	protected function validation($data = array())
	{
		$this->form_validation->set_rules('from_name', 'Your Name', 'required|min_length[2]|max_length[255]|alpha');
		$this->form_validation->set_rules('from_email', 'Your Email', 'required|valid_email');
		$this->form_validation->set_rules('to_name', 'Recipient Name', 'required|min_length[2]|max_length[255]|alpha');
		$this->form_validation->set_rules('to_email', 'Recipient Email', 'required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'required|min_length[2]|max_length[255]');
		$this->form_validation->set_rules('message', 'Message', 'required|min_length[2]|max_length[255]');

		$validation['status'] = $this->form_validation->run();

		/*
		Todo: Continues it later!

		if ($validation['status'] == TRUE)
		{
			$validation['status'] = TRUE;

			if ( ! empty($this->input->post('attachment')))
			{
				$config['upload_path'] = APPPATH . 'assets';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = 10000;
				//$config['remove_spaces'] = TRUE;

				$this->upload->initialize($config);

				if (!$this->upload->do_upload($data['attachment']))
				{
					$validation['error'] = $this->upload->display_errors();

					$validation['status'] = FALSE;
				}
				else
				{
					$this->upload->data();

					$validation['status'] = TRUE;
				}
			}
		}

		*/

		return $validation;
	}

}
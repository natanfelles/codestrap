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
			$data['success'] = $this->validation();
			if ($data['success'] == TRUE)
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
	 * Send emails
	 *
	 * @param array $data Email input data
	 */
	protected function sendmail($data = array())
	{
		$config['charset'] = 'utf-8';
		$config['mailtype'] = $data['mailtype'];
		$this->email->initialize($config);

		$this->email->from($data['from_email'], $data['from_name']);
		$this->email->to($data['to_email']);

		if (isset($data['cc_email']))
		{
			$this->email->cc($data['cc_email']);
		}

		$this->email->subject($data['subject']);
		$this->email->message($data['message']);

		$this->email->attach($_FILES['attachment']['tmp_name'], 'attachment', $_FILES['attachment']['name']);

		$this->email->send();
	}


	/**
	 * Validate form inputs
	 *
	 * @return mixed Validation status and error
	 */
	protected function validation()
	{
		$this->form_validation->set_rules('from_name', 'Your Name', 'trim|required|min_length[2]|max_length[255]|alpha_numeric_spaces');
		$this->form_validation->set_rules('from_email', 'Your Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('to_email', 'Recipient Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('cc_email', 'Recipient CC Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'required|min_length[2]|max_length[255]');
		$this->form_validation->set_rules('mailtype', 'Mail Type', 'required|in_list[text,html]');
		$this->form_validation->set_rules('message', 'Message', 'required|min_length[2]|max_length[255]');

		if ($this->form_validation->run() == FALSE)
		{
			$validation = FALSE;
		}
		else
		{
			$validation = TRUE;
		}

		return $validation;
	}

}
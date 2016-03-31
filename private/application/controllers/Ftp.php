<?php
/**
 * Codestrap
 *
 * @package    Codestrap
 * @author     Natan Felles
 * @link       https://github.com/natanfelles/codestrap
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Ftp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('ftp');
		$this->load->library('session');
	}


	public function index()
	{
		if ($this->input->post('logout'))
		{
			$this->logout();
		}
		// Config and Load view
		$data['title'] = 'FTP';
		if ( ! $this->session->userdata('ftp'))
		{
			$this->login();
		}
		else
		{
			$this->list_files();
		}
	}


	protected function login()
	{
		if ($this->input->post('login'))
		{
			$data = $this->input->post();
		}

		if (isset($data))
		{
			$config['hostname'] = $data['hostname'];
			$config['username'] = $data['username'];
			$config['password'] = $data['password'];
			$config['debug'] = TRUE;

			if ($this->ftp->connect($config))
			{
				$this->session->set_userdata('ftp', $config);
			}
		}

		if ($this->session->userdata('ftp'))
		{
			header('Location: ' . site_url('ftp'));
		}
		$data['title'] = 'FTP';
		$data['page'] = 'ftp/login';
		$this->load->view('view', $data);


	}


	protected function list_files()
	{
		$data = $this->session->userdata('ftp');

		$this->ftp->connect($data);

		if ($this->input->post('location'))
		{
			if ($this->ftp->changedir($this->input->post('location')) == TRUE)
			{
				$data['location'] = $this->input->post('location');
				$this->session->set_userdata('ftp_path', $data['location']);
			}
		}
		else
		{
			if ( ! $this->session->userdata('ftp_path'))
			{
				$data['location'] = '/';
			}
		}
		$data['location'] = $this->session->userdata('ftp_path');

		$data['list'] = $this->ftp->list_files($this->session->userdata('ftp_path'));

		$data['title'] = 'FTP';
		$data['page'] = 'ftp/list';
		$this->load->view('view', $data);
	}


	protected function logout()
	{
		$this->ftp->close();
		$this->session->unset_userdata(('ftp'));
		header('Location: ' . site_url('ftp'));
	}
}
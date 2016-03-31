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


	public function upload()
	{
		if ( ! $this->session->userdata('ftp'))
		{
			header('Location: ' . site_url('ftp'));
		}

		if ($_FILES)
		{
			$data = $this->session->userdata('ftp');
			$this->ftp->connect($data);

			if (@$this->ftp->upload($_FILES['file']['tmp_name'], $this->session->userdata('ftp_path') . '/' . $_FILES['file']['name']))
			{
				$data['success'] = TRUE;
			}
			else
			{
				$data['error'] = TRUE;
			}
		}

		$data['title'] = 'FTP';
		$data['page'] = 'ftp/upload';
		$this->load->view('view', $data);
	}


	public function download()
	{
		if ( ! $this->session->userdata('ftp'))
		{
			header('Location: ' . site_url('ftp'));
		}

		if ($this->input->post())
		{
			$data = $this->session->userdata('ftp');
			$this->ftp->connect($data);

			$file = explode('/', $this->input->post('file'));
			$file = end($file);

			if ($this->ftp->download($this->input->post('file'), APPPATH . 'tmp/' . $file))
			{
				$data['success'] = TRUE;
				$this->load->helper('download');
				force_download(APPPATH . 'tmp/' . $file, NULL);
			}
			else
			{
				$data['error'] = TRUE;
			}
		}

		$data['title'] = 'FTP';
		$data['page'] = 'ftp/download';
		$this->load->view('view', $data);
	}


	public function move()
	{
		if ( ! $this->session->userdata('ftp'))
		{
			header('Location: ' . site_url('ftp'));
		}

		if ($this->input->post())
		{
			$data = $this->session->userdata('ftp');
			$this->ftp->connect($data);

			if ($this->ftp->move($this->input->post('path'), $this->input->post('new_path')))
			{
				$data['success'] = TRUE;
			}
			else
			{
				$data['error'] = TRUE;
			}
		}

		$data['title'] = 'FTP';
		$data['page'] = 'ftp/move';
		$this->load->view('view', $data);
	}


	public function delete()
	{
		if ( ! $this->session->userdata('ftp'))
		{
			header('Location: ' . site_url('ftp'));
		}

		if ($this->input->post())
		{
			$data = $this->session->userdata('ftp');
			$this->ftp->connect($data);

			if ($this->ftp->delete_file($this->input->post('file')))
			{
				$data['success'] = TRUE;
			}
			else
			{
				$data['error'] = TRUE;
			}
		}

		$data['title'] = 'FTP';
		$data['page'] = 'ftp/delete';
		$this->load->view('view', $data);
	}


	protected function logout()
	{
		$this->ftp->close();
		$this->session->unset_userdata(('ftp'));
		header('Location: ' . site_url('ftp'));
	}
}
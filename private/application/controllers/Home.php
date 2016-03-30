<?php
/**
 * Codestrap
 *
 * @package    Codestrap
 * @author     Natan Felles
 * @link       https://github.com/natanfelles/codestrap
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('file');
	}


	public function index()
	{
		$data['error'] = $this->check();

		// Config and Load view
		$data['title'] = 'Home';
		$data['page'] = 'home';
		$this->load->view('view', $data);
	}


	protected function check()
	{
		$error = NULL;

		// Check file permissions
		$path['tmp'] = APPPATH . 'tmp';
		$path['cache'] = ! empty($this->config->config['cache_path']) ? $this->config->config['cache_path'] : APPPATH . 'cache';
		$path['log'] = ! empty($this->config->config['log_path']) ? $this->config->config['log_path'] : APPPATH . 'logs';
		$path['session'] = ! empty($this->config->config['sess_save_path']) ? $this->config->config['sess_save_path'] : APPPATH . 'session';

		foreach ($path as $item)
		{
			octal_permissions(fileperms($item)) == 777 ? : $error[] = 'The file permissions in <strong>' . $item . '</strong> is not <strong>777</strong>';
		}

		return $error;
	}

}
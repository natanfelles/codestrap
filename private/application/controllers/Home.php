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
		$this->load->helper('file');
		$tmp_path = APPPATH . 'tmp';
		$cache_path = ! empty($this->config->config['cache_path']) ? $this->config->config['cache_path'] : APPPATH . 'cache';
		$log_path = ! empty($this->config->config['log_path']) ? $this->config->config['log_path'] : APPPATH . 'logs';
		$session_path = ! empty($this->config->config['sess_save_path']) ? $this->config->config['sess_save_path'] : APPPATH . 'session';
		octal_permissions(fileperms($tmp_path)) == 777 ? : $error[] = 'The file permissions in <strong>' . $tmp_path . '</strong> is not <strong>777</strong>';
		octal_permissions(fileperms($cache_path)) == 777 ? : $error[] = 'The file permissions in <strong>' . $cache_path . '</strong> is not <strong>777</strong>';
		octal_permissions(fileperms($log_path)) == 777 ? : $error[] = 'The file permissions in <strong>' . $log_path . '</strong> is not <strong>777</strong>';
		octal_permissions(fileperms($session_path)) == 777 ? : $error[] = 'The file permissions in <strong>' . $session_path . '</strong> is not <strong>777</strong>';

		return $error;
	}

}
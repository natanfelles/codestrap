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
		$data['message'] = 'Hello, world!';
		$data['notice'] = 'Everything is working fine.';

		// Config and Load view
		$data['title'] = 'Home';
		$data['page'] = 'home';
		$this->load->view('view', $data);
	}

}
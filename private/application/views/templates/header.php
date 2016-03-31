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
 * @var string $page
 */
?>
<header class="row">
	<div class="col-md-2 text-left" id="logo">
		<a href="https://github.com/natanfelles/codestrap" target="_blank">
			<img src="<?=base_url('assets/img/logo.png')?>" alt="Codestrap">
		</a>
	</div>
	<div class="col-md-10">
		<ul class="nav nav-pills">
			<li role="presentation" <?=$this->uri->segment(1) == '' ? 'class="active"' : ''?>>
				<a href="<?=site_url()?>">Home</a>
			</li>
			<li role="presentation" <?=$this->uri->segment(1) == 'email' ? 'class="active"' : ''?>>
				<a href="<?=site_url('email')?>">Email</a>
			</li>
			<li role="presentation" <?=$this->uri->segment(1) == 'upload' ? 'class="active"' : ''?>>
				<a href="<?=site_url('upload')?>">Upload</a>
			</li>
			<li role="presentation" <?=$this->uri->segment(1) == 'ftp' ? 'class="active"' : ''?>>
				<a href="<?=site_url('ftp')?>">FTP</a>
			</li>
		</ul>
	</div>
</header>

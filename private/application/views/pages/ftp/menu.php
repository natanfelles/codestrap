<?php
/**
 * Codestrap
 *
 * @package    Codestrap
 * @author     Natan Felles
 * @link       https://github.com/natanfelles/codestrap
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6 text-left">
				<a href="<?=site_url('ftp');?>" class="btn btn-default">
					<i class="glyphicon glyphicon-list"></i> List
				</a>
				<a href="<?=site_url('ftp/upload');?>" class="btn btn-default">
					<i class="glyphicon glyphicon-upload"></i> Upload
				</a>
				<a href="<?=site_url('ftp/download');?>" class="btn btn-default">
					<i class="glyphicon glyphicon-download"></i> Download
				</a>
				<a href="<?=site_url('ftp/move');?>" class="btn btn-default">
					<i class="glyphicon glyphicon-move"></i> Move
				</a>
				<a href="<?=site_url('ftp/delete');?>" class="btn btn-default">
					<i class="glyphicon glyphicon-trash"></i> Delete File
				</a>
			</div>
			<div class="col-md-6 text-right">
				<form action="" method="post">
					<button type="submit" class="btn btn-danger" value="logout">
						<i class="glyphicon glyphicon-remove-sign"></i> Logout
					</button>
					<input type="hidden" name="logout" value="1" style="display: none">
				</form>
			</div>
		</div>
	</div>
</div>

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
	<form action="" method="post">
		<div class="panel panel-default">
			<div class="panel-heading">Login</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="hostname">Hostname</label>
					<input type="text" name="hostname" id="hostname" class="form-control">
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control">
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body text-right">
				<button type="reset" class="btn btn-danger">
					<i class="glyphicon glyphicon-remove-sign"></i> Reset
				</button>
				<button type="submit" class="btn btn-success">
					<i class="glyphicon glyphicon-ok-sign"></i> Login
				</button>
				<input type="hidden" name="login" value="1" style="display: none">
			</div>
		</div>
	</form>
</div>

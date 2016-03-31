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
<div class="panel panel-default">
	<div class="panel-heading">
		Logged in as <strong><?="{$username}@{$hostname}";?></strong>
	</div>
	<div class="panel-body">
		<form action="" method="post" class="form-horizontal">
			<div class="input-group">
				<input type="text" name="location" class="form-control" placeholder="Enter a location" value="<?=isset($location) ? $location : '';?>">
				<span class="input-group-btn">
					<button class="btn btn-default" type="submit">Go!</button>
				</span>
			</div>

		</form>
	</div>

	<table class="table">
		<?php foreach ($list as $item): ?>
			<tr>
				<td><?=$item;?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<div class="panel panel-default">
	<div class="panel-body text-right">
		<form action="" method="post">
			<button type="submit" class="btn btn-danger" value="logout">
				<i class="glyphicon glyphicon-remove-sign"></i> Logout
			</button>
			<input type="hidden" name="logout" value="1" style="display: none">
		</form>
	</div>
</div>

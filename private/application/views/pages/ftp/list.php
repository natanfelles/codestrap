<?php
/**
 * Codestrap
 *
 * @package    Codestrap
 * @author     Natan Felles
 * @link       https://github.com/natanfelles/codestrap
 */
defined('BASEPATH') OR exit('No direct script access allowed');
include 'menu.php';
?>
<div class="col-md-12">
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
		<table class="table table-hover">
			<?php foreach ($list as $item): ?>
				<tr>
					<td><?=$item;?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>

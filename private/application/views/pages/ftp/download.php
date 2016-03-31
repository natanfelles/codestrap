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
	<?php if (isset($success)): ?>
		<div class="col-md-12 alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>Yeah!</strong> Your file has ben downloaded.
		</div>
	<?php elseif (isset($error)): ?>
		<div class="col-md-12 alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>Ops!</strong> Your file can not be downloaded.
		</div>
	<?php endif; ?>
</div>
<div class="col-md-12">
	<form action="" method="post" enctype="multipart/form-data" accept-charset="utf-8">
		<div class="panel panel-default">
			<div class="panel-heading">Download</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="file">File</label>
					<input type="text" name="file" id="file" class="form-control"  placeholder="Enter the filepath">
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body text-right">
				<button type="submit" class="btn btn-success">
					<i class="glyphicon glyphicon-ok-sign"></i> Download
				</button>
			</div>
		</div>
	</form>
</div>

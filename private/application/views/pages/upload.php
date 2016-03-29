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
<?php if (isset($error)): ?>
	<div class="col-md-12 alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<ul>
			<?=isset($error) ? "<li>{$error}</li>" : '';?>
		</ul>
	</div>
<?php elseif (isset($success)): ?>
	<div class="col-md-12 alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>Yeah!</strong> Your file has ben uploaded.
	</div>
<?php else: ?>
	<div class="col-md-12 alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<ul>
			<li>The maximum upload file size allowed by PHP is <strong><?=ini_get("upload_max_filesize");?></strong>.</li>
			<li>The file extensions allowed are: <strong><?=$allowed_types;?></strong>.</li>
		</ul>
	</div>
<?php endif; ?>
<form action="" method="post" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Select your file</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="upload" class="col-md-2 control-label">File</label>
					<input type="file" name="upload" id="upload">
					<input type="hidden" name="hidden" style="display: none">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body text-right">
				<button type="submit" class="btn btn-success">
					<i class="glyphicon glyphicon-ok-sign"></i> Upload
				</button>
			</div>
		</div>
	</div>
</form>

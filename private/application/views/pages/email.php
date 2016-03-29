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
<?php if (validation_errors()): ?>
	<div class="col-md-12 alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<ul>
			<?=validation_errors('<li>', '</li>');?>
		</ul>
	</div>
<?php elseif (isset($success) === TRUE): ?>
	<div class="col-md-12 alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>Yeah!</strong> Your email has ben sent.
	</div>
<?php endif; ?>
<form action="" method="post" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">Sender</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="from_name" class="col-md-2 control-label">Name</label>
					<div class="col-md-10">
						<input type="text" name="from_name" class="form-control" id="from_name" placeholder="Your Name" value="<?=isset($from_name) ? $from_name : '';?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="from_email" class="col-md-2 control-label">Email</label>
					<div class="col-md-10">
						<input type="email" name="from_email" class="form-control" id="from_email" placeholder="Your Email" value="<?=isset($from_email) ? $from_email : '';?>" required>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">Recipients</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="to_email" class="col-md-2 control-label">Email</label>
					<div class="col-md-10">
						<input type="email" name="to_email" class="form-control" id="to_email" placeholder="Recipient Email" value="<?=isset($to_email) ? $to_email : '';?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="cc_email" class="col-md-2 control-label">Email CC</label>
					<div class="col-md-10">
						<input type="email" name="cc_email" class="form-control" id="cc_email" placeholder="Recipient CC Email" value="<?=isset($cc_email) ? $cc_email : '';?>" required>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Message</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="subject" class="col-md-2 control-label">Subject</label>
							<div class="col-md-10">
								<input type="text" name="subject" class="form-control" id="subject" placeholder="Subject" value="<?=isset($subject) ? $subject : '';?>" required>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="mailtype" class="col-md-8 control-label">Email Type</label>
							<div class="col-md-4">
								<select name="mailtype" class="form-control" id="mailtype">
									<option value="text">Text</option>
									<option value="html">HTML</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="message" class="col-md-1 control-label">Message</label>
					<div class="col-md-11">
						<textarea name="message" id="message" rows="5" class="form-control" placeholder="Message" required="required"><?=isset($message) ? $message : '';?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="attachment" class="col-md-1 control-label">Attachment</label>
					<div class="col-md-11">
						<input type="file" name="attachment" id="attachment">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<button type="reset" class="btn btn-danger">
					<i class="glyphicon glyphicon-remove-sign"></i> Reset Fields
				</button>
				<button type="submit" class="btn btn-success">
					<i class="glyphicon glyphicon-ok-sign"></i> Send Email
				</button>
			</div>
		</div>
	</div>
</form>

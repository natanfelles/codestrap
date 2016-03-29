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
	<h1 class="text-danger"><i class="glyphicon glyphicon-remove"></i> Some errors are breaking your Codestrap</h1>
	<div class="col-md-12 alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<ul>
			<?php foreach ($error as $item): ?>
				<li><?=$item?></li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php else: ?>
	<h1 class="text-success"><i class="glyphicon glyphicon-ok"></i> Hello, world!</h1>
	<div class="col-md-12 alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>Yeah!</strong> Everything is working fine.
	</div>
<?php endif; ?>

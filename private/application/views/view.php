<?php
/**
 * Codestrap
 *
 * @package    Codestrap
 * @author     Natan Felles
 * @link       https://github.com/natanfelles/codestrap
 */
defined('BASEPATH') OR exit('No direct script access allowed');

isset($title) ? : $title = 'Development';
?>
<!doctype html>
<html lang="en">
<?php include 'templates/head.php'; ?>
<body>
<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading"><?=$title;?></div>
		<div class="panel-body">
			<?php
			if (isset($page)):
				/**
				 * @var mixed $page
				 */
				$this->load->view('pages/' . $page);
			else:
				?>
				<div class="alert alert-danger" role="alert">
					<p><strong>Putz!</strong> Do you forget to configure the page view?</p>
				</div>
				<?php
			endif;
			?>
		</div>
		<div class="panel-footer">
			<strong>{elapsed_time} - {memory_usage}</strong>
		</div>
	</div>
</div>
<?php include 'templates/footer.php'; ?>
</body>
</html>
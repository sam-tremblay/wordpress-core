<?php
$gate_html_tags[] = gc::field('html_tags_after_open_head');
$gate_html_tags[] = gc::field('html_tags_before_close_head');
$gate_html_tags[] = gc::field('html_tags_after_open_body');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
		if(!empty($gate_html_tags[0]))
			echo $gate_html_tags[0];
		

		wp_head();


		if(!empty($gate_html_tags[1]))
			echo $gate_html_tags[1];
	?>
</head>

<body <?= body_class(); ?> data-base-url="<?= home_url(); ?>">

	<?php
		if(!empty($gate_html_tags[2]))
			echo $gate_html_tags[2];
	?>
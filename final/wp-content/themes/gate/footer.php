<?php
wp_footer();

$gate_html_tag = gc::field('html_tags_before_close_body');

if(!empty($gate_html_tag))
	echo $gate_html_tag;

?>
</body>
</html>
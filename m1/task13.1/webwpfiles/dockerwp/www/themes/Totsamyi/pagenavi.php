<?php global $wp_query;
$max_page = $wp_query->max_num_pages;
$nump=2; /*Количество отображаемых подряд номеров страниц*/
if($max_page>1){
	$paged = intval(get_query_var('paged'));
	if(empty($paged) || $paged == 0) $paged = 1;
	echo '<div class="pgs">';
	if($paged!=1) echo '<a href="'.get_pagenum_link(1).'">1</a>&nbsp;';
	else echo '<u>1</u>&nbsp;';
	if($paged-$nump>1) $start=$paged-$nump; else $start=2;
	if($paged+$nump<$max_page) $end=$paged+$nump; else $end=$max_page-1;
	if($start>2) echo "<b>...</b>&nbsp;";
	for ($i=$start;$i<=$end;$i++) {
		if($paged!=$i) echo '<a href="'.get_pagenum_link($i).'">'.$i.'</a> ';
		else echo '<u>'.$i.'</u>&nbsp;'; }
		if($end<$max_page-1) echo "<b>...</b>&nbsp;";
		if($paged!=$max_page) echo '<a href="'.get_pagenum_link($max_page).'">'.$max_page.'</a>';
		else echo '<u>'.$max_page.'</u> ';
		echo '</div>'	;
	} ?>
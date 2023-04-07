<?php
echo "<ul class='pagination pull-left margin-zero mt0'>";
// first page button
if($page>1){
	$prev_page = $page - 1;
	echo "<li>
		<a href='{$page_url}page={$prev_page}'>
			<span style='margin:0 .5em;'>«</span>
		</a>
	</li>";
}
// clickable page numbers
// find out total pages
$total_pages = ceil($total_rows / $records_per_page);
// range of num links to show
$range = 1;
// display links to 'range of pages' around 'current page'
$initial_num = $page - $range;
$condition_limit_num = ($page + $range)  + 1;
for ($x=$initial_num; $x<$condition_limit_num; $x++) {
	// be sure '$x is greater than 0' AND 'less than or equal to the $total_pages'
	if (($x > 0) && ($x <= $total_pages)) {
		// current page
		if ($x == $page) {
			echo "<li class='active'>
				<a href='javascript::void();'>{$x}</a>
			</li>";
		}
		// not current page
		else {
			echo "<li>
				<a href='{$page_url}page={$x}'>{$x}</a> 
			</li>";
		}
	}
}
// last page button
if($page<$total_pages){
	$next_page = $page + 1;
	echo "<li>
		<a href='{$page_url}page={$next_page}'>
			<span style='margin:0 .5em;'>»</span>
		</a>
	</li>";
}
echo "</ul>";
?>
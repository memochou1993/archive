<?php
/*顯示上一頁*/
if ( $current_page > 1 ) {
	?>
	<a href="<?php echo $URL; ?>&page=<?php echo 1; ?>" style="margin:12px"><img src="icons/page/first.png" width="18" height="18"></a>
	<a href="<?php echo $URL; ?>&page=<?php echo ( $current_page - 1 ); ?>" style="margin:12px"><img src="icons/page/previous.png" width="18" height="18"></a>
	<?php
} else {
	?>
	<a style="margin:12px"><img src="icons/page/first.png" width="18" height="18"></a>
	<a style="margin:12px"><img src="icons/page/previous.png" width="18" height="18"></a>
	<?php
}
/*顯示中間頁*/
if ( $total_pages > $all_pages ) {
	switch ( $current_page ) {
		case $current_page <= $pages: //前段
			$bigin = 1;
			$end = $all_pages;
		break;
		case $current_page >= ( $total_pages - $pages ): //後段
			$bigin = $total_pages - $pages * 2;
			$end = $total_pages;
		break;
		default: //中段
			$bigin = $current_page - $pages;
			$end = $current_page + $pages;
	}
} else {
	$bigin = 1;
	$end = $total_pages;
}
echo pageNumbers( $URL, $current_page, $bigin, $end );
/*顯示下一頁*/
if ( $current_page < $total_pages ) {
	?>
	<a href="<?php echo $URL; ?>&page=<?php echo ( $current_page + 1 ); ?>" style="margin:12px"><img src="icons/page/next.png" width="18" height="18"></a>
	<a href="<?php echo $URL; ?>&page=<?php echo $total_pages; ?>" style="margin:12px"><img src="icons/page/last.png" width="18" height="18"></a>
	<?php
	} else {	
	?>
	<a style="margin:12px"><img src="icons/page/next.png" width="18" height="18"></a>
	<a style="margin:12px"><img src="icons/page/last.png" width="18" height="18"></a>
	<?php
}
?>
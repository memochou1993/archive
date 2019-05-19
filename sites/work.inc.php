<?php
if ( !isset($_GET["field"]) ) {
    $sql = "
    SELECT
        `archive_works`.`id`,
        `archive_work_units`.`title` AS `unit`,
        `archive_works`.`year`,
        `archive_works`.`semester`,
        `archive_work_courses`.`id` AS `course_id`,
        `archive_work_courses`.`title` AS `course_title`,
        `archive_work_periods`.`title` AS `period`,
        `archive_work_types`.`title` AS `type`,
        `archive_works`.`number`,
        `archive_works`.`title`,
        `archive_works`.`format`,
        `archive_works`.`icon`,
        `archive_works`.`description`,
        `archive_works`.`tag`
    FROM
        `archive_works`,
        `archive_work_units`,
        `archive_work_courses`,
        `archive_work_periods`,
        `archive_work_types`
    WHERE
        `archive_works`.`unit` = `archive_work_units`.`id` AND 
        `archive_works`.`course` = `archive_work_courses`.`id` AND 
        `archive_works`.`period` = `archive_work_periods`.`id` AND 
        `archive_works`.`type` = `archive_work_types`.`id`
    ORDER BY
        `archive_works`.`id`
    DESC
        ";
} else {
    switch ($_GET["field"]){
        case "full-text":
            $sql = "
            SELECT
                `archive_works`.`id`,
                `archive_work_units`.`title` AS `unit`,
                `archive_works`.`year`,
                `archive_works`.`semester`,
                `archive_work_courses`.`id` AS `course_id`,
                `archive_work_courses`.`title` AS `course_title`,
                `archive_work_periods`.`title` AS `period`,
                `archive_works`.`number`,
                `archive_work_types`.`title` AS `type`,
                `archive_works`.`title`,
                `archive_works`.`format`,
                `archive_works`.`icon`,
                `archive_works`.`description`,
                `archive_works`.`tag`
            FROM
                `archive_works`,
                `archive_work_units`,
                `archive_work_courses`,
                `archive_work_periods`,
                `archive_work_types`
            WHERE
                `archive_works`.`unit` = `archive_work_units`.`id` AND 
                `archive_works`.`course` = `archive_work_courses`.`id` AND 
                `archive_works`.`period` = `archive_work_periods`.`id` AND 
                `archive_works`.`type` = `archive_work_types`.`id` AND
                CONCAT(`archive_work_units`.`title`, `archive_works`.`year`, `archive_works`.`semester`, `archive_works`.`course`, `archive_work_courses`.`title`, `archive_work_periods`.`title`, `archive_work_types`.`title`, `archive_works`.`title`, `archive_works`.`icon`, `archive_works`.`description`, `archive_works`.`tag`) LIKE '%".$_GET["request"]."%'
            ORDER BY
                `archive_works`.`id`
            DESC";
        break;
    }
}
$rows = mysqli_query($db, $sql);

$total_records = mysqli_num_rows($rows);
$records_per_page = 10;
$total_pages = ceil($total_records/$records_per_page);

if ( !isset($_GET["page"]) ) {
    $current_page = 1;
} else {
    $current_page = $_GET["page"];  
}
$offset = ($current_page-1)*$records_per_page;
mysqli_data_seek($rows, $offset);

$all_pages = 9;
$pages = ( $all_pages - 1 ) / 2;
$URL = "?field=full-text";
if ( isset($_GET["request"]) ) $URL .= "&request=".$_GET["request"];

function pageNumbers ( $URL, $current_page, $bigin, $end ) {
	for ( $i = $bigin; $i <= $end; $i++ ) {
		if ( $i != $current_page ) {
            ?>
			<a href="<?php echo $URL; ?>&page=<?php echo $i; ?>" style="margin:12px"><?php echo $i; ?></a>
            <?php
		} else {
            ?>
			<a style="margin:12px"><font size="+1"><?php echo $i; ?></font></a>
            <?php
		}
	}
}
?>
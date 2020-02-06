<?php
$field = $_GET["field"] ?? "";
$request = $_GET["request"] ?? "";
$page = $_GET["page"] ?? 1;

switch ($field) {
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
                CONCAT(`archive_work_units`.`title`, `archive_works`.`year`, `archive_works`.`semester`, `archive_works`.`course`, `archive_work_courses`.`title`, `archive_work_periods`.`title`, `archive_work_types`.`title`, `archive_works`.`title`, `archive_works`.`icon`, `archive_works`.`description`, `archive_works`.`tag`) LIKE '%".$request."%'
            ORDER BY
                `archive_works`.`id`
            DESC";
    break;
    default:
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
            DESC";
}

$rows = mysqli_query($db, $sql);
$total_records = mysqli_num_rows($rows);
$per_page = 30;
$total_pages = ceil($total_records / $per_page);
$offset = ($page - 1) * $per_page;

mysqli_data_seek($rows, $offset);

$all_pages = 9;
$pages = ($all_pages - 1) / 2;
$url = "?field=full-text";

if ($request) {
    $url .= "&request=".$request;
}

function pages($url, $page, $bigin, $end) {
	for ($i = $bigin; $i <= $end; $i++) {
		if ($i != $page) {
            ?>
			<a href="<?=$url?>&page=<?=$i?>" style="margin:12px"><?=$i?></a>
            <?php
		} else {
            ?>
			<a style="margin:12px"><font size="+1"><?=$i?></font></a>
            <?php
		}
	}
}

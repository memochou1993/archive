<?php
    require "database.inc.php";
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Memo's Archive</title>
    <link rel="shortcut icon" type="images/ico" href="images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">
</head>
<body>
	<?php
    if (!isset($_GET["site"])) {
        if (time() > ($_SESSION["time"] ?? 0) + 600) {
            ?>
			<script>
				location.href = "?site=check";
			</script>
		<?php
        } else {
            include "sites/work.php";
        }
    } else {
        include "sites/".$_GET["site"].".php";
    }
    ?>
</body>
</html>

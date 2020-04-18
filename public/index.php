<?php
require "../database.inc.php";
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
    $site = $_GET["site"] ?? "";
    $time = $_SESSION["time"] ?? 0;

    if (!$site) {
        if (time() > $time + 600) {
            ?>
                <script>
                location.href = "?site=check";
                </script>
            <?php
        } else {
            include "../sites/work.php";
        }
    } else {
        include "../sites/".$site.".php";
    }
    ?>
</body>
</html>

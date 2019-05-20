<?php
$valid = $_POST["valid"] ?? "";
if ($valid == "true") {
    $_SESSION["time"] = time();
    header("Location: " . "./");
}
if ($valid == "false") {
    header("Location: " . "http://portfolio.epoch.tw");
}
?>
<link href="images/memo.ico" rel="shortcut icon" type="images/ico">
<link rel="stylesheet" type="text/css" href="css/bbs-common.css">
<link rel="stylesheet" type="text/css" href="css/bbs-base.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/bbs-custom.css">
<link rel="stylesheet" type="text/css" href="css/bbs-print.css" media="print">
<div class="bbs-screen bbs-content">
    <img class="over18-notice" src="images/icon.gif">
    <div class="over18-notice">
        <p>本網站已依網站內容分級規定處理</p>
        <p>警告︰您即將進入之看板內容需滿十八歲方可瀏覽。</p>
        <p>根據「電腦網路內容分級處理辦法」第六條第三款規定，本網站已於各限制級網頁依照台灣網站分級推廣基金會之規定標示。若您尚未年滿十八歲，請點選離開。若您已滿十八歲，亦不可將本區之內容派發、傳閱、出售、出租、交給或借予年齡未滿18歲的人士瀏覽，或將本網站內容向該人士出示、播放或放映。</p>
    </div>
</div>
<div class="bbs-screen bbs-content center clear">
    <form method="post">
        <button name="valid" value="true" class="btn-big">我同意，我已年滿十八歲<br><small>進入</small></button>
        <button name="valid" value="false" class="btn-big">未滿十八歲或不同意本條款<br><small>離開</small></button>
    </form>
</div>

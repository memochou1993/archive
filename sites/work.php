<?php
    include "work.inc.php";
?>
<div style="margin:0px auto;margin-top:30px;text-align:center;letter-spacing: 4px">
    <h1><a href="index.php">周孝威報告集（2012-2017）</a></h1>
</div>
<div style="margin:0px auto;margin-top:30px;width:300px;text-align:left">
    <font size="+1">瀏覽</font>
    <select onchange="location.href=this.options[this.selectedIndex].value">
        <option selected>請選擇學年度學期序</option>
        <optgroup label="淡江大學"> 
            <option value="?field=full-text&request=TKU10101" <?php if ( $_GET["request"] == "TKU10101" ) echo "selected"; ?>>101學年度 第1學期</option>
            <option value="?field=full-text&request=TKU10102" <?php if ( $_GET["request"] == "TKU10102" ) echo "selected"; ?>>101學年度 第2學期</option>
            <option value="?field=full-text&request=TKU10201" <?php if ( $_GET["request"] == "TKU10201" ) echo "selected"; ?>>102學年度 第1學期</option>
            <option value="?field=full-text&request=TKU10202" <?php if ( $_GET["request"] == "TKU10202" ) echo "selected"; ?>>102學年度 第2學期</option>
            <option value="?field=full-text&request=TKU10301" <?php if ( $_GET["request"] == "TKU10301" ) echo "selected"; ?>>103學年度 第1學期</option>
        <optgroup label="山口大學"> 
            <option value="?field=full-text&request=YGU10302" <?php if ( $_GET["request"] == "YGU10302" ) echo "selected"; ?>>27年度 前期</option>
            <option value="?field=full-text&request=YGU10401" <?php if ( $_GET["request"] == "YGU10401" ) echo "selected"; ?>>27年度 後期</option>
        <optgroup label="淡江大學"> 
            <option value="?field=full-text&request=TKU10402" <?php if ( $_GET["request"] == "TKU10402" ) echo "selected"; ?>>104學年度 第2學期</option>
            <option value="?field=full-text&request=TKU10501" <?php if ( $_GET["request"] == "TKU10501" ) echo "selected"; ?>>105學年度 第1學期</option>
            <option value="?field=full-text&request=TKU10502" <?php if ( $_GET["request"] == "TKU10502" ) echo "selected"; ?>>105學年度 第2學期</option>
    </select>
</div>
<div style="margin:0px auto;margin-top:8px;width:300px;text-align:left">
    <form method="get" action="?site=bathroomForm">
        <font size="+1">搜尋</font>
        <input type="hidden" name="field" value="full-text">
        <input type="text" name="request" value="<?php echo $_GET["request"];?>" placeholder=" 請輸入關鍵字">
        <input type="submit">
    </form>
</div>
<div style="margin:0px auto;margin-top:8px;width:300px;text-align:left">
    <font size="+1">標籤</font>
    <a href="?field=full-text&request=大型報告">大型報告</a>
    <a href="?field=full-text&request=期末報告">期末報告</a>
    <a href="?field=full-text&request=資料庫">資料庫</a>
</div>
<div style="margin-top:15px;margin-left:80px;margin-right:80px">
    <div style="float:left">
        <font>找到 <?php echo $total_records; ?> 筆資料</font>
    </div>
    <div style="float:right">
        <font></font>
    </div>
</div>
<div style="margin:0px auto;margin-top:60px;margin-left:80px;margin-right:80px;text-align:center">
    <table>
        <thead>
            <tr>
                <th width="40">序號</th>
                <th width="140">檔案編號</th>
                <th width="140">課程名稱</th>
                <th width="100">檔案類型</th>
                <th width="300">檔案名稱</th>
                <th width="80">取得全文</th>
                <th width="80">檔案描述</th>
                <th width="80">標籤</th>
            </tr>
        </thead>
        <?php
            $i = 1;
            if ( !isset($_GET["page"]) or $_GET["page"] < 1 or $_GET["page"] > $total_pages ) {
                $k = 1;
            } else {
                $k = ($_GET["page"]-1)*$records_per_page+1;
            }
            while ( $row = mysqli_fetch_array($rows) and $i <= $records_per_page ) {
        ?>
        <tbody>
            <tr>
                <td><div align="center"><?php echo $k; ?></div></td>
                <td><div align="center"><?php echo $row["unit"]; ?><?php echo $row["year"]; ?><?php echo $row["semester"]; ?>-<br /><?php echo $row["course_id"]; ?>-<?php echo $row["number"]; ?></div></td>
                <td><div align="center"><a href="?field=full-text&request=<?php echo $row["course_title"]; ?>"><?php echo $row["course_title"]; ?></a></div></td>
                <td><div align="center"><a href="?field=full-text&request=<?php echo $row["period"]; ?>"><?php echo $row["period"]; ?></a><a href="?field=full-text&request=<?php echo $row["type"]; ?>"><?php echo $row["type"]; ?></a></div></td>
                <td><?php echo $row["title"]; ?></td>
                <td><div align="center"><a href="files/<?php echo $row["year"]; ?><?php echo $row["semester"]; ?>/<?php echo $row["unit"]; ?><?php echo $row["year"]; ?><?php echo $row["semester"]; ?>-<?php echo $row["course_id"]; ?>-<?php echo $row["number"]; ?>.<?php echo $row["format"]; ?>" target="_blank"><img src="icons/format/<?php echo $row["icon"]; ?>.png" width="64" height="64" /></a></div></td>
                <td><?php echo $row["description"]; ?></td>
                <td><div align="center"><a href="?field=full-text&request=<?php echo $row["tag"]; ?>"><?php echo $row["tag"]; ?></a></div></td>
            </tr>
        </tbody>
        <?php
                $i++;
                $k++;
            }
            mysqli_free_result($rows);
        ?>
    </table>
</div>
<div style="margin:0px auto;margin:30px;text-align:center">
    <?php
        include "page.inc.php";
    ?>
</div>

<?php
include "work.inc.php";

$request = $_GET["request"] ?? "";
$page = $_GET["page"] ?? 1;
?>

<div style="margin:0px auto;margin-top:30px;text-align:center;letter-spacing:4px">
    <h1>
        <a href="index.php">
            周孝威報告集（2012-2017）
        </a>
    </h1>
</div>

<div style="margin:0px auto;margin-top:30px;width:300px;text-align:left">
    <font size="+1">瀏覽</font>
    <select onchange="location.href=this.options[this.selectedIndex].value">
        <option selected>請選擇學年度學期序</option>
        <optgroup label="淡江大學">
            <option value="?field=full-text&request=TKU10101" <?=$request == "TKU10101" ? "selected" : ""?>>
                101學年度 第1學期
            </option>
            <option value="?field=full-text&request=TKU10102" <?=$request == "TKU10102" ? "selected" : ""?>>
                101學年度 第2學期
            </option>
            <option value="?field=full-text&request=TKU10201" <?=$request == "TKU10201" ? "selected" : ""?>>
                102學年度 第1學期
            </option>
            <option value="?field=full-text&request=TKU10202" <?=$request == "TKU10202" ? "selected" : ""?>>
                102學年度 第2學期
            </option>
            <option value="?field=full-text&request=TKU10301" <?=$request == "TKU10301" ? "selected" : ""?>>
                103學年度 第1學期
            </option>
        <optgroup label="山口大學"> 
            <option value="?field=full-text&request=YGU10302" <?=$request == "YGU10302" ? "selected" : ""?>>
                27年度 前期
            </option>
            <option value="?field=full-text&request=YGU10401" <?=$request == "YGU10401" ? "selected" : ""?>>
                27年度 後期
            </option>
        <optgroup label="淡江大學"> 
            <option value="?field=full-text&request=TKU10402" <?=$request == "TKU10402" ? "selected" : ""?>>
                104學年度 第2學期
            </option>
            <option value="?field=full-text&request=TKU10501" <?=$request == "TKU10501" ? "selected" : ""?>>
                105學年度 第1學期
            </option>
            <option value="?field=full-text&request=TKU10502" <?=$request == "TKU10502" ? "selected" : ""?>>
                105學年度 第2學期
            </option>
    </select>
</div>

<div style="margin:0px auto;margin-top:8px;width:300px;text-align:left">
    <form>
        <font size="+1">搜尋</font>
        <input type="hidden" name="field" value="full-text">
        <input type="text" name="request" value="<?=$request?>" placeholder="請輸入關鍵字">
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
        <font>共有 <?=$total_records?> 筆資料</font>
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
        $index = 1;
        $number = ($page < 1 or $page > $total_pages) ? 1 : ($page - 1) * $per_page + 1;
        while ($row = mysqli_fetch_array($rows) and $index <= $per_page) {
            ?>
            <tbody>
                <tr>
                    <td><div align="center"><?=$number?></div></td>
                    <td><div align="center"><?=$row["unit"]?><?=$row["year"]?><?=$row["semester"]?>-<br /><?=$row["course_id"]?>-<?=$row["number"]?></div></td>
                    <td><div align="center"><a href="?field=full-text&request=<?=$row["course_title"]?>"><?=$row["course_title"]?></a></div></td>
                    <td><div align="center"><a href="?field=full-text&request=<?=$row["period"]?>"><?=$row["period"]?></a><a href="?field=full-text&request=<?=$row["type"]?>"><?=$row["type"]?></a></div></td>
                    <td><?=$row["title"]?></td>
		    <td><div align="center"><a href="sites/notify.php" target="_blank"><img src="icons/format/<?=$row["icon"]?>.png" width="64" height="64" /></a></div></td>
                    <!--		    
                    <td><div align="center"><a href="files/<?=$row["year"]?><?=$row["semester"]?>/<?=$row["unit"]?><?=$row["year"]?><?=$row["semester"]?>-<?=$row["course_id"]?>-<?=$row["number"]?>.<?=$row["format"]?>" target="_blank"><img src="icons/format/<?=$row["icon"]?>.png" width="64" height="64" /></a></div></td>
                    -->
                    <td><?=$row["description"]?></td>
                    <td><div align="center"><a href="?field=full-text&request=<?=$row["tag"]?>"><?=$row["tag"]?></a></div></td>
                </tr>
            </tbody>
            <?php
            $index++;
            $number++;
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

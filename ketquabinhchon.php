<?php
$config = mysqli_connect('localhost', 'root', '', 'review');
mysqli_set_charset($config, 'utf8');

$s1 = mysqli_query($config, "SELECT * FROM binhchon WHERE idBC=1");
$d1 = mysqli_fetch_array($s1);

$s2 = mysqli_query($config, "SELECT SUM(SoLanChon) AS tongsolanchon FROM phuongan WHERE idBC=1");
$d2 = mysqli_fetch_array($s2);
$tongsobinhchon = $d2["tongsolanchon"];
?>
<!DOCTYPE html>
<html>
<head><title>Kết quả bình chọn</title></head>
<body>
    <table width="500" border="1" cellpadding="5" style="border-collapse: collapse;">
        <tr>
            <td colspan="3" bgcolor="#66CCFF" align="center"><b><?php echo $d1["MoTa"]; ?></b></td>
        </tr>
        <?php
        $kq = mysqli_query($config, "SELECT * FROM phuongan WHERE idBC=1");
        while($d = mysqli_fetch_array($kq)) {
            $phantram = ($tongsobinhchon > 0) ? ($d["SoLanChon"] / $tongsobinhchon) * 100 : 0;
            $rong = $phantram * 1.5; // Đổi tỷ lệ chiều rộng thanh biểu đồ
        ?>
        <tr>
            <td width="200"><?php echo $d["MoTa"]; ?></td>
            <td width="180">
                <table width="100%">
                    <tr>
                        <td width="<?php echo $rong; ?>" bgcolor="#FF0000" height="15"></td>
                        <td><?php echo round($phantram, 2); ?>%</td>
                    </tr>
                </table>
            </td>
            <td width="120">Số lần: <?php echo $d["SoLanChon"]; ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="3" align="right"><b>Tổng số lần chọn: <?php echo $tongsobinhchon; ?></b></td>
        </tr>
    </table>
    <br><a href="index.php">Trở lại bình chọn</a>
</body>
</html>
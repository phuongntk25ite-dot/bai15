<?php
$config = mysqli_connect('localhost', 'root', '', 'review');
mysqli_set_charset($config, 'utf8');
?>
<!DOCTYPE html>
<html>
<head><title>Bình chọn</title></head>
<body>
    <h3>BÌNH CHỌN</h3>
    <form method="get" action="xulybinhchon.php">
        <p><b>Bạn nghĩ sao về chất lượng trang web?</b></p>
        <?php
        $kq = mysqli_query($config, "SELECT * FROM phuongan WHERE idBC=1");
        $i = 0;
        while($row = mysqli_fetch_array($kq)) {
        ?>
            <label>
                <input type="radio" name="idPA" value="<?php echo $row['idPA'];?>" <?php if($i==0){ echo "checked"; $i++; } ?>>
                <?php echo $row['MoTa'];?>
            </label><br/>
        <?php } ?>
        <br/>
        <input type="submit" value="Xem kết quả">
    </form>
</body>
</html>
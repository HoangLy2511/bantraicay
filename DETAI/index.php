<?php
include("class/clsfoodfresh.php");
$p=new foodfresh();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="hinh/favicon.ico" />
<title>FoodFresh-cửa hàng thực phẩm</title><link rel="stylesheet" type="text/css" href="css/CssTrangchu.css"/>
</head>

<body>
<div id="container">
    <div id="thongtin">
        <div id="sdt">
            <span id="phone" style="font-weight:600; "> CALL NOW (+84)933 161 887</span>
        </div>
        <div id="DN">
            <a  id="dn"href="Dangnhap.php">Đăng nhập</a>
        </div>
        <div id="DK">
            <a id="dk" href="#">Đăng ký</a>
        </div>
    </div>
	<div id="banner">
    	<div id="logo">.
        	<a href="index.php"><img src="hinh/logo4.png" height="85px"/></a>
    	</div>
    	 <div id="sreach">
            <div id="search-box">
                <input type="search" id="search" placeholder=" Nhập sản phẩm tìm kiếm" />
                <a href="#" id="search-btn">Tìm kiếm</a>
            </div>
        </div>
    	<div id="giohang">
        	<a href="GioHang.php"><img src="hinh/gioohang.png" height="60px"/></a>
        </div>
    </div>
    <div id="menu">
    	<ul>
        	<li><a href="index.php">Trang chủ</a></li>
  			<li><a href="Sanpham.php">Sản phẩm</a></li>
            <li><a href="#">Giới thiệu</a></li>        
         </ul>
    </div>
    <div id="main">
    	<div id="rau_cu_qua">
        	<div id="DM_1">
    		<?php
				$p->loaddanhmuc("select * from danhmuc where id='1' order by tenmuc asc");
			?>
            </div>
            <div id="sp_dm_1">
            <p>
            <?php
				$p->loadsanpham("select * from sanpham where id_muc='1' order by gia asc");	
			?>
            </p>
            </div>
        </div>
        <div id="trai_cay">
        	<div id="DM_2">
    		<?php
				$p->loaddanhmuc("select * from danhmuc where id='2' order by tenmuc asc");
			?>
            </div>
            <div id="sp_dm_2">
            <?php
				$p->loadsanpham("select * from sanpham where id_muc='2' order by gia asc");	
			?>
            </div>
        </div>
        <br>
        <div id="trai_cay_NK">
        	<div id="DM_3">
    		<?php
				$p->loaddanhmuc("select * from danhmuc where id='3' order by tenmuc asc");
			?>
            </div>
            <div id="sp_dm_3">
            <?php
				$p->loadsanpham("select * from sanpham where id_muc='3' order by gia asc");	
			?>
            </div>
        </div>
    </div>
    <div id="footer">
    	<div id="cot1">
    		<img src="hinh/logo4.png" height="85px"/>
        	<br />
            Liên hệ:
        	<a class="text-dark" href="tel:+84933161887">
        		0933 161 887
        	</a>
        	<p>
        		8 Nguyễn Đình Khơi, P.4, Quận Tân Bình, TP.HCM
        	</p>
    	</div>
    	<div id="cot2">
    		<h1>Sản phẩm</h1>
        	<?php
				$p->loaddanhmuc("select * from danhmuc where id order by tenmuc asc");
			?>
    	</div>
    	<div id="cot3">
        	<h1>Về chúng tôi</h1>
            <p>
        		8 Nguyễn Đình Khơi, P.4, Quận Tân Bình, TP.HCM
        	</p>
    	</div>
    </div>
</div>
</body>
</html>
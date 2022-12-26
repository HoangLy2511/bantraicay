<?php
include("class/clsfoodfresh.php");
$p=new foodfresh();
$layid=0;
if(isset($_REQUEST['id']))
{
	$layid=$_REQUEST['id'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="hinh/favicon.ico" />
<title>FoodFresh-Sản phẩm</title>
<link rel="stylesheet" type="text/css" href="css/CssChiTietSanPham.css"/>
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
        <?php
			$layid=$_REQUEST['id'];
			if($layid>0)
			{
				$p->loadchitietsp("select * from sanpham where id='$layid' order by gia asc");
			}
			else
			{
				$p->loadchitietsp("select * from sanpham order by gia asc");
			}
			?>
      <form action="" method="post" enctype="multipart/form-data" name="myam" id="myam">
            <input class="form-submit" type="submit" name="nut" id="nut" value="Thêm sản phẩm"/>
            <input name="txtten" type="hidden" id="txtten" value="<?php echo $p->laycot("select tensp from sanpham where id='$layid' limit 1"); ?>" />
            <input name="txtgia" type="hidden" id="txtgia" value="<?php echo $p->laycot("select gia from sanpham where id='$layid' limit 1"); ?>" />
            <input name="txthinh" type="hidden" id="txthinh" value="<?php echo $p->laycot("select hinh from sanpham where id='$layid' limit 1"); ?>" />
            <?php
			  switch($_POST['nut'])
				{
				  case 'Thêm sản phẩm':
				  {
					  $id_sanpham=$_REQUEST['sanpham'];
					  $tensp=$_REQUEST['txtten'];
					  $gia=$_REQUEST['txtgia'];
					  $hinh=$_REQUEST['txthinh'];
							if($p->themxoasua("INSERT INTO  giohang(hinh,tensp,gia,id_sanpham)VALUES ('$hinh','$tensp','$gia','$id_sanpham')")==1)
							{
								echo "<br>";
								echo "&ensp;&ensp;&ensp;&ensp;&ensp;Thêm vào giỏ hàng thành công";
							}
							else
							{
								echo "Thêm không thành công";
							}
					  break;
				  }
				}
			?>
    </form>
    </div>
	<div id="footer">>
    	<div id="cot1">
    		<img src="hinh/logo4.png" height="85px"/>
        	<br />
        	Liên hệ:
        	<a class="text-dark" href="tel:+84933161887">
        		0933 161 887
        	</a>
        	<p>
        		Địa chỉ: 8 Nguyễn Đình Khơi, P.4, Quận Tân Bình, TP.HCM
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
        		Địa chỉ: 8 Nguyễn Đình Khơi, P.4, Quận Tân Bình, TP.HCM
        	</p>
    	</div>
    </div>
</body>
</html>
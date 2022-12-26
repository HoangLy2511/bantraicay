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
<link rel="shortcut icon" href="hinh/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><link rel="stylesheet" type="text/css" href="css/CssGioHang.css"/>
<title>FoodFresh-Giỏ hàng</title>
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
        <form action="" method="post" enctype="multipart/form-data" name="myam" id="myam">
            
            <input name="txtten" type="hidden" id="txtten" value="<?php echo $p->laycot("select tensp from giohang where id='$layid' limit 1"); ?>" />
            <input name="txtgia" type="hidden" id="txtgia" value="<?php echo $p->laycot("select gia from giohang where id='$layid' limit 1"); ?>" />
            <input name="txthinh" type="hidden" id="txthinh" value="<?php echo $p->laycot("select hinh from giohang where id='$layid' limit 1"); ?>" />
            <label for="txtid"></label>
        	<input type="hidden" name="txtid" id="txtid" value="<?php echo $layid;?>"/>
			<?php
            	$p->load_ds_giohang("select * from giohang order by id desc");
			?>
            <?php
				 switch($_POST['nut'])
				  {
					  
					case 'Xóa';
					{
						$idxoa=$_REQUEST['txtid'];
						$hinh=$p->laycot("select hinh from giohang where id='$idxoa' limit 1");
						
						if($idxoa>0)
						{
							
							if($p->themxoasua("delete from giohang where id='$idxoa' limit 1")==1)
							{
								header('location:Giohang.php');	
							}
							else
							{
								echo 'Xóa không thành công.';	
							}
						}
						else
						{
							echo 'Vui lòng chọn sản phẩm cần xóa.';
						}
						break;
					}
				}
          	?>
        </form>
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
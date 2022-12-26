<?php
include("../class/clslogin_tmdt.php");
$p=new login();
include("../class/clsfoodfresh.php");
$q=new foodfresh();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../hinh/favicon.ico" />
<title>FoodFresh-Đăng nhập</title><link rel="stylesheet" type="text/css" href="../css/CssDangnhap.css"/>
</head>

<body>
<div id="container">
    <div id="thongtin">
        <div id="sdt">
            <span id="phone" style="font-weight:600; "> CALL NOW (+84)933 161 887</span>
        </div>
        <div id="DN">
            <a  id="dn"href="login.php">Đăng nhập</a>
        </div>
        <div id="DK">
            <a id="dk" href="#">Đăng ký</a>
        </div>
    </div>
	<div id="banner">
    	<div id="logo">.
        	<a href="../index.php"><img src="../hinh/logo4.png" height="85px"/></a>
    	</div>
    	 <div id="sreach">
            <div id="search-box">
                <input type="search" id="search" placeholder=" Nhập sản phẩm tìm kiếm" />
                <a href="#" id="search-btn">Tìm kiếm</a>
            </div>
        </div>
    	<div id="giohang">
        	<a href="../GioHang.php"><img src="../hinh/gioohang.png" height="60px"/></a>
        </div>
    </div>
    <div id="menu">
    	<ul>
        	<li><a href="../index.php">Trang chủ</a></li>
  			<li><a href="../Sanpham.php">Sản phẩm</a></li>
            <li><a href="#">Giới thiệu</a></li>        
         </ul>
    </div>
    <div id="main">
    	<div id= "form">
            <form id="myfm" name="myfm" method="post" action="">
              <table width="474" border="1" align="center">
                <tr>
                  <td colspan="2" align="center"><h1><strong>ĐĂNG NHẬP</strong></h1></td>
                </tr>
                <tr>
                  <td width="139">Nhập username</td>
                  <td width="319"><label for="txtuser"></label>
                  <input type="text" name="txtuser" id="txtuser" /></td>
                </tr>
                <tr>
                  <td>Nhập password</td>
                  <td><label for="txtpass"></label>
                  <input type="password" name="txtpass" id="txtpass" /></td>
                </tr>
                <tr>
                  <td colspan="2" align="center"><input type="submit" name="nut" id="nut" value="Đăng nhập" /></td>
                </tr>
              </table>
              <div align="center">
              <?php
                switch($_POST['nut'])
                {
                    case 'Đăng nhập';
                    {
                        $user=$_REQUEST['txtuser'];
                        $pass=$_REQUEST['txtpass'];
                        if($user!='' && $pass!='')
                        {
                            if($p->mylogin($user,$pass)==1)
                            {
                                header('location:quanlysanpham.php');
                            }
                            else
                            {
                                echo 'Đăng nhập thông thành công.';	
                            }
                        }
                        else
                        {
                            echo 'Vui lòng nhập đầy đủ thông tin.';	
                        }
                        break;
                    }	
                }
              ?>
              </div>
            </form>
      	</div>
   </div>
   <div id="footer">
    	<div id="cot1">
    		<img src="../hinh/logo4.png" height="85px"/>
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
				$q->loaddanhmuc("select * from danhmuc where id order by tenmuc asc");
			?>
    	</div>
    	<div id="cot3">
        	<h1>Về chúng tôi</h1>
            <p>
        		8 Nguyễn Đình Khơi, P.4, Quận Tân Bình, TP.HCM
        	</p>
    	</div>
    </div>
</body>
</html>
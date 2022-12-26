<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['user']) && isset($_SESSION['pass']))
{
	include("../class/clslogin_tmdt.php");
	$q=new login();
	$q->confirmlogin($_SESSION['id'], $_SESSION['user'], $_SESSION['pass']);
}
else
{
	header('location:login.php');	
}
include("../class/clsfoodfresh.php");		
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
<link rel="shortcut icon" href="../hinh/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản lý sản phẩm</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="1000" border="1" align="center">
    <tr>
      <td colspan="2" align="center"><h1>QUẢN LÝ SẢN PHẨM</h1></td>
    </tr>
    <tr>
      <td width="187">Danh mục sản phẩm</td>
      <td width="797">
       	<?php
		$layid_muc=$p->laycot("select id_muc from sanpham where id='$layid' limit 1");
			$p->loadcombo_danhmuc("select id, tenmuc from danhmuc order by id asc", $layid_muc);
		?>
        <label for="txtid"></label>
        <input type="hidden" name="txtid" id="txtid" value="<?php echo $layid;?>"/>
    </tr>
     
    <tr>
      <td>Nhập tên sản phẩm</td>
      <td><label for="txtten"></label>
      <input type="text" name="txtten" id="txtten" value="<?php echo $p->laycot("select tensp from sanpham where id='$layid' limit 1");?>"/></td>
    </tr>
    <tr>
      <td>Nhập giá</td>
      <td><label for="txtgia"></label>
      <input type="text" name="txtgia" id="txtgia"  value="<?php echo $p->laycot("select gia from sanpham where id='$layid' limit 1");?>"/></td>
    </tr>
    <tr>
      <td>Nhập mô tả</td>
      <td><label for="txtmota"></label>
      <textarea name="txtmota" id="txtmota" cols="45" rows="5"><?php echo $p->laycot("select mota from sanpham where id='$layid' limit 1");?></textarea></td>
    </tr>
   	 <tr>
      <td>Hình đại diện</td>
      <td><label for="myfile"></label>
      <input type="file" name="myfile" id="myfile" /></td>
    </tr>
    <tr>
      <td height="35" colspan="2" align="center"><input type="submit" name="nut" id="nut" value="Thêm sản phẩm" />
      <input type="submit" name="nut" id="nut" value="Xóa" />
      <input type="submit" name="nut" id="nut" value="Sửa sản phẩm" /></td>
    </tr>
  </table>
  <div align="center">
  <?php

  	switch($_POST['nut'])
	{
		case 'Thêm sản phẩm';
		{
			$id_muc=$_REQUEST['danhmuc'];
			$ten=$_REQUEST['txtten'];
			$gia=$_REQUEST['txtgia'];
			$mota=$_REQUEST['txtmota'];
			$name=$_FILES['myfile']['name'];
			$tmp_name=$_FILES['myfile']['tmp_name'];
			$type=$_FILES['myfile']['type'];
			$nsize=$_FILES['myfile']['size'];
			if($name!='')
			{
				$name=time()."_".$name;
				if($p->uploadfile($name, $tmp_name, "../hinh"))
				{
					if($p->themxoasua("INSERT INTO sanpham(tensp,gia,mota,hinh,id_muc)VALUES ('$ten', '$gia', '$mota', '$name', '$id_muc')")==1)
					{
						echo 'Thêm sản phẩm thành công';	
					}
					else
					{
						echo 'Thêm sản phẩm không thành công';	
					}
				}
				else
				{
					echo 'Không upload được hình.';	
				}
			}
			else
			{
				echo'Vui lòng chọn hình đại diện.';
			}
			break;	
		}
		case 'Xóa';
		{
			$idxoa=$_REQUEST['txtid'];
			$hinh=$p->laycot("select hinh from sanpham where id='$idxoa' limit 1");
			$hinh="../hinh/".$hinh;
			if($idxoa>0)
			{
				unlink($hinh);
				if($p->themxoasua("delete from sanpham where id='$idxoa' limit 1")==1)
				{
					header('location:quanlysanpham.php');	
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
		case 'Sửa sản phẩm';
		{
			$idsua=$_REQUEST['txtid'];
			$id_muc=$_REQUEST['danhmuc'];
			$ten=$_REQUEST['txtten'];
			$gia=$_REQUEST['txtgia'];
			$mota=$_REQUEST['txtmota'];
			if($idsua>0)
			{
				if($p->themxoasua("UPDATE sanpham SET tensp='$ten',gia='$gia',mota='$mota', id_muc='$id_muc' WHERE id='$idsua' LIMIT 1")==1)
				{
					header('location:quanlysanpham.php');	
				}
				else
				{
					echo 'Sửa không thành công.';	
				}
			}
			else
			{
				echo 'Vui lòng chọn sản phẩm cần sửa';	
			}
			break;
		}	
	}
	
  ?>
  </div>
  <hr />
  <?php
  		$p->load_ds_sanpham("select * from sanpham order by id desc");
  ?>
</form>
</body>
</html>
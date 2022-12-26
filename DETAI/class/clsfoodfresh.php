<?php
include("clsuploadfile.php");
class foodfresh extends myfile
{
	private function connect()
	{
		$con=mysqli_connect("localhost", "foodfres_foodfresh", "foodfresh18112021","foodfres_dbfoodfresh");
		if(!$con)
		{
			echo 'không kết nói được CSDL.';
			exit();
		}
		else
		{
			mysqli_set_charset($con,"utf8");
			return $con;
		}	
	}
	public function loaddanhmuc($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		@mysqli_close($link);
		if($i>0)
		{
			while($row=@mysqli_fetch_array($ketqua))
			{

				$id=$row['id'];
				$tenmuc=$row['tenmuc'];
				echo '<a href="Sanpham.php?id='.$id.'">'.$tenmuc.'</a>';
				echo '<br>';	
			}	
		}
		else
		{
			echo 'không có dữ liệu.';	
		}
	}
	public function loadsanpham($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		@mysqli_close($link);
		if($i>0)
		{
			while($row=@mysqli_fetch_array($ketqua))
			{

				$id=$row['id'];
				$hinh=$row['hinh'];
				$tensp=$row['tensp'];
				$gia=$row['gia'];
				echo '<div id="sanpham">
                    		<div id="sanpham_hinh"><img src="hinh/'.$hinh.'" width="250" height="250"/></div>
							<div id="sanpham_ten">'.$tensp.'</div>
                    		<div id="sanpham_gia">'.number_format($gia).' đồng</div>
							<button>
								<a href="Chi-Tiet-San-Pham.php?id='.$id.'">Xem thêm</a>
					  		</button>
							
					  </div>';	
			}	
		}
		else
		{
			echo 'Đang cập nhât dữ liệu...';	
		}
	}
	public function loadchitietsp($sql)
	{
	$link=$this->connect();
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		@mysqli_close($link);
		if($i>0)
		{
			while($row=@mysqli_fetch_array($ketqua))
			{

				$id=$row['id'];
				$hinh=$row['hinh'];
				$tensp=$row['tensp'];
				$gia=$row['gia'];
				$mota=$row['mota'];
				echo '
                      <div id="sanpham_hinh"><img src="hinh/'.$hinh.'" width="450" height="500"/></div>
							
				      <div id="chitiet_sp">
					  	<div id="sanpham_ten">'.$tensp.'</div>
                      	<div id="sanpham_gia">'.number_format($gia).' đồng</div>
					  	<div id="sanpham_mota">'.$mota.'</div>
					  </div>';	
			}	
		}
		else
		{
			echo 'Đang cập nhât dữ liệu...';	
		}
	}
	public function loadcombo_danhmuc($sql, $idchon)
	{
		$link=$this->connect();
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		@mysqli_close($link);
		if($i>0)
		{
			echo '<select name="danhmuc" id="danhmuc">';
			echo '<option>Mời chọn mục</option>';
			while($row=@mysqli_fetch_array($ketqua))
			{
            	$id=$row['id'];
				$tenmuc=$row['tenmuc'];
				if($id==$idchon)
				{
					echo '<option value="'.$id.'" selected="selected">'.$tenmuc.'</option>';
				}
				else
				{
					echo '<option value="'.$id.'">'.$tenmuc.'</option>';
				}
			}
			echo '</select>';	
		}
	}
	function themxoasua($sql)
	{
		$link=$this->connect();
		if(mysqli_query($link, $sql))
		{
			return 1;
		}
		else
		{
			return 0;
		}		
	}

	public function load_ds_sanpham($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		@mysqli_close($link);
		if($i>0)
		{
			echo '<table width="797" border="1" align="center">
    				<tr>
      					<td width="47" align="center" valign="middle">STT</td>
      					<td width="265" align="center" valign="middle">Tên sản phẩm</td>
      					<td width="156" align="center" valign="middle">Giá</td>
      					<td width="301" align="center" valign="middle">Mô tả</td>
    				</tr>';
			$dem=1;
			while($row=@mysqli_fetch_array($ketqua))
			{
				$id=$row['id'];
				$tensp=$row['tensp'];
				$gia=$row['gia'];
				$mota=$row['mota'];
				echo '<tr>
						 <td align="center" valign="middle"><a href="?id='.$id.'">'.$dem.'</a></td>
						 <td valign="middle"><a href="?id='.$id.'">'.$tensp.'</a></td>
					  	 <td align="center" valign="middle"><a href="?id='.$id.'">'.$gia.'</a></td>
					     <td valign="middle"><a href="?id='.$id.'">'.$mota.'</a></td>
					     
					  </tr>';
					  $dem++;
								}
			echo '</table>';	
		}
		else
		{
			echo 'Đang cập nhât dữ liệu...';	
		}
	}
	
	public function laycot($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		@mysqli_close($link);
		if($i>0)
		{
			while($row=@mysqli_fetch_array($ketqua))
			{
				$id=$row[0];
				$giatri=$id;
			}
			return $giatri;	
		}
	}
	public function load_ds_giohang($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		@mysqli_close($link);
		if($i>0)
		{
			echo '<table width="797" border="1" align="center">
    				<tr>
      					<td width="47" align="center" valign="middle">STT</td>
      					<td width="265" align="center" valign="middle">Ảnh</td>
      					<td width="265" align="center" valign="middle">Tên sản phẩm</td>
      					<td width="156" align="center" valign="middle">Đơn giá</td>
      					<td width="156" align="center" valign="middle">Thao tác</td>
    				</tr>';
			$dem=1;
			while($row=@mysqli_fetch_array($ketqua))
			{
            	$id=$row['id'];
				$tensp=$row['tensp'];
				$gia=$row['gia'];
				$hinh=$row['hinh'];
				echo '<tr>
				
						 <td align="center" valign="middle"><a href="?id='.$id.'">'.$dem.'</a></td>
						  <td><a href="?id='.$id.'"><img src="hinh/'.$hinh.'" width="100" height="100" /></a></td>
						 <td valign="middle"><a href="?id='.$id.'">'.$tensp.'</a></td>
					  	 <td align="center" valign="middle"><a href="?id='.$id.'">'.number_format($gia).'</a></td>
					  	 <td><input type="submit" name="nut" id="nut" value="Xóa" /></td>
					  </tr>';
					  $dem++;
								}
			echo '</table>';	
		}
		else
		{
			echo 'Đang cập nhât dữ liệu...';	
		}
	}
	
}
?>
<?php
class login
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
	public function mylogin($user, $pass)
	{
		$pass=md5($pass);
		$link=$this->connect();
		$sql="select id, username, password from taikhoan where username='$user' and password='$pass' limit 1";
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		if($i==1)
		{
			while($row=@mysqli_fetch_array($ketqua))
			{

				$id=$row['id'];
				$username=$row['username'];		
				$password=$row['password'];
				session_start();
				$_SESSION['id']=$id;
				$_SESSION['user']=$username;	
				$_SESSION['pass']=$password;			
			}
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function confirmlogin($id,$user,$pass)
	{
		$link=$this->connect();
		$sql="select id from taikhoan where id='$id' and username='$user' and password='$pass' limit 1";
		$ketqua=mysqli_query($link,$sql);
		$i=mysqli_num_rows($ketqua);
		if($i!=1)
		{
			header('location:login.php');	
		}
	}
}
?>
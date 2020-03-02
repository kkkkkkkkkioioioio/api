<?php

$post = json_decode(file_get_contents("php://input"),true);
$Account = $post['Account'];
$Password = $post['Password'];

if ($post) 
{
	if ($Account == null) 
	{
		echo '{
		    "Code": 2,
		    "Message": "Login Failed",
		    "Result": null
		}';
	}
	elseif ($Password == null) 
	{
		echo '{
		    "Code": 2,
		    "Message": "Login Failed",
		    "Result": null
		}';
	}
	else
	{
		$host = 'localhost';
		$user = 'root';
		$pass = '123456';
		$dbname = 'account_information';
		$conn = new mysqli($host,$user,$pass,$dbname);

		mysqli_query($conn,'SET NAMES utf8');

		$sql = "SELECT * FROM `account` WHERE `1`='".$Account."' and `2`='".$Password."'";

		$result = $conn->query($sql);

		if ($result->num_rows)
		{
			echo '{
			    "Code": 0,
			    "Message": "",
			    "Result": null
			}';	
		}
		else
		{
			echo '{
			    "Code": 2,
			    "Message": "Login Failed",
			    "Result": null
			}';
		}
	}
}
?>

<?php

$post = json_decode(file_get_contents("php://input"),true);
$Account = $post['Account'];

if ($post) 
{
	if ($Account == null) 
	{
		echo '{
		    "Code": 0,
		    "Message": "",
		    "Result": {
		        "IsOK" : false
		    }
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

		$sql = "SELECT * FROM `account` WHERE `1`='".$Account."'";

		$result = $conn->query($sql);

		if ($result->num_rows)
		{
			$sql = "DELETE FROM `account` WHERE `1`='".$Account."'";

			if ($conn->query($sql) === TRUE) 
			{
				echo '{
				    "Code": 0,
				    "Message": "",
				    "Result": {
				        "IsOK" : true
				    }
				}';
			}
			else
			{
				echo '{
				    "Code": 0,
				    "Message": "",
				    "Result": {
				        "IsOK" : false
				    }
				}';
			}
		}
		else
		{
			echo '{
				    "Code": 0,
				    "Message": "",
				    "Result": {
				        "IsOK" : false
				    }
				}';
		}
	}
}
?>

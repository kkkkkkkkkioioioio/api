<?php

$post = json_decode(file_get_contents("php://input"),true);
$Account = $post['Account'];
$Password = $post['Password'];

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
	elseif ($Password == null) 
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
			$row = $result->fetch_assoc();
			$db_password = $row[2];

			if ($db_password == $Password) 
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
				$sql = "UPDATE `account` SET `2`='".$Password."' WHERE `1`='".$Account."'";

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

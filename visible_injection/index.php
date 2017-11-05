<html>
<head>
   <title>SQLi</title>
</head>
<body>
<form method="get" id="myform">
<?php
	$p_browser_id = $_GET['browser'];

	DEFINE('DB_USERNAME', 'root');
	DEFINE('DB_PASSWORD', 'root');
	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_DATABASE', 'sqli');

	$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

	if (mysqli_connect_error()) {
		die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
	}

	$sql1 = "select id, browser_name, latest_version from browser";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0) {
		echo("<select onchange='this.form.submit()' name='browser'>");
		echo("<option value='0'>---</option>");
		while($row = $result1->fetch_assoc()) {
			$b_id=$row["id"];
			$b_name=$row["browser_name"];
			$selected = $p_browser_id == $b_id;
			echo("<option ".($selected?"selected='selected'":"")." value='{$b_id}'>{$b_name}</option>");
		}
		echo("</select>");
	} else {
		echo "No browsers";
	}
?>
</form>
<?php
	if ($p_browser_id) {
		$sql2 = "select id, browser_name, latest_version from browser where id = '{$p_browser_id}'";
		$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		$result2 = $conn->query($sql2);
		if ($result2->num_rows > 0) {
			echo("<br/>Your selected browser is:<br/>");
			echo("<table>");
			while($row = $result2->fetch_assoc()) {
				$b_id=$row["id"];
				$b_name=$row["browser_name"];
				$b_version=$row["latest_version"];
				echo("<tr><td>{$b_id}</td><td>{$b_name}</td><td>{$b_version}</td></tr>");
				break;
			}
			echo("</table>");
		} else {
			echo "No such browser found!";
		}
	}
?>
<?php
	echo(mysqli_error($conn));
	$conn->close();
?>
</body>
</html>
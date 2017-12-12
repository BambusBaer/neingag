<?php
session_start();
session_destroy();
header('location: index.php');
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>neingag</title>
		<link href="./css/style.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
	<header>
		<?php
		include('menu.php');
		?>
	</header>
		
	<div>content</div>
	
	<?php
	include('footer.php');
	?>
	</body>
</html>
<?php
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<html>
	<head>
		<title>Bob's Auto Parts - Customer Orders</title>
	</head>
	<body>
		<?php
			// @$fp = fopen("$DOCUMENT_ROOT/maidian/order.txt", 'rb');

			// if (!$fp) {
			// 	echo "<p><strong>No orders pending.
			// 				Please tyr again later.</strong></p>";
			// 	exit;
			// }

			// while (!feof($fp)) {
			// 	$order = fgets($fp, 999);
			// 	echo $order."<br />";
			// }
			


		$dir = "$DOCUMENT_ROOT/maidian/files_to_watch/";  //要获取的目录

		if (is_dir($dir)){
			if ($dh = opendir($dir)){

				while (($file = readdir($dh))!= false){
					//文件名的全路径 包含文件名
					$filePath = $dir.$file;
					// echo $filePath.'<br>';

					//获取文件修改时间
					// $fmt = filemtime($filePath);
					// echo "<span style='color:#666'>(".date("Y-m-d H:i:s",$fmt).")</span> ".$filePath."<br/>";
					$pg = preg_match('/^(\.+|README|static)/', $file);
					if($pg) continue;
					echo "<a href='".$filePath."'>".$file."</a><br>";
					// echo $file.':<br>';
					$file_content = file_get_contents($filePath);
					// echo $file_content;
					$start = "stat";
					$end = "}";
					// $start = "wwww";
					// $end = ".net";
					echo get_between($file_content, $start, $end).'<br>'; // output:coderbolg
				}				

				closedir($dh);
			}
		}




			function get_between($input, $start, $end) {
				$substr = substr($input, strlen($start)+strpos($input, $start),
				(strlen($input) - strpos($input, $end))*(-1));
				return $substr;
			}


			


		?>
	</body>
</html>
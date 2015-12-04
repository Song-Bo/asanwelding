<meta charset="UTF-8">
<?
	session_start();

	$num = $_GET[num];
	$table = "download";

	$real_name = $_GET[real_name];
	$show_name = $_GET[show_name];
	$real_type = $_GET[real_type];
	$file_path = $_GET[file_path];
	$file_size = $_GET[file_size];
	$file_type = $_GET[file_type];


	$file_path = "./data/".$real_name;

	if (file_exists($file_path)) {

		$fp = fopen($file_path, "rb");

		if ($file_type) {
			header("Content-type: application/x-msdownload");
			header("Content-Length: ".filesize($file_path));
			header("Content-Disposition: attachment; filename=$show_name");
			header("Content-Transfer-Encoding: binary");
			header("Pragma: no-cache");
			header("Content-Description: File Transfer");

			header("Expires: 0");
		} else {
			if (eregi("(MSIE 5.0|MSIE 5.1|MSIE 5.5|MSIE 6.0)", $HTTP_USER_AGENT)) {
				header("Content-type: application/octet-stream");
				header("Content-Length: ".filesize($file_path));
				header("Content-Disposition: attachment; filename=$show_name");
				header("Content-Transfer-Encoding: binary");
				header("Expires: 0");
			} else {
				header("Content-type: file/unknown");
				header("Content-Length: ".filesize($file_path));
				header("Content-Disposition: attachment; filename=$show_name");
				header("Content-Description: PHP3 Generated Data");
				header("Expires: 0");
			}
		}

		if(!fpassthru($fp)) fclose($fp);
	}
?>
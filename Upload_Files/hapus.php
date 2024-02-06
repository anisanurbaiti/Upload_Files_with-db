<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "fileuploaddownload";
 $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
 if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
 $sql = "SELECT *FROM files";
 $result = $conn->query($sql);
 $code =$_GET['id'];
   $varDelete = mysqli_query($conn, "DELETE FROM files WHERE id= '$code'");
        if (!$varDelete) {
     echo "<script>alert('Gagal di hapus'); window.location=('download.php')</script>";
		} else {
       echo "<script>alert('Berhasil Terhapus'); window.location=('download.php')</script>";
	}
?>
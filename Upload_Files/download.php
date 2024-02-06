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
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-2.1.4.min.js"></script>
   <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="text-center">
  <h1>Uploaded files</h1>
  <br>
        <br>
        <a href="index.php" class="btn btn-primary">Upload Baru</a>
         <br>
        <br>
</div>  

<div class="container">
 <table class="table table-striped">
    <thead>
      <tr>
         <th>NAMA FILE</th>
                    <th>UKURAN</th>
                    <th>TIPE</th>
                    <th>DOWNLOAD</th>
                     <th>AKSI</th>
      </tr>
    </thead>
  
    <tbody>
         <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $file_path = "uploads/" . $row['filename'];
                        ?>
                        <tr>
                            <td><?php echo $row['filename']; ?></td>
                            <td><?php echo $row['filesize']; ?> bytes</td>
                            <td><?php echo $row['filetype']; ?></td>
                            <td><a href="<?php echo $file_path; ?>" class="btn btn-primary" download>Download</a></td>
                             <td><a href="hapus.php?id=<?php echo $row['id'] ?>" class="btn btn-danger"  onClick= "javascript:return confirm('Yakin Ingin Menghapus Data ?');">Hapus</a></td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
      <tr>
         <td colspan="4">No files uploaded yet.</td>
      </tr>
    <?php
                }
                ?>
    </tbody>
  
  </table>
</div>

</body>
</html>

<?php
$conn->close();
?>

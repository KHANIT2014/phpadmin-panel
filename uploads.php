<?php
if(isset($_POST['upload'])){
    $file_name = $_FILES['file']['name'];
    print_r($file_name);
    $file_loc = $_FILES['file']['tmp_name'];
    $store_file = "uploads/" .$file_name;


    move_uploaded_file($file_loc, $store_file);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method ="POST"  enctype= "multipart/form-data" >
    <label for="">uploading</label><br>
    <input type="file" name="file"><br>
    <input type="submit" name="upload" value = "upload_file"  >
</form>
</body>
</html>
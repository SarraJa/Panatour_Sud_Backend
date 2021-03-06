<?php

$host = "localhost"; /* Host name */
$user = "postgres"; /* User */
$password = "postgres"; /* Password */
$dbname = "data"; /* Database name */

if(isset($_POST['but_upload'])){

    $name = $_FILES['file']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
        // Upload file
        if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
            // Convert to base64
            $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
            // Insert record
            $query = "insert into image(image) values('".$image."')";
            $con =pg_connect($host, $user, $password,$dbname);

            pg_query($con,$query);
        }

    }

}

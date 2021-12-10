<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Upload Files</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
        
        body {
            background-color: #cfcfc4;
            color: black;
            margin: auto;
            margin-top: -100px;
            position: fixed;
            top: 50%;
            left: 0;
            width: 100%;
            font-weight: bolder;
        }

        a { color:black; }
        
        .Don, .Don:hover{
            color:black;
            text-decoration: none;
            font-size: 0.7em;
        }
        
       .allow{
            color:black;
            text-decoration: none;
            font-size: 0.7em;
            font-weight: bold;
        }



        </style>
</head>
<body><center>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <h2>Upload File</h2>
        <label for="fileSelect">File:</label>
        <input type="file" name="photo" id="fileSelect"><input type="submit" name="submit" value="Upload">
    </form><br>
    <h3 class="allow">Allowed extinesions: jpg, gif, png, mp4, m4v, mov, 3gp</h3>
    <br><br>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "mp4" => "video/mp4", "m4v" => "video/m4v", "mov" => "video/mov", "3gp" => "video/3gp");
        $filename = time() . '_' . $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"] / 1024;
        $filelink = "<a href=\"files/" . $filename . "\">" . "Click Here.</a>";
    
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        if(in_array($filetype, $allowed)){
            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "files/" . $filename);
                echo "<b>Your file was uploaded successfully.</b><br><br>";
                echo "File Name: " . $_FILES["photo"]["name"] . "<br>";
                echo "File Size: " . number_format($filesize, 2) . " KB<br>";
                echo "File Link: " . $filelink . "<br>";
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
echo"<br>";
?>

<footer><br><a href="https://www.buymeacoffee.com/Dopesist" class="Don"><img src="https://fhidan.com/img/SAR.png"> | Help me getting a new udemy course.</a></footer>
</center></body></html>
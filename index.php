<?php
    // $input_img = "Sample.jpg"; //Variable for input image
    // $output_img = "Output.jpg"; // Variable for output image
    // $img = imagecreatefromjpeg($input_img); // to select jpg image
    // imagejpeg($img,$output_img,90); // function for compress more high number low compress parameter(variable name which have jpeg selected
    // output image variable name, compresstion number for image compress)
    if (isset($_POST['submit'])){
        $info = getimagesize($_FILES['image']['tmp_name']);
        if (isset($info ['mime'])){
            if ($info ['mime'] == "image/jpeg") {
                $img = imagecreatefromjpeg($_FILES['image']['tmp_name']);
            }
            elseif ($info ['mime'] == "image/png") {
                $img = imagecreatefrompng($_FILES['image']['tmp_name']);
            }
            if (isset($img)){
                if (isset($img)){
                    $output_img =rand(10,100)."_output.jpg";
                    imagejpeg($img,$output_img,95);
                    $file_url=$output_img;
                    // header('Content-Type:application/image'); //download automatically code
                    // // header("Content-Transfer-Encoding:Binary"); ////download automatically code
                    // header("Content-disposition:attachment;filename=\"".basename($file_url)."\""); ////download automatically code
                    // readfile($file_url); ////download automatically code
                    
                }
            }
        }
    }
    else{
            echo "png or jpeg only";
    }
    // echo isset($_POST['downloada']);
    // if(isset($_POST['downloada'])){
    //     unlink($file_url);
        
    // // }
    // else{
    //     echo isset($_POST['downloada']);
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" required/>
        <input type="submit" name="submit"/> <br>   
    </form>
    <button><a name="downloada" download="<?php echo $file_url;?>" href=<?php echo $file_url;?>>Download</a></button>
</body>
</html>

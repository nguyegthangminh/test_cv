<?php
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}
// make a folder upload to move your file.I yhink this code is necessary to modified but right now it working correctly.
if(isset($_POST['submit']))
{
$allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma");
//echo $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$fileName = $_FILES['file']['name'];

$extension = substr($fileName, strrpos($fileName, '.') + 1); // getting the info about the image to get its extension
 
/*if ((($_FILES["file"]["type"] == "video/mp4")|| ($_FILES["file"]["type"] == "audio/mp3")|| ($_FILES["file"]["type"] == "audio/wma")|| ($_FILES["file"]["type"] == "image/pjpeg")|| ($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")) && ($_FILES["file"]["size"] < 200000) && in_array($extension, $allowedExts))*/

if(in_array($extension, $allowedExts))
  {
    // echo $fileName;die;
  if ($_FILES["file"]["error"] > 0)

    {
    
     echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    // echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    // echo "Type: " . $_FILES["file"]["type"] . "<br />";
    // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
 
    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
       // echo $_FILES["file"]["name"] . " already exists. ";
        Redirect('http://localhost/test_audio/', false);
      }
    else
      {
       move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      Redirect('http://localhost/test_audio/', false);
      
      }
    }
  }
else
  {
  echo "Invalid file";
  }
}

?>

<?php 
if (isset($_POST['add-song'])) {
    $title = $_POST['sng-title'];
    $audio = $_FILES['mp3']['name'];
    $audio_type = $_FILES['mp3']['type'];
    $audio_size = $_FILES['mp3']['size'];
    $tmp_location = $_FILES['mp3']['tmp_name'];
    $audio_url = "../uploads/".$audio;
    if ($type == '.mp3' || $type == '.wav') {
        if ($size <= 5000) {
            move_uploaded_file($tmp_location, $audio_url);  
        }
    }
    
    if (!empty($title)) {
        $sql = "insert into `tbl_songs` (`title`,`songs`) values ('$title','$audio_url')";
        $sql_run = mysql_query($sql);
        if ($sql_run) {
            $_SESSION['msg'] = "<div class='alert'>Record Saved</div>";
            header('location:songs.php');
        }
    
        else{
            $_SESSION['msg'] = "<div class='alert'>Record Cannot Saved</div>";
            header('location:add-songs.php?invalid');
        }
    }
    
    else{
        $_SESSION['msg'] = "<div class='alert'>Title Must be requiired.</div>";
        header('location:add-songs.php?invalid');
    }
}
?>
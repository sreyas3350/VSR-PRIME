<?php
include('upload.html');
// extract($_POST);
$username="root";
$pass="";
$servername="localhost";
$dbname="video";
$conn=mysqli_connect($servername,$username,$pass,$dbname);
if ($conn->connect_error) {
    die("Connection failed  : " . $conn->connect_error);
  }
  $name=$_POST['vidname'];
  $dsc=$_POST['viddesc'];
if(isset($_POST['dfile'])){
  $maxsize = 5242880; 
  
  // 5MB
  if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
    //  $name = $_FILES['file']['name'];
    // print($_FILES['file']['name']);
    // print("hello");
       $target_dir = "videos/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

       // Check extension
       if( in_array($extension,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
             $_SESSION['message'] = "File too large. File must be less than 5MB.";
          }else{
             // Upload
             if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
               // Insert record
               $query = "INSERT INTO video(video_name,video_desc,video_link) VALUES('$name','$dsc','$target_file')";
       
               mysqli_query($conn,$query);
               $_SESSION['message'] = "Upload successfully.";
             }
          }

       }else{
          $_SESSION['message'] = "Invalid file extension.";
       }
   }else{
       $_SESSION['message'] = "Please select a file.";
   }
  //  header('location: index.html');
   exit;
} 
?>

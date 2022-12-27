<?php
include 'home.html';
extract($_POST);
$username="root";
$pass="";
$servername="localhost";
$dbname="video";
$conn=mysqli_connect($servername,$username,$pass,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

$fetchVideos = mysqli_query($conn, "SELECT * FROM video ORDER BY id DESC");
  while($row = mysqli_fetch_assoc($fetchVideos)){
    if($row['video_name']==""){
      continue;
      }
    
    $name = $row['video_name'];
    $link = $row['video_link'];
    
    
    echo "<div class='video-container' style='margin-left:200px'> <iframe width='1100px' height='600px'src='$link'> </iframe>  <p style='color:black;font-size:30px;font-weight:bold;'>".$name."</p></div>";
  }

  //"';



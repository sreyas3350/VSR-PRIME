<?php
include 'index.html';
extract($_POST);
$username="root";
$pass="";
$servername="localhost";
$dbname="video";
$conn=mysqli_connect($servername,$username,$pass,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
$search = strtolower($search);
$sql="select * from video where video_name ='$search'";
$res=$conn->query($sql);
if ($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        // echo $row['id']. " &nbsp;" .  $row['video_name'] ."&nbsp; ".$row['video_link'];

        $link = $row['video_link'];
        $desc = $row['video_desc'];
    }
    echo "<div class='video-container'> <iframe width='1480' height='650'src='$link'> </iframe>   <p style='width:420px;'>".$desc."</p></div>";
}  
else{
    echo "Video not found!";
}

?>

<?php 
 $con=mysqli_connect('localhost','root','','like_dislike');
 $type=$_POST['type'];
 $id=$_POST['id'];
    if($type == 'like') {
        $sql="UPDATE users set like_count=like_count+1 where id=$id";
    } else {
        $sql="UPDATE users set dislike_count=dislike_count+1 where id=$id";
    }
 $res=mysqli_query( $con,$sql);
?>


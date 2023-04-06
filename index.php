<?php 
 $con=mysqli_connect('localhost','root','','like_dislike');
 $sql="SELECT * FROM users";
 $res=mysqli_query( $con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Like Dislike Button Using Ajax</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>PHP Request</h1>
        <?php while($row = mysqli_fetch_assoc($res)) {?>
        <div class="row main_box">
            <div class="col sm-8 title">
                <h3><?php echo $row['post']; ?></h3>
            </div>
            <div class="col-sm-2">
                <a href="javascript:void(0)" class="btn btn-info btn-large">
                    <span class="glyphicon glyphicon-thumbs-up" onclick="like_update('<?php echo $row['id']; ?>')">Like (<span id="like_loop_<?php echo $row['id']; ?>"><?php echo $row['like_count']; ?></span>)</span>
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:void(0)" class="btn btn-info btn-large">
                    <span class="glyphicon glyphicon-thumbs-down" onclick="dislike_update('<?php echo $row['id']; ?>')">Unlike(<span id="dislike_loop_<?php echo $row['id']; ?>"><?php echo $row['dislike_count']; ?></span>)</span>
                </a>
            </div>
        </div>
        <?php } ?>
    </div>
    <script>
        function like_update(id) {
            jQuery.ajax({
                url: 'update_count.php',
                type: 'post',
                data: 'type=like&id='+id,
                success: function(result){     
                    var cur_count = jQuery('#like_loop_'+id).html();
                    cur_count++;
                    jQuery('#like_loop_'+id).html(cur_count);              
                }
            });
        }

        function dislike_update(id) {
            jQuery.ajax({
                url: 'update_count.php',
                type: 'post',
                data: 'type=dislike&id='+id,
                success: function(result){  
                    var cur_count = jQuery('#dislike_loop_'+id).html();
                    cur_count++;
                    jQuery('#dislike_loop_'+id).html(cur_count);                 
                }
            });
        }
    </script>
</body>
</html>
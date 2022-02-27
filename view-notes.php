<?php
if(isset($_POST['viewid'])){
require "connection.php";
$id = $_POST['viewid'];
$sql = "select * from notes where id='$id'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);
$url = "Notes/".$row['roll']."-".$row['stream']."-".$row['sem']."-".$row['date']."-".$row['subject']."-";

?>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $row['name'];  ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" >
    <p>Date : <?php echo $row['date'];  ?></p>
    <p>Time : <?php echo $row['time'];  ?></p>
    <div class="view">
        <?php
            $array=explode(",",$row['filename']);
            $i=0;
            foreach($array as $file){
                $i=$i+1;
                if($file=='')
                {
                    break;
                }
        ?>
    </div>
    <div class="download" style="display: flex; justify-content:center; align-items:center;">
        <a href="<?php echo $url.$file;?>" target="_blank" download="">
            <button class="btn btn-outline-success" >
                <?php 
                    $filename=explode("/",$file);
                    foreach($filename as $notes){
                        if($notes=='')
                        {
                            break;
                        }
                        else
                            $seenote=$notes;
                    }
                    echo $seenote; 
                ?>
            </button>
        </a>
    </div>
    <?php
        }
    ?>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<?php
}
else{
    header('location:index.php');
}




?>

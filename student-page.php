<?php  
if(isset($_POST['search'])){

require 'connection.php';     
$roll = $_POST['roll'];
$sql = "select * from notes where roll='$roll' order by id desc";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query) > 0){
    $q = "select * from users where roll='$roll'";
    $q1 = mysqli_query($conn,$sql);
    $res = mysqli_fetch_assoc($q1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Drive</title>
    <?php  include 'link.php';     ?>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <!-- <a class="navbar-brand">Student Drive</a> -->
            <a href="index.php" class="navbar-brand">Upload Files</a>
            <form class="d-flex" method="post" action="student-page.php">
            <input class="form-control me-2" type="search" name="roll" required style="width:170px;" placeholder="Enter Roll Number" aria-label="Search">
            <button class="btn btn-outline-success ml-2" name="search" style="width:150px;" type="submit">Search Your File</button>
            </form>
        </div>
    </nav>
    <h1 class="text-center text-danger">Hello <?php echo $res['name']; ?></h1>
    <div class="container">
        <h2 class="text-center text-primary">Your Files are here</h2>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Sl No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Stream</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Topic</th>

                    </tr>
                </thead>
                <tbody>
                <?php
                    $sl = 0;
                    while($row = mysqli_fetch_assoc($query)){
                    $sl = $sl + 1;

                ?>
                    <tr data-toggle="modal" data-target="#exampleModalCenter" data-role="view" data-id="<?php echo $row['id'];?>" style="cursor:pointer;">
                    <th scope="row"><?php echo $sl; ?></th>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['time']; ?></td>
                    <td><?php echo $row['stream']; ?></td>
                    <td><?php echo $row['sem']; ?></td>
                    <td><?php echo $row['topic']; ?></td>
                    
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="space">
        
    </div>
    <footer>
        <div class="text-center">
            This Website is developed by <strong>Ronit Singh</strong>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="view-notes">
        
        </div>
    </div>
    </div>

    <script>
        $(document).on('click','tr[data-role=view]',function(){
              // alert($(this).data('id'));
              var dataid=$(this).data('id');
              $.post('view-notes.php',{
                viewid : dataid },
                function(data,status){
                    $('#view-notes').html(data);
                })
            });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 

</body>
</html>
<?php
}
else{
echo '<script>alert("No Data Found");
    history.back();</script>';
}
}
?>
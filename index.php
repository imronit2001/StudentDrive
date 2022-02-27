<?php  require 'connection.php';     ?>
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
            <a href="#" class="navbar-brand">Upload Files</a>
            <!-- <a class="navbar-brand">Upload Files</a> -->
            <form class="d-flex" method="post" action="student-page.php">
            <input class="form-control me-2" type="search" name="roll" required style="width:170px;" placeholder="Enter Roll Number" aria-label="Search">
            <button class="btn btn-outline-success ml-2" name="search" style="width:150px;" type="submit">Search Your File</button>
            </form>
        </div>
    </nav>
    <h1 class="text-center text-danger">Hello Students</h1>
    <div class="container">
        <h2 class="text-center text-primary">Upload Your Files</h2>
        <form action="backend.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="name" required  class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">University RollNo</label>
                <input type="text" name="roll" required class="form-control" >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Stream</label>
                <?php
                    $query = "SELECT * FROM streams";
                    $result = mysqli_query($conn,$query);
                ?>
                <select name="stream" class="form-control" placeholder="Select Stream" id="stream" required  onchange="FetchSemester(this.value)"  required>
                    <option selected disabled>Select Stream</option>
                <?php
                    if (mysqli_num_rows($result) > 0 ) {
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value='.$row['id'].'>'.$row['stream'].'</option>';
                        }
                    }
                ?> 
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Semester</label>
                <select class="form-control" placeholder="Select Semester" name="sem" id="semester"  onchange="FetchSubject(this.value)"  required>
                    <option selected disabled>Select Semester</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Section</label>
                <select class="form-control" placeholder="Select Section" name="section" id="section"  onchange="FetchSubject(this.value)"  required>
                    <option selected disabled>Select Section</option>
                    <option value="Alpha">Alpha</option>
                    <option value="Beta">Beta</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Subject</label>
                <input type="text" name="subject" required class="form-control" >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Topic Name</label>
                <input type="text" name="topic" required class="form-control" >
            </div>
            <div class="mb-3">
                <input type="file" name="a[]" required class="form-control"  multiple>
            </div>
            <button type="submit" name="upload"class="btn btn-primary">Upload</button>
        </form>
    </div>
    <div class="space">
        
    </div>

    <footer>
        <div class="text-center">
            This Website is developed by <strong>Ronit Singh</strong>
        </div>
    </footer>

    <script>
        function FetchSemester(id){
            $('#semester').html('<option>Loading Semesters</option>');
            $.ajax({
            type:'post',
            url: 'backend.php',
            data : { stream_id : id},
            success : function(data){
                $('#semester').html(data);
            }

            })
        }
    </script>

</body>
</html>
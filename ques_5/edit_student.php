<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Edit</title>
</head>
<body class="container">
    <br>
    <br>
    <h1>Edit Student</h1>
    <br>
    <br>
    <?php 
            $cat_id = $_GET['id'];
            $connection = mysqli_connect('localhost','root','','exam') or die("not connected". mysqli_error());
            $query = "SELECT * FROM student WHERE Id = {$cat_id}";
            $result = mysqli_query($connection,$query) or die("Faild");
            $count = mysqli_num_rows($result);

            if($count > 0){
                while($row = mysqli_fetch_assoc($result)){

        ?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off" class="container">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input name="name" value="<?php echo $row['Names'] ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Age</label>
    <input name="age" value="<?php echo $row['Age'] ?>" type="number" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Section</label>
    <input name="section" value="<?php echo $row['Section'] ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
<?php 
                                }
                            
                            }
                        ?>




<?php 
                
                    if(isset($_POST['submit'])){

                        $connection = mysqli_connect('localhost','root','','exam') or die("not connected". mysqli_error());
                        $cat_id = $_GET['id'];
                        $name = mysqli_real_escape_string($connection,$_POST['name']);
                        $age = mysqli_real_escape_string($connection,$_POST['age']);
                        $section = mysqli_real_escape_string($connection,$_POST['section']);
                         
                        $query = "UPDATE student SET Names = '{$name}', Age = '{$age}' ,Section='{$section}' WHERE Id= '{$cat_id}' ";
                        $result = mysqli_query($connection,$query) or die("Query Faild");
                        if($result){
                            header("location: user.php");
                        }else{
                            echo "cant be updated";
                        }

                    }
                
                
                ?>
</body>
</html>
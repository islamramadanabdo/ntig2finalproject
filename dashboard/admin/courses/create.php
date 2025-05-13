


<?php  
session_start();
if( isset($_SESSION['role']) &&  $_SESSION['role'] == 'admin' ) {  ?>



<?php

  // include database
  include '../../../database/db.php';




  // add new course
    if(  isset($_POST['btn'])  ){

      $name = trim($_POST['name']);
      $cost = $_POST['cost'];
      $hourse = $_POST['hourse'];

      $imageName = $_FILES['image']['name'];
      $extention = strtolower(pathinfo($imageName , PATHINFO_EXTENSION));

      $newImageName = time() . '.' . $extention;

      $targetFile = __DIR__ . "/../../../uploads/" . $newImageName;
      
      move_uploaded_file(  $_FILES['image']['tmp_name'] , $targetFile  );



      $errors = [];

      if(empty($name) ){
        $errors[] = "Please Enter Name";
      }else if(strlen($name) < 3 ){
        $errors[] = "Name Should be Greater than 3 Character";
      }

      if(  $cost < 0 || $cost > 9000   ){
        $errors[] = "Cost Should be Greater than 0 And Less Than 9000 LE";
      }

      if(  $hourse < 1 || $hourse > 11  ){
        $errors[] = "Hourse Should be Greater than 0 And Less Than 11 hourse";
      }


      if(  empty($errors)  ){
        $insertQuery = "INSERT INTO courses VALUES(NULL , '$name' , $hourse , $cost , '$newImageName')";
        $insertStatus = mysqli_query($GLOBALS['conn'], $insertQuery);
      }else{
        foreach(  $errors as $error  ){
            echo " <div class='alert alert-danger w-50 mx-auto'>  {$error}  </div>      ";
        }
      }



    }




?>






<!-- code html  -->
<?php  
    include_once  '../../includes/style.php';
    include_once '../../includes/navbare.php';
    include_once '../../includes/sidebare.php';
?>

      <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Create Course</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Courses</a></div>
              <div class="breadcrumb-item">Create</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Create Course</h2>
            <p class="section-lead">
                Add Your New Course And Be Carfull For Data 
            </p>

            <div class="row justify-content-center">
              <div class="col-8 col-md-8 col-lg-8">
                <div class="card">
                  <form accept="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" >
                      </div>
                      <div class="form-group">
                        <label>Cost</label>
                        <input type="number" min="0"  class="form-control" name="cost" >
                      </div>
                      <div class="form-group">
                        <label>Hourse</label>
                        <input type="number" min="1" max="10" name="hourse" class="form-control" >
                      </div>
                      <div class="form-group">
                        <label>Course Image</label>
                        <input type="file"  name="image" class="form-control" >
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type="submit" name="btn">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
      
<?php  
    include_once '../../includes/footer.php';
    include_once '../../includes/scripts.php';
?>

    


<?php }else{

header('location: /ntig2test/auth/login.php');

} ?>

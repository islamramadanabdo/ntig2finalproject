
<?php  
  session_start(); 
  if( isset($_SESSION['role']) &&  $_SESSION['role'] == 'instructor' ) {  ?>

<?php

  // include database
  include '../../../database/db.php';




  // add new course
    if(  isset($_POST['btn'])  ){

      $name = $_POST['name'];
      $cost = $_POST['cost'];
      $hourse = $_POST['hourse'];

      $insertQuery = "INSERT INTO courses VALUES(NULL , '$name' , $hourse , $cost);";
      $insertStatus = mysqli_query($GLOBALS['conn'], $insertQuery);

      // var_dump( $insertStatus );

      if($insertStatus){

          $query = " SELECT * FROM courses where name = '$name' and cost= $cost and hourse = $hourse ";
          $course = mysqli_query($GLOBALS['conn'] ,  $query);

          $data = mysqli_fetch_assoc($course);
          $id = $data['id'];
          $instructorId = $_SESSION['id'];

          $realationQuery = "  INSERT INTO instrcutor_courses VALUES(NULL , $id , $instructorId )   ";
          $relationResult = mysqli_query($GLOBALS['conn'] , $realationQuery);

      }


    }




?>






<!-- code html  -->
<?php  
    include_once  '../../includes/style.php';
    include_once '../../includes/navbare.php';
    include_once '../../includes/sidebareInstructor.php';
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
                  <form accept="" method="POST">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required="">
                      </div>
                      <div class="form-group">
                        <label>Cost</label>
                        <input type="number" min="0"  class="form-control" name="cost" required="">
                      </div>
                      <div class="form-group">
                        <label>Hourse</label>
                        <input type="number" min="1" max="10" name="hourse" class="form-control">
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
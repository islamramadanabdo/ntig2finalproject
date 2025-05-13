<?php  
session_start();
if( isset($_SESSION['role']) &&  $_SESSION['role'] == 'admin' ) {  ?>

<?php

  // include database
  include '../../../database/db.php';


    // get id from url and get course
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];

        $selectOneCourse = "SELECT * FROM courses WHERE id = $id";
        $result = mysqli_query($GLOBALS['conn'] , $selectOneCourse);

        $count = mysqli_num_rows($result);
        if($count > 0){
            $obj = mysqli_fetch_assoc($result);
        }
    }


    // update course
    if(isset($_POST['btn'])){

        $id = $_POST['id'];
        $name = $_POST['name'];
        $cost = $_POST['cost'];
        $hourse = $_POST['hourse'];

        $updateQuery = " UPDATE courses  SET name = '$name' , cost = $cost , hourse = $hourse WHERE id = $id ";
        $updateResult = mysqli_query($GLOBALS['conn'] , $updateQuery);

        if($updateResult){
            header(header: "location: /ntig2test/dashboard/admin/courses/list.php");
        }else{
            echo  `
                <div class="alert alert-danger"> Update False   </div>
            `;
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
            <h1>Update Course</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Courses</a></div>
              <div class="breadcrumb-item">Update</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Update Course</h2>
            <p class="section-lead">
                Update Your Course And Be Carfull For Data 
            </p>

            <div class="row justify-content-center">
              <div class="col-8 col-md-8 col-lg-8">
                <div class="card">
                  <form accept="" method="POST">
                    <input type="number" hidden   value="<?php  echo  $obj['id'] ?>"  name="id" >
                    <div class="card-body">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" value="<?php  echo  $obj['name'] ?>" name="name" required="">
                      </div>
                      <div class="form-group">
                        <label>Cost</label>
                        <input type="number" min="0"  class="form-control" value="<?php  echo  $obj['cost'] ?>" name="cost" required="">
                      </div>
                      <div class="form-group">
                        <label>Hourse</label>
                        <input type="number" min="1" max="10" name="hourse" value="<?php  echo  $obj['hourse'] ?>" class="form-control">
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type="submit" name="btn">Update</button>
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


<?php  
  session_start(); 


  if( isset($_SESSION['role']) &&  $_SESSION['role'] == 'instructor' ) {  ?>

<?php

  // include database
  include '../../../database/db.php';


    // get id from url and get course
    if(isset($_GET['show'])){
        $id = $_GET['show'];

        $selectOneCourse = "SELECT * FROM courses WHERE id = $id";
        $result = mysqli_query($GLOBALS['conn'] , $selectOneCourse);

        $count = mysqli_num_rows($result);
        if($count > 0){
            $obj = mysqli_fetch_assoc($result);

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
            <h1>Show Course</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Courses</a></div>
              <div class="breadcrumb-item">Show</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Show Course</h2>
            <p class="section-lead">
                Show Your Course And Be Carfull For Data 
            </p>

            <div class="row justify-content-center">
              <div class="col-8 col-md-8 col-lg-8">
                <div class="card">
                  
                <div class="card">
                    <div class="card-header">
                      <h4>  Course Name: <?php  echo $obj['name']    ?>  </h4>
                    </div>
                    <div class="card-body">
                      Course Cost: <?php    echo $obj['cost']    ?>
                    </div>
                    <div class="card-footer">
                    Course hourse : <?php  echo $obj['hourse']    ?>
                    </div>
                </div>


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

<?php  
  session_start(); 


  if( isset($_SESSION['role']) &&  $_SESSION['role'] == 'instructor' ) {  ?>

<?php
// include database
    include '../../../database/db.php';


    
    // select all courses
    $id = $_SESSION['id'];
    $selectQuery = "SELECT * from courses INNER JOIN instrcutor_courses on courses.id = instrcutor_courses.courses_id where instrcutor_courses.instructor_id = $id";
    $selectResult = mysqli_query($GLOBALS['conn']  , $selectQuery);


    // delete
    // if(isset($_POST['delete'])){
    //   $id = $_POST['id'];

    //   $deleteQuery = "DELETE FROM courses WHERE id  = $id";
    //   $deleteResult = mysqli_query($GLOBALS['conn'] , $deleteQuery);

    //   if($deleteResult){
    //     header(header: "location: /ntig2test/dashboard/admin/courses/list.php");
    //   }else{
    //       echo  `
    //           <div class="alert alert-danger"> Delete False   </div>
    //       `;
    //   }

    // }
?>


<!-- include html code -->
<?php 
    include_once  '../../includes/style.php';
    include_once '../../includes/navbare.php';
    include_once '../../includes/sidebareInstructor.php';
?>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>List All Courses</h1>
                <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Courses</a></div>
                <div class="breadcrumb-item">List All</div>
                </div>
            </div>

        <div class="section-body">
            <h2 class="section-title">All Courses</h2>
                <p class="section-lead">
                    Add Your New Course And Be Carfull For Data 
                </p>
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Cost</th>
                          <th>Hourse</th>
                          <th>Action</th>
                        </tr>

                        <?php foreach( $selectResult as $item  ){  ?>
                            <tr>
                                <td> <?php echo $item['id'] ?> </td>
                                <td> <?php echo $item['name'] ?> </td>
                                <td> <?php echo $item['cost'] ?> </td>
                                <td> <?php echo $item['hourse'] ?> </td>
                                <td>
                                  <!-- <form  style="display: inline-block; " action="" method="POST">
                                        <input type="text" name="id" hidden value="<?php echo $item['id']  ?>">
                                        <button class="btn btn-danger " name="delete" >Delete</button>
                                  </form> -->

                                  <a href="/ntig2test/dashboard/instructor/courses/edit.php?edit=<?php echo $item['courses_id']  ?>" class="btn btn-primary">Edit</a>
                                  <a href="/ntig2test/dashboard/instructor/courses/show.php?show=<?php echo $item['courses_id']  ?>" class="btn btn-info">Show</a>
                                </td>
                            </tr>
                        <?php } ?>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
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
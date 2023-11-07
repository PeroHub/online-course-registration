<?php 
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

$user_reg_no =  $user_data['reg_no'];


$RegisterdLevel = $user_data['reg_no'];
$outcome = "";
$registerd = false;
$selectedCourse = '';


$registerdCourse = "";

$reg_no = "";
$course_code = "";
$course_title = "";
$level = "";
$semester = "";
$unit= "";
$approved = "";

$inputValue = 0;



if (isset($_POST["submit_form"])) {
    if (isset($_POST['course_checkboxes'])) {
        // Loop through the selected courses
        foreach ($_POST['course_checkboxes'] as $course_code) {
            $mstudb = "select * from master_course_db where course_code = '$course_code' ";
            $m_db_con_result = mysqli_query($con, $mstudb);
            $num_rows = $m_db_con_result->num_rows;
            if($num_rows>0){
                // ?>
                //      <script type="text/javascript">
                //         var sam = 1;
                //         alert("working")
                //         var sessionValue = sessionStorage.setItem("mySessionVariable", sam);
                //     </script>';
                // <?php
                while($row = $m_db_con_result->fetch_assoc()){
                    $reg_no = $user_data['reg_no'];
                    $course_code = $row['course_code'];
                    $course_title = $row['course_title'];
                    $level = $row['level'];
                    $semester = $row['semester'];
                    $unit = $row['Unit'];
                    $approved = $row['approved'];
                    // $registerdCourse = $row;
                    $registeredQuery = "insert into student_registered_course (reg_no, course_code, course_title, level, semester, approved, unit) values ('$reg_no','$course_code', '$course_title', '$level', '$semester', '$approved', '$unit')";
                    mysqli_query($con, $registeredQuery);
                    // $inputValue = 1;
                    
                    header("Location: registration.php");
                }
                
            }else {
                echo "Something went wrong";
            } 
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="shortcut icon" href="./images/logo.png">
    <link rel="stylesheet" href="style.css">

    

    <style>
        /* header{position: relative;} */
        .exam{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 80vh;
            width: 80%;
            margin: auto;
        }

        .special:hover {
            color: red;
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">
            <!-- <img src="./images/logo.png" alt=""> -->
            <h2>U<span class="danger">M</span>S</h2>
        </div>
        <div class="navbar">
            <a href="index2.php">
                <!-- <span class="material-icons-sharp">home</span> -->
                <h3>Home</h3>
            </a>
            <!-- <a href="timetable.html" onclick="timeTableAll()">
                <span class="material-icons-sharp">today</span>
                <h3>Time Table</h3>
            </a>  -->
            <!-- <a href="exam.html" class="active">
                <span class="material-icons-sharp">grid_view</span>
                <h3>Examination</h3>
            </a> -->
            <!-- <a href="password.html">
                <span class="material-icons-sharp">password</span>
                <h3>Change Password</h3>
            </a> -->
            <a href="logout.php">
                <!-- <span class="material-icons-sharp">logout</span> -->
                <h3>Logout</h3>
            </a>
        </div>
        <!-- <div id="profile-btn" style="display: none;">
            <span class="material-icons-sharp">person</span>
        </div>
        <div class="theme-toggler">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
        </div> -->
    </header>

    <main style="width: 50%; margin: 0 auto; margin-top: 50px; box-shadow: 0 2rem 3rem rgba(132, 139, 200, 0.18); border-radius: 2rem; padding: 15px;">
        <div class="">
            <h2 style="text-align: center; margin-bottom: 40px;">Register Courses</h2>
            <form method="post">
                <section style="display: flex; align-items: center; justify-content: space-between;">
                    <div style="width: 30%;">
                        <div>
                            <label for="country">Session:</label>
                        </div>
                        <div>
                            <select name="session" id="session" style="width: 100%;">
                                <option value="India">2022-2023</option>
                            </select>
                        </div>
                    </div>
    
                    <div style="width: 30%;">
                        <div>
                            <label for="semester">Select Semester:</label>
                        </div>
                        <div>
                            <select name="semester" id="semester" style="width: 100%;">
                                <option value="">Select Semester</option>
    
                                <option value="First" <?php if ($selectedCourse == 'First') echo 'selected'; ?>>First Semester</option>
                                <option value="Second" <?php if ($selectedCourse == 'Second') echo 'selected'; ?>>Second Semester</option>
                            </select>
                        </div>
                    </div>
    
                    <div style="width: 30%;">
                        <div>
                            <label for="">Level</label>
                        </div>
                        <div>
                            <input style="width: 100%;" disabled type="text" value="<?php echo strtoupper($user_data['level']); ?>">
                        </div>
                    </div>
                </section>

                <div class="button">
                    <input <?php if ($selectedCourse == 'First') echo 'disabled'; ?> style="height: 25px; width: 20%; margin-top: 10px; margin-bottom: 30px; font-size: 14px; border-radius: 5px; color: #fff; background-color: #7380ec; border: none; display: flex; justify-content:center; align-items: center;" name="submit_semester"  type="submit" value="Submit">
                </div>
            </form>
        </div>

       

        <section  style="display: block; justify-content: space-between;">
        <form method="post">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $semester = isset($_POST['semester']) ? $_POST['semester'] : '';
                $level = $user_data['level'];
            
                if (!empty($semester) && !empty($level)) {
                    $query = "select * from master_course_db where semester = '$semester' and level = '$level'";
                    $result = mysqli_query($con, $query);
            
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <section>
                                <div>
                                    <div style="display: flex;">
                                        <p style="margin: 10px 20px 3px;">
                                            <?= $row['course_title'] ?>
                                        </p>
                                        <input name="course_checkboxes[]" type="checkbox" value="<?= $row['course_code'] ?>">
                                    </div>
                                </div>
                            </section>
                            <?php
                        }
                    }
                } else {
                    return;  // You may want to handle this error case more gracefully.
                }
            }
            
            ?>

            <?php if(isset($_POST['submit_semester'])): ?>
                <input type="submit"  name="submit_form" value="Submit" style="height: 25px; width: 20%; margin-top: 10px; margin-bottom: 30px; font-size: 14px; border-radius: 5px; color: #fff; background-color: #7380ec; border: none; display: flex; justify-content:center; align-items: center;">
                <input type="text"  value="<?php echo $inputValue; ?>">
            <?php else : ?>

            <?php endif; ?>
        </form>
            

        </section>
    </main>
</main>
<section>
    

    <section id="sectionToPrint" style="width: 50%; margin: 50px auto;">
        <section>
            <h2>Heritage Polytechnic, Eket</h2>
            <h3 style="margin-top: 10px;">OFFICE OF THE REGISTRAR</h3>
            <p style="margin-top: 10px;">COURSE REGISTRATION FORM</p>
        </section>
        <section>
            <div style="margin-top: 10px; margin-bottom: 30px;">
                <span>Surname: <?php echo $user_data['sur_name'], ", ", $user_data['first_name'], " ", $user_data['middle_name']; ?></span>
                <span></span>
            </div>
        </section>
        <?php 
            $queryRegister = "select * from  student_registered_course where reg_no = '$RegisterdLevel'";
            $queryResult = mysqli_query($con, $queryRegister);
            $reg_num_rows = $queryResult->num_rows;            
            if($reg_num_rows > 0)
            {
                $registerd = true;
                while ($row = $queryResult->fetch_assoc()) {
                    $outcome = $row;
                    ?>
                        <div style="display: flex; width: 50%; justify-content: space-between;">
                            <div>
                                <span><?php echo $row['course_title'] ?></span>
                            </div>
                            <div>
                                <span style="text-align: center; color: green; font-size: 14px; margin-right: 20px;">Registered</span>
                            </div>
                        </div>
                    <?php
                }
            }else {
                $registerd = false;
            
            }
        ?>

</section>

        <div style="width: 50%; margin: 0 auto;">
            <?php if($registerd) : ?>
                    <p onclick="printDoc()" style="height: 25px; width: 20%; margin-top: 10px; margin-bottom: 30px; margin-left: 100px; font-size: 14px; border-radius: 5px; color: #fff; background-color: red; border: none; display: flex; justify-content:center; align-items: center;">Print </p>
                <?php else : ?>
                    <p style="color: red;">You have not registered for any course yet</p>
            <?php endif; ?>
            </div>
</section>


<script>
var retrievedValue = sessionStorage.getItem("mySessionVariable");
var inputElement = document.getElementById("myInput");
console.log(retrievedValue)
if(retrievedValue == 1){
    printDoc()
}else {
    console.log("error oh")
}
        function printDoc() {
            
               // Get the section to print
               var section = document.getElementById("sectionToPrint");
               // Clone the section
               var sectionClone = section.cloneNode(true);
               // Create a new window for printing
               var printWindow = window.open('', '', 'width=600');
               // Append the cloned section to the new window
               printWindow.document.body.appendChild(sectionClone);
               // Call the print function on the new window
               printWindow.print();
               // Close the new window after printing
               printWindow.close();
           
        }
    </script>
</body>

</html>

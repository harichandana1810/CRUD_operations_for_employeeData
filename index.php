<?php 
    require_once('./config/dbconfig.php'); 
    $db = new operations();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta  content="0; url=view.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style type="text/css">
        @keyframes hover {
        50% {
            transform: translateY(-3px);
        }

        100% {
            transform: translateY(-6px);
        }
    }
    b{
        text-align: right;
    }

    </style>
    <title>Crud Operation in Php Using OOP</title>
</head>

<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <h2 class="text-center text-dark"> Employees Record </h2>
                    <b><a rel="hover" class="button_hover" href="view.php">Home</a></b>
                    <div class="card-header">
                        
                        <h2> Fill Employee Details </h2>

                    </div>
                        <?php $db->Store_Record(); ?>
                        <div class="card-body">
                            <form method="POST">
                                <input type="text" name="FirstName" placeholder=" First Name" class="form-control mb-2" required>
                                <input type="text" name="LastName" placeholder=" Last Name" class="form-control mb-2" required>
                                <input type="Email" name="Email" placeholder=" User Email" class="form-control mb-2" required>
                                <b>Gender:</b><br>
                                <input type="radio" name="Gender" <?php if (isset($Gender) && $Gender=="female") echo "checked";?> value="female">Female<br>
                                <input type="radio" name="Gender" <?php if (isset($Gender) && $Gender=="male") echo "checked";?> value="male">Male<br>
                                <input type="radio" name="Gender" <?php if (isset($Gender) && $Gender=="other") echo "checked";?> value="other">Other<br>  
                                <br>
                                <b>Hobbies:</b><br>
                                <input type="checkbox" name="Hobbies[]" value="TV" id="TV">
                                    <label for="TV"> Watching TV</label><br>
                                <input type="checkbox" name="Hobbies[]" value="Reading" id="Reading">
                                    <label for="Reading">Reading</label><br>
                                <input type="checkbox" name="Hobbies[]" value="Coding" id="Coding">
                                    <label for="Coding">Coding</label><br>
                                <input type="checkbox" name="Hobbies[]" value="Skilling" id="Skilling">
                                    <label for="Skilling">Skilling</label><br>
                                <input type="checkbox" name="Hobbies[]" value="Others" id="Others">
                                    <label for="Others">Others</label><br>
                                <br>
                                <b>Joining Date:<b><input type="date" name="JoiningDate" max="2021-09-23" class="form-control mb-2" required>
                                <label for="Department"><b>Department</b></label>
                                <select name="Department" id="Department">
                                    <option>None</option>
                                    <option value="HR">HR</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Production">Production</option>
                                </select>
                                <div>
                                    <label for="Picture"><b>Upload Picture</b></label>
                                    <input type="file" name="Picture" accept="image/*">
                                </div>
                        </div>
                    <div class="card-footer">
                            <button class="btn btn-success" name="btn_save"> Save </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

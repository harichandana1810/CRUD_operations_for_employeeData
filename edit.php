<?php 
    require_once('./config/dbconfig.php'); 
    $db = new operations();
    $db->update();
    $id = $_GET['id'];
    $result = $db->get_record($id);
    $data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Crud Operation in Php Using OOP</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2> Update Record </h2>
                    </div>
                        <?php $db->update(); ?>
                        <div class="card-body">
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                <input type="text" name="FirstName" placeholder=" First Name" class="form-control mb-2" required value=
                                "<?php echo $data['FirstName']; ?>" >
                                <input type="text" name="LastName" placeholder=" Last Name" class="form-control mb-2" required value="<?php echo $data['LastName']; ?>" >
                                <input type="Email" name="Email" placeholder=" User Email" class="form-control mb-2" required value="<?php echo $data['Email']; ?>" >
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
                                <input type="date" name="JoiningDate" value="2021-07-09" min="2021-09-09" max="2021-09-23" class="form-control mb-2" value="<?php echo $data['JoiningDate']; ?>">
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
                                    <input type="file" name="Picture" accept="image/*" class="form-control mb-2" value="<?php echo $data['Picture'] ?>">
                                </div>
                        </div>
                    <div class="card-footer">
                            <button class="btn btn-success" name="btn_update"> Update </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

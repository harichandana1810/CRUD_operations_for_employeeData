<?php 

    
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class operations extends dbconfig
    {
        // Insert Record in the Database
        public function Store_Record()
        {
            global $db;
            if(isset($_POST['btn_save']))
            {
                $FirstName = $db->check($_POST['FirstName']);
                $LastName = $db->check($_POST['LastName']);
                $Email = $db->check($_POST['Email']);
                $Hobbies = implode(',', $_POST['Hobbies']);
                if(isset($_POST['submit']))
                {    
                    $query="INSERT INTO crud VALUES ('" . $checkBox . "')";     
                    mysql_query($query) or die (mysql_error() );
                    echo "Complete";
                }
                $Gender = $db->check($_POST['Gender']);
                $JoiningDate = $db->check($_POST['JoiningDate']);
                $Department = $db->check($_POST['Department']);
                $Picture = $db->check($_POST['Picture']);

                if($this->insert_record($FirstName,$LastName,$Email,$Hobbies,$Gender,$JoiningDate,$Department,$Picture))
                {
                    echo '<div class="alert alert-success"> Your Record Has Been Saved :) </div>';
                }
                else
                {
                    echo '<div class="alert alert-danger"> Failed </div>';
                }
            }
        }

        // Insert Record in the Database Using Query    
        function insert_record($FirstName,$LastName,$Email,$Hobbies,$Gender,$JoiningDate,$Department,$Picture)
        {
            global $db;
            $query = "insert into crud (FirstName,LastName,Email,Hobbies,Gender,JoiningDate,Department,Picture) values('$FirstName','$LastName','$Email','$Hobbies','$Gender','$JoiningDate','$Department','$Picture')";
            $result = mysqli_query($db->connection,$query);

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }


        // View Database Record
        public function view_record()
        {
            global $db;
            $query = "select * from crud";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }

        // Get Particular Record
        public function get_record($id)
        {
            global $db;
            $sql = "select * from crud where id='$id'";
            $data = mysqli_query($db->connection,$sql);
            return $data;

        }

        // Update Record
        public function update()
        {
            global $db;

            if(isset($_POST['btn_update']))
            {
                $id = $_POST['id'];
                $FirstName = $db->check($_POST['FirstName']);
                $LastName = $db->check($_POST['LastName']);
                $Email = $db->check($_POST['Email']);
                $Hobbies = implode(',', $_POST['Hobbies']);
                if(isset($_POST['submit']))
                {    
                    $query="INSERT INTO crud VALUES ('" . $checkBox . "')";     
                    mysql_query($query) or die (mysql_error() );
                    echo "Complete";
                }
                $Gender = $db->check($_POST['Gender']);
                $JoiningDate = $db->check($_POST['JoiningDate']);
                $Department = $db->check($_POST['Department']);
                $Picture = $db->check($_POST['Picture']);

                if($this->update_record($id,$FirstName,$LastName,$Email,$Hobbies,$Gender,$JoiningDate,$Department,$Picture ))
                {
                    $this->set_messsage('<div class="alert alert-success"> Your Record Has Been Updated : )</div>');
                    header("location:view.php");
                }
                else
                {   
                    $this->set_messsage('<div class="alert alert-success"> Something Wrong : )</div>');
                }

               
            }
        }

        // Update Function 2
        public function update_record($id,$FirstName,$LastName,$Email,$Hobbies,$Gender,$JoiningDate,$Department,$Picture )
        {
            global $db;
            $sql = "update crud set FirstName='$FirstName', LastName='$LastName', Email='$Email', Hobbies='$Hobbies', Gender='$Gender', JoiningDate='$JoiningDate', Department='$Department', Picture='$Picture' where id='$id'";
            $result = mysqli_query($db->connection,$sql);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }



        // Set Session Message
        public function set_messsage($msg)
        {
            if(!empty($msg))
            {
                $_SESSION['Message']=$msg;
            }
            else
            {
                $msg = "";
            }
        }
        

        // Display Session Message
        public function display_message()
        {
            if(isset($_SESSION['Message']))
            {
                echo $_SESSION['Message'];
                unset($_SESSION['Message']);
            }
        }

        // Delete Record
        public function Delete_Record($id)
        {
            global $db;
            $query = "delete from crud where id='$id'";
            $result = mysqli_query($db->connection,$query);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
?>

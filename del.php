<?php 

    require_once('./config/dbconfig.php');
    $db = new operations();
    
    if(isset($_GET['id']))
    {
        global $db;
        $id = $_GET['id'];

        if($db->Delete_Record($id))
        {
            $db->set_messsage('<div class="alert alert-danger">  Your Record Has Been Deleted </div>');
            header("location:view.php");
        }
        else
        {
            $db->set_messsage('<div class="alert alert-danger">  Something Wrong to Delete the Record </div>'); 
        }
        
    }


?>

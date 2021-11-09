

<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['add']))
{
$leavetype=$_POST['leavetype'];
$description=$_POST['description'];
$sql="INSERT INTO tblleavetype(LeaveType,Description) VALUES(:leavetype,:description)";
$query = $dbh->prepare($sql);
$query->bindParam(':leavetype',$leavetype,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Leave type added Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}

    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Add Leave Type</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet"> 
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
  <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
    </head>
    <body>
  <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>










<div class="container">
        <div class="">
            <div class="">
                <h2></h2>
            </div>
            

<tr>
 <td colspan="5">

 <a class="modal-trigger waves-effect waves-light btn" href="#modal1">Add&nbsp;Leave Type</a>
  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
 <form name="" method="post">

 <div id="modal1" class="modal modal-fixed-footer" style="height: 40%">

    <div class="modal-content" style="width:100%">
        <h4>Add Leave Type</h4>

 <div class="form-group">
    <label >Leave Type</label>
    <input type="text" id="leavetype" class="form-control"  placeholder="Enter leavetype 
    " name="leavetype" required>
  </div>

  <div class="form-group">
    <label >Description</label>
    <input type="text" id="description" class="form-control" 
     placeholder="Write description" name="description" required>
  </div>

      
    </div>
    <div class="modal-footer" style="width:90%">
       <input type="submit" class="waves-effect waves-light btn blue m-b-xs" name="add" value="Add">
    </div>

</div>   



</td>
</tr>

 </form>                                     </tr>


                </div>
                
            </div>
            
        </div>
        
    </div>



       
        <div class="left-sidebar-hover"></div>
   


        <!-- Javascripts -->
        
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/form_elements.js"></script>
        
    </body>
</html>
<?php } ?> 










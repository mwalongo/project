<?php ob_start();?>
<?php
include'include/header1.php';

$qry="SELECT * FROM userlogin WHERE email='$email'";

$result=mysqli_query($link,$qry);
if($result){
  $user=mysqli_fetch_array($result);
  $profile=$user['profile'];
}
$_SESSION['back']='<li style="float:left;" class="btn btn-primary"> <a href="contact.php"> <i class="fas fa-arrow-circle-left"></i> Back</a></li>';

$query="SELECT * FROM applications WHERE email='$email'";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)==1){
  $user=mysqli_fetch_array($result);
  $id=$user['id'];
  $tlpn=$user['telephone_no'];
  $addre=$user['address'];
  $oemail=$user['other_email'];
  $fx=$user['fax_no'];
  $cntry=$user['nationality'];
  $dialing=$user['dialing'];
$btn=$user['cdone'];
}
else{
    $id="";
    $tele="";
    $oemail="";
    $tlpn="";
    $fx="";
    $addre="";
    $code="";
    $dialing="";
    $btn="";

}




if($btn==1){
   $next=' <button type="submit" id="btn" class="btn btn-primary " name="next_save"> <i class="fas fa-arrow-circle-right"></i> Next </button>';


}else{
    $next="";

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AFCHPR</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/parsley.css">
    <script src="js/app.js"></script>
    <script src="js/parsley.min.js" ></script>
    <script type="text/javascript">

function validate2(vals)  {

     var R = /^[+][0-9]{12}$/;

     var t=R.exec(vals.value);

     if(!t){
document.getElementById('telephone_no').style.backgroundColor='red';
document.getElementById("btn").disabled = true;

     }
     else{
document.getElementById('telephone_no').style.backgroundColor='white';
document.getElementById("btn").disabled = false;

     }
 }

 function validate23(vals)  {
     var R = /^[+][0-9]{12}$/;
     var t=R.exec(vals.value);
     
     if(!t){
document.getElementById('telephone_no1').style.backgroundColor='red';
document.getElementById("btn").disabled = true;
     }
     else{
document.getElementById('telephone_no1').style.backgroundColor='white';
document.getElementById("btn").disabled = false;
     }
 }

</script>



<script>
$(document).ready(function(){
var i=1;
$('#add').click(function(){
  i++;
  $('#dynamic_field').append('<div class="input-icon-wrap" id="row'+i+'"> <input type="text" class="input-with-icon form-control" name="" id="telephone_no1"  onkeyup=(validate23(this)) class="form-control" placeholder="Add phone number"><span class="input-icon"><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button> </span></div>');
});

$(document).on('click','.btn_remove',function(){
  var button_id = $(this).attr("id");
  $("$row"+button_id+"").remove();
  });

$('#btn').click(function(){
  $.ajax({
    url:"name.php",
    method:"POST",
    data:$('#add_number').serialize(),
    success:function(data){
      alert(data);
      $('#add_number')[0].reset();
    }
  }); 
});
});

</script>

<style>
.input-icon-wrap {
  /* border: 1px solid #ddd;     */
  display: flex;
  flex-direction: row;
}

.input-icon {
  background: #ddd;
  cursor: pointer;
}

.input-with-icon {
  border: none;
  flex: 2;
}

.input-with-icon,.input-icon {
  padding: 0px;
}

</style>

</head>
<body style="background-color:#006940;">
<div class="container-fluid"> <?php include'include/header.php'; ?>
<!-- <h1> please fill out all your information * this are required fields </h1> -->


            <div class="col-md-2 well sidebar-header">
            <div class="well">
    <img src="profiles/<?php echo $profile;?>" alt="" class="img" width="100%;" height="100%;" style="" />
    </div>
                <?php
                include'sidebar.php';
                ?>
            </div>
            <div class="col-md-10">


            <div  class="row">
<div class="col-md-12">
<ul class="menu">
<div class="back">
</div>
<?php if(isset($_SESSION['preview'])){     echo $_SESSION['preview'];   unset($_SESSION['preview']); } ?>
<li  class="fas fa-sign-out-alt btn btn-danger">  <a href="logout.php">Logout</a> </li>
</ul>
</div>
</div>
<?php include'include/messaging/messaging.php' ?>

        <!-- .................................. all goes here -->
        <div class="well"> <b> Applicant Contacts Details </b> </div>
<form action="contact.php" method="POST" id="add_number" data-parsley-validate="">


<div class="well">

<div class="form-row">


    <div id="addInput" class="form-group col-md-3">
      <label for="inputCity">Tel. No <b class="text-danger"> * </b> </label>
   
<div class="input-icon-wrap">
  <input type="text" class="input-with-icon form-control" name="telephone_no" id="telephone_no"  onkeyup=(validate2(this)) class="form-control" placeholder="+255-456-999-898"  value="<?php echo $tlpn ;?>" >
  <span class="input-icon"><b class="btn btn-success" name="add" id="add"> Add</b></span>
</div> 
<input type="hidden"  name="number[]"  id="telephone_no">

<p id="dynamic_field"></p>

    </div>
    <div class="form-group col-md-3">
      <label for="inputState">Fax No </label>
      <input type="text" class="form-control" id="inputCity" name="fax_no" value="<?php echo $fx; ?>" placeholder="255763999898" minlength="10" >
    </div>
    <div class="form-group col-md-3">
      <label for="inputCity">Email <b class="text-danger"> * </b></label>
      <input type="email" class="form-control" id="inputCity" readonly="readonly" value="<?php echo $email; ?>" >
    </div>
    <div class="form-group col-md-3">
      <label for="inputCity">Other Email ( <i>Optional</i> ) :</label>
      <input type="email" name="otherEmail" class="form-control" id="inputCity"  value="<?php echo $oemail; ?>" >
    </div>
    </div>
    <div class="form-row">
<div class="form-group col-md-12">
    <label for="inputAddress2"> Address <b class="text-danger"> * </b> </label>
    <textarea id="textarea" rows="3" name="address" class="form-control " placeholder="P.O.Box 544354 Njombe" value="" required=""><?php echo $addre ; ?></textarea>
</div>
  </div>
</div>

<div class="form-row well">
<div class="form-group col-md-6">
<button type="submit" class="btn btn-success " id="btn" name="save"> <i class="fas fa-save"></i> SAVE </button>
</div>
<div class="form-group col-md-6">
<table class="well" align="right" width="20%">
 <tr><td><a href="personal.php" id="btn3" class="btn btn-info "> <i class="fas fa-arrow-circle-left"></i> Back </a></td>
 <td> &nbsp;&nbsp; </td>
 <td> <?php echo $next; ?> </td>
 </tr>
 </table>
</div>
</div>

<div class="form-row well">
<div class="form-group col-md-12">
<table  class="well table table-striper">
 <tr><th colspan="5" align="center"> SAVED CONTACTS</th> </tr>
 <tr> <th>Tel No:</th><th>Fax No:</th>
  <th>Email:</th><th>Other Email:</th>
   <th>Address:</th></tr>
   <tr><td><?php echo  $tlpn ;  ?> </td><td><?php echo  $fx; ?> </td><td><?php echo $email; ?> </td>
   <td> <?php echo $oemail; ?> </td> <td> <?php echo $addre; ?></td></tr>
  </tr>
 </table>
</div>
</div>


</form>
<div></div>



  </div>



</div>
</body>
</html>


<?php
include'connection.php';
if(isset($_POST['save']))
{
  $telephone_no=$_POST['telephone_no'];
  $fax_no=$_POST['fax_no'];
  $otherEmail=$_POST['otherEmail'];
  $address=$_POST['address'];
  $cdone=1;
//   $address=['address'];

// update///////////////////////////////////////

if($address!=""){
    $query="UPDATE applications SET telephone_no='$telephone_no',fax_no='$fax_no',cdone='$cdone', other_email='$otherEmail',
     address='$address',updated_at=Now() WHERE id='$id' and email='$email'";
    $result=mysqli_query($link,$query);
    if($result){

        $_SESSION['preview']='<li class="btn btn-success"> <a href="u_preview.php"> Preview</a></li>';

    $_SESSION['message_type']='info';
    $_SESSION['msg']='Contacts Informations Saved';
    header('Location:contact.php');


    }
    else{

        $_SESSION['message_type']='error';
        $_SESSION['msg']=mysqli_error($link);
        header('Location:contact.php');
    }


}
else{
    $_SESSION['message_type']='error';
    $_SESSION['msg']=' Please fill Address field ';
    header('Location:contact.php');
}




}

if(isset($_POST['next_save'])){
    $telephone_no=$_POST['telephone_no'];
    $fax_no=$_POST['fax_no'];
    $otherEmail=$_POST['otherEmail'];
    $address=$_POST['address'];
    $cdone=1;
  //   $address=['address'];

  // update///////////////////////////////////////

  if($address!=""){
      $query="UPDATE applications SET telephone_no='$telephone_no',fax_no='$fax_no',cdone='$cdone', other_email='$otherEmail',
       address='$address',updated_at=Now() WHERE id='$id' and email='$email'";
      $result=mysqli_query($link,$query);
      if($result){


      $_SESSION['message_type']='info';
      $_SESSION['msg']='Contacts Informations Saved';
      header('Location:experience.php');


      }
      else{

          $_SESSION['message_type']='error';
          $_SESSION['msg']=mysqli_error($link);
          header('Location:contact.php');
      }


  }
  else{
      $_SESSION['message_type']='error';
      $_SESSION['msg']=' Please fill Address field ';
      header('Location:contact.php');
  }




}

ob_end_flush();
?>

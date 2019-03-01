<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" message_type="text/css" href="include/messaging/messaging.css">

    
    <script  src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet">
<script>
$(document).ready(function(){
    //var minDate= new Date();

$("#to_date").datepicker({
showAnim:'drop',
nomberOfMonth:1,
// minDate:minDate,
dateFormat:'dd/mm/yy',
onclose:function(selectedDate){
    $('#to_date').datepicker("option","minDate",selectedDate);
}
});



$("#to_date").datepicker({
showAnim:'drop',
nomberOfMonth:1,
// minDate:minDate,
dateFormat:'dd/mm/yy',
onclose:function(selectedDate){
    $('#from_date').datepicker("option","minDate",selectedDate);
}
});


});
</script>

</head>
<body>
<?php



if(isset($_SESSION['msg'])){

    if($_SESSION['message_type']=='success'){
        $message_type=$_SESSION['message_type'];
        $msg=$_SESSION['msg'];
        $shout=strtoupper($message_type);
  echo "<div class='notification $message_type'><span class='strong '>$shout !</span> $msg </div>  ";       
    unset($_SESSION['msg']);
    unset($_SESSION['message_type']);
        }
     elseif($_SESSION['message_type']=='info'){
        $message_type=$_SESSION['message_type'];
        $msg=$_SESSION['msg'];
        $shout=strtoupper($message_type);
        echo "<div class='notification $message_type'> <span class='strong'>$shout !</span> $msg </div>  ";   
    unset($_SESSION['message_type']);
    unset($_SESSION['msg']);
                }
    elseif($_SESSION['message_type']=='error'){
        $message_type=$_SESSION['message_type'];
        $msg=$_SESSION['msg'];
        $shout=strtoupper($message_type);
        echo "<div class='notification $message_type'> <span class='strong'>$shout !</span> $msg </div>  ";   
    unset($_SESSION['message_type']);
    unset($_SESSION['msg']);
                }
    elseif($_SESSION['msg']=='tip'){
        $message_type=$_SESSION['message_type'];
        $msg=$_SESSION['msg'];
        $shout=strtoupper($message_type);
        echo "<div class='notification $message_type'>  <span class='strong'>$shout !</span> $msg </div>  ";   
    unset($_SESSION['message_type']);
    unset($_SESSION['msg']);
    
                }

}
else{
    echo "";
    }
    


    


?>

</body>
</html>






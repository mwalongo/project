
<?php ob_start();?>
<?php
include'include/header1.php';
$number=count($_POST["number"]);
if($number>0)
{
for($i=0; $i<$number; $i++){
    if(trim($_POST["number"][$i])!=''){

        $number=$_POST["number"][$i];
        
        $query="INSERT INTO phoneNeumbers VALUES('','$email','$number')";
       $result= mysqli_query($link, $query); 

       if($result){
        echo 'Data Inseerted';
       }
       else{
           echo mysqli_error($link);
       }

    }
}

}
else
{
echo"Enter Phone";
}

ob_end_flush();
?>
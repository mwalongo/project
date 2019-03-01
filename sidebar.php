<?php ob_start();?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AFCHPR</title>
    <script>
    function myPreview(){
        location.replace("preview.php")
    }
    </script>
    <link rel="stylesheet" type="text/css" href="include/css/cropper.css ">
    <!-- /var/www/html/afchpr/include/css/cropper.css -->
  
    <style>


 .fileContainer {
        padding: 10px;
    /* background: red;  */
    display: table;
    color:  #31708f;
    position: relative;
    overflow: hidden;
    position: relative;
}
.fileContainer [type=file] {
    display: none;
    text-align: right;
    cursor: inherit;
    /* display: block; */
    font-size: 999px;
    filter: alpha(opacity=1);
    min-height: 100%;
    min-width: 100%;
     opacity: 0; 
    position: absolute;
    right: 0;
    text-align: right;
    top: 0; 
}
    </style>
    <script type="text/javascript" src="js/custom.jquery.js"></script>
    <script type="text/javascript" src="js/cropper.js"></script>
 <script type="text/javascript"> 

$("#profile").on("change",function(e){

    
 $("#profile").cropper();

function crop(){
    $("#profile").cropper('getCroppedCanvas').toBlob(function (blob){
        var formData = new FormData();
        FormData.append('croppedImage',blob);

        $.ajax('upload.php',{
method:"POST",
data:FormData,
ProcessData:false,
contentType:false,
success:function(){
   console.log('upload sucess');
},
error:function(){
   console.log('upload error');

}
        });

    });
}

});


 </script>

 <style>
 .cropper-crop{
     display:none;
      }
      .cropper-bg{
          background:none;
      }

 </style>

</head>
<body style="background-color:#006940;">

            <!-- <img src="profiles/5b97e2f1c3ce83.53888745.png" class="img" style="width:50%"/> <br>     -->
            <form action="dashboard.php" method="POST" enctype="multipart/form-data" >
            <label class="fileContainer pull-center">
            choose Photo
    <input id="profile" type="file" name="file" class="btn btn-lg btn-block"/>
    </label>
   
  
<input onclick="crop()" type="submit" name="submit" class="btn btn-info btn-lg btn-block" value="Upload"/> <br>
<a href="dashboard.php" class="btn btn-success btn-lg btn-block" > <i class="fas fa-tachometer-alt"></i>Dashboard</a>
            

</form> 

</body>
</html>





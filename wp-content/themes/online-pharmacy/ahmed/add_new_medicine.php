<!DOCTYPE html>
<html lang="ar" xml:lang="EN " dir="LTR">
<head>
<meta charset="utf-8">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<style>
  .row{
    margin-bottom:5px;
  }
  
</style>
<style>

  .entry-title  {
    visibility: hidden;
   
}
.header-search{
  visibility: hidden;

}
</style>
</head>   


<?php
$user_id = get_current_user_id();
if ($user_id == 0) {
    echo 'You are currently not logged in.';
}
?>

<body>


  <form  method="POST"  enctype="multipart/form-data">
    <div class="form-group" >
              <input class="form-control form-control-lg" type='hidden' name='token' value="" />
                <div class="row" > 
                  <div class="col-sm-3"> <h6>medicine name </h6></div>
                  <div class="col-sm-4"> <input class="form-control form-control-lg" type="text" name="medicine_name" /> </div>
                </div>
                <div class="row" > 
                  <div class="col-sm-3"> <h6> drug concentration </h6></div>
                  <div class="col-sm-4"> <input class="form-control form-control-lg" type="number" name="concentration" /> </div>
                </div>
                <div class="row">
                    <div class="col-sm-3"> <h6>medicine picture</h6></div>
                    <div class="col-sm-4"> <input class="form-control form-control-lg" type="file" name="file" size="20"  accept=" image/* "/></div>

                </div>
                  <div class="row">
                  <div class="col-sm-8">
                  </div>
                    <div class="col-sm-2">
                  <input type="submit"  class="btn btn-primary btn-lg" value="add a new  medicine  " name="insert">
                  </div>
                  </div>
    </div>

</form>



<?php 

if( $_FILES['file']["name"] != "" ) {
  $path=$_FILES['file'][''];
  $pathto="wp-content/uploads/meds/".$path;

$temp = explode(".", $_FILES["file"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["file"]["tmp_name"],  $pathto . $newfilename);
}
elseif($_FILES["file"]["size"] == [' ']){
  $newfilename=0;
}

  #check use login
 
if(isset($_POST['insert'])):
  

   $last_edit= current_time( 'mysql' ) ;
   $medicine_name=$_POST['medicine_name'] ;
   $concentration=$_POST['concentration'] ;



global $wpdb;



$in_group_message=$wpdb->query("INSERT INTO `medicine` (`medicine_id`, `pharmacy`, `medicine_name`, `concentration`, `medicine_pic`, `added_time`)
 VALUES (NULL, '$user_id', '$medicine_name	', '$concentration', '$newfilename', '$last_edit');" );

if($in_group_message==true)
{
$state="display: inline;";
echo '<script>swal("   medicine addedd ")</script>' ;

echo "<script>location.href='http://localhost/pharmafind'</script>";

  }
  else{

     echo '<script>swal("  error in adding medicine    ")</script>' ; }
  
  endif;
  
?>










<script>
  // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2({
  dir: "rtl"
});
    
});
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    };
    $(document).ready(function(){
 $('#search').keyup(function(){
 
  // Search text
  var text = $(this).val();
 
  // Hide all content class element
  $('.content').hide();

  // Search and show
  $('.content:contains("'+text+'")').show();
 
 });
});
</script>

</html>
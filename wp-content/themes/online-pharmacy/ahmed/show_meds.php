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
    echo' <a href="https://pharmafind.global-foods.info/login" target="_blank"> login now </a>';
}
?>

<body>


<div class="row">
    <div class=col-sm-2 style=" border: 2px solid blue;
  padding: 10px;
  border-radius: 50px 20px;   background-color: blue;
"><a href="<?php echo get_site_url(); ?>/add_new_medicine" class="btn btn-bg-success" style="color:white;">add new medicine   </a>
</div>
</div>

<?php
global $wpdb;

$gr_total = $wpdb->get_results("select medicine.medicine_id , medicine.pharmacy , 
def_pharmacy.pharmacy_id , def_pharmacy.pharmacy_name , def_pharmacy.pharmacy_location , 
def_pharmacy.pharmacy_phone , medicine.medicine_name , medicine.concentration , medicine.medicine_pic ,
 medicine.added_time FROM medicine 
LEFT join def_pharmacy on def_pharmacy.pharmacy_id = medicine.pharmacy  
ORDER BY `medicine`.`added_time`  DESC");


?>
 
 <div class="container">
  <div class="row">
    <div class="col-sm-2"></div>
 <div class="col-sm-8">
  <input type='text' id='search' class="form-control form-control-lg" placeholder=' search for medicine '>
 </div>
</div>
<div class="row">


        <?php foreach($gr_total as $gr_tota): ?>
            <div class="col-md-2 content" style="margin-bottom:50px;">
      <div class="thumbnail">
        <a href="<?php echo get_site_url(); ?>/wp-content/uploads/meds/<?=$gr_tota ->medicine_pic;?>" target="_blank">
                  
<?php
if(strstr($gr_tota ->file, '.')==".pdf"){?><img src="<?php echo get_site_url(); ?>/wp-content/uploads/articles/other/pdf.png"  style="width:100px; height:100px;"><?php }
elseif(strstr($gr_tota ->file, '.')==".rar"){?><img src="<?php echo get_site_url(); ?>/wp-content/uploads/articles/other/rar.jpeg"  style="width:100px; height:100px;"><?php }
elseif(strstr($gr_tota ->file, '.')==".zip"){?><img src="<?php echo get_site_url(); ?>/wp-content/uploads/articles/other/pdf.png"  style="width:100px; height:100px;"><?php }
elseif(strstr($gr_tota ->file, '.')==".docx"){?><img src="<?php echo get_site_url(); ?>/wp-content/uploads/articles/other/word.PNG"  style="width:100px; height:100px;"><?php }
elseif(strstr($gr_tota ->file, '.')==".xlsx"){?><img src="<?php echo get_site_url(); ?>/wp-content/uploads/articles/other/excel.PNG"  style="width:100px; height:100px;"><?php }
elseif(strstr($gr_tota ->file, '.')==".pptx"){?><img src="<?php echo get_site_url(); ?>/wp-content/uploads/articles/other/powerpoint.PNG"  style="width:100px; height:100px;"><?php }
elseif(strstr($gr_tota ->file, '.')==".pptxs"){?><img src="<?php echo get_site_url(); ?>/wp-content/uploads/articles/other/powerpoint.PNG"  style="width:100px; height:100px;"><?php }
else{?><img src="<?php echo get_site_url(); ?>/wp-content/uploads/meds/<?=$gr_tota ->medicine_pic;?>"  style="width:100px; height:100px;"><?php }?>                 
                  
                 
          <div class="caption">
          <input type="text" style="display:none;" value="<?php echo get_site_url(); ?>/wp-content/uploads/articles/<?=$gr_tota ->file;?>" id="<?=$gr_tota ->upload_id;?>">
          <p style="text-align:center;" ><?=$gr_tota ->medicine_name;?> <?=$gr_tota ->concentration;?> </br> <?=$gr_tota ->pharmacy_name;?></p>
         

              </div>
        </a>
        
       
       <span> <a href="<?=$gr_tota ->pharmacy_location;?>" target="_blank"> <img src="<?php echo get_site_url(); ?>/wp-content/uploads/meds/location.png" width="50px">
  </a> </span>
       <span> <a href="tel:<?=$gr_tota ->pharmacy_phone;?>" >  <img src="<?php echo get_site_url(); ?>/wp-content/uploads/meds/call.png"  width="50px">  </a>
        </span>
      </div>
    </div>
       

    

            <?php endforeach; ?>

            </div>
  </div>
</div>







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
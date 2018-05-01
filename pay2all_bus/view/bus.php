<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bus Travel</title>
  <link href="<?=base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url();?>font-awsome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?=base_url();?>css/style.css" rel="stylesheet">
  <link href="<?=base_url();?>owl-caroswel/assets/owl.carousel.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url();?>bootstrap/css/jquery-ui.css">
  <link rel="stylesheet" href="<?=base_url();?>bootstrap/css/select.css">

  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <?php $this->load->view('includes/header'); ?>
    <section class="profiletop" style="padding: 1%;">
    <div class="container">
<div class="row">
<div class="col-md-12">
<h2 class="text-center">Bus Travelling</h2>
</div>
</div>
</div>
    </section>
<?php //echo "<pre>";print_r($stations);die; ?>

<div class="container">
<div class="row">
<div class="col-md-12">
	
							<form action="<?=base_url('GetStation/getbus');?>" method="post">
                                        
                                        <div class="form-group"  id="">
                                            <div class="col-md-3">

                                                <select class="effect-16 selectpicker" name="sourceCity"  >
                                                    <option value="">From Station</option>

                                                    <?php 
                                                    
                                                    if(isset($stations) && !empty($stations)){
                                                    foreach($stations  as $key => $station){
                                                        //echo "<pre>"; print_r($station[$key]->stationName);echo '</pre>';
                                                     ?>
                                                    <option value="<?= $station->stationName; ?>" ><?= $station->stationName; ?></option>
                                                    
                                                        
                                                    <?php }}else{ echo "NO data found";} ?>
                                                </select>
                                                <span class="focus-border"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                          <div class="col-md-3">
                                       <select class="effect-16 selectpicker" name="destinationCity">
                                       <option value=""  selected >Destenation</option>
                                             <?php 
                                                    
                                                    if(isset($stations) && !empty($stations)){
                                                    foreach($stations  as $key => $station){
                                                        //echo "<pre>"; print_r($station[$key]->stationName);echo '</pre>';
                                                     ?>
                                                    <option value="<?= $station->stationName; ?>" ><?= $station->stationName; ?></option>
                                                    
                                                        
                                                    <?php }}else{ echo "NO data found";} ?>
                                        </select>
                                      </div>
                                         </div>

                                         <div class="form-group">
                                           <!-- <label class="control-label col-md-2" for="doj">Date of Jounery</label> -->
                                         <div class="col-md-3">
                                        <div class="input-group date">
                                              <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                              </div>
                                            <input type="date" name="doj" data-date-format="yyyy-mm-dd" id="doj" class="form-control" placeholder="Offer Start Date" value="<? if(!empty($this->input->post('doj'))){echo $this->input->post('doj');}else if (!empty($records)){echo $records[0]->offerFrom;}else {echo '';}?>" required="">      
                                                                  </div>              
                                            <span class="field-validation-valid text-danger" data-valmsg-for="doj" data-valmsg-replace="true"><?php echo form_error('doj'); ?></span>
                                        </div>
                                         </div>
                                
                                        <div class="col-md-3">
                                            <div class="check-wrap">
                                              
                                                <?php
                                                if (isset($_SESSION['usr_email']) && !empty($_SESSION['usr_email']) && isset($_SESSION['is_logged'])
                                                  && !empty($_SESSION['is_logged']) && !empty($_SESSION['usr_id']) && isset($_SESSION['usr_id'])) 
                                                    {?>
                                                <input type="submit" class="btn" value="Search" style="padding: 0;">
                                                <?php }else{?><button>
                                                  <a href="#myModal" data-toggle="modal" class="login-btn">Proceed to recharge</a><?php }?>
                                                </button>
                                                 
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                

    
</div>
</div>
</div>
</div>
</div>
<?php $this->load->view('includes/footer'); ?>


<script src="<?=base_url();?>bootstrap/js/jquery-1.11.1.js"></script>
<script src="http://ewaymate.com/bootstrap/js/jquery-1.11.1.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?=base_url();?>bootstrap/js/bootstrap.min.js"></script>
</script>
    <script type="text/javascript">
    $(document).ready(function() {
        

        $(".navicon").click(function() {
            $(".mobile-menu").toggleClass("ml-menu");
            $("i", this).toggleClass("fa fa-bars fa fa-times");
        });

    });
    </script>
    

  <script >
    $(document).ready(function() {
    $("button[name$='edit_show']").click(function() {
        var test = $(this).val();

        $("div.profileText").hide();
        $("#personal" + test).show();
    });
});

    $('#doj').datepicker({
      autoclose: true,
       dateFormat: 'yy-mm-dd'
    });
</script>
</body>

</html>
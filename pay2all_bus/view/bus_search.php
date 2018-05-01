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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>

  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      .bus-card{
   border: solid 1px #ccc ;
    float: left ;
    width: 100% ;
    padding: 20px ;
    margin-top: 25px;
     margin-bottom: 25px;

}
  .bus-card .subtitle{background: #23d160;
    color: #FFF;
    padding: 5px;
    border-radius: 5px;} 
   .bus-card a:hover{color: #f8b703} 
    </style>
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
      <?php //echo "<pre>";print_r($results[0]->inventoryType);print_r($formdatas['sourceCity']);die; ?>

      <div class="container">
        <div class="row">
          
          <?php if(isset($results) && !empty($results)){
          foreach ($results as $key => $result) {
            //echo "<pre>";
            //print_r($result->droppingPoints);die;
            
           ?> 
           <form method="POST" action="<?=base_url('GetStation/getbuslayout');?>" >
           <div class="col-md-12">
            <div class="bus-card">
                  <div class="col-md-3">
                   <h4><?= $result->operatorName;?><br><?= $result->busType;?></h4></div>
                     <div class="col-md-3">
                      <span> <?= $result->departureTime;?> - <?= $result->arrivalTime;?></span><br>
                      <!-- <a href="#">Boarding &amp; Dropping Points</a> -->
                    </div>
                    <?php foreach ($result->boardingPoints as $key => $boarding) {
                      //print_r($boarding);die;
                      //$boarding = array();
                      //echo "<input type='hidden' name='{$boardingPoints}[]' value='" . implode($boarding) . "' />";
                      echo '<input  name="boarding['.$key.'][id]" type="hidden" value="'. $boarding->id.'" />';
                      echo '<input  name="boarding['.$key.'][location]" type="hidden" value="'. $boarding->location.'" />';
                      echo '<input  name="boarding['.$key.'][time]" type="hidden" value="'. $boarding->time.'" />';

                     }?>
                     <?php foreach ($result->droppingPoints as $key => $dropping) {
                    //print_r($dropping);die;
                      //$boarding = array();
                      //echo "<input type='hidden' name='{$boardingPoints}[]' value='" . implode($boarding) . "' />";
                      echo '<input  name="dropping['.$key.'][id]" type="hidden" value="'. $dropping->id.'" />';
                      echo '<input  name="dropping['.$key.'][location]" type="hidden" value="'. $dropping->location.'" />';
                      echo '<input  name="dropping['.$key.'][time]" type="hidden" value="'. $dropping->time.'" />';

                     }?>
                    

                      <div class="col-md-3 ">
                        <span class="tag is-success"><?= $result->availableSeats;?></span>
                      </div>
                       <div class="col-md-3">
                        <span><?= $result->fare;?></span><br> 
                        <input type="hidden" name="inventoryType" value="<?= $result->inventoryType;?>">           
                        <input type="hidden" name="routeScheduleId" value="<?= $result->routeScheduleId;?>"> 
                          <button class="btn" type="submit">View Seats</button>
                        
                       </div>
                     </div>          
               </div>
               </form><?}}?>
             
             <div class="result" id="result">
             </div>
          </div>
       </div>
    <?php $this->load->view('includes/footer'); ?>

    <script src="<?=base_url();?>bootstrap/js/jquery-1.11.1.js"></script>
    <script src="http://ewaymate.com/bootstrap/js/jquery-1.11.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?=base_url();?>bootstrap/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    </script>
        <script type="text/javascript">
      //   $(document).ready(function() {
            

      //       $(".navicon").click(function() {
      //           $(".mobile-menu").toggleClass("ml-menu");
      //           $("i", this).toggleClass("fa fa-bars fa fa-times");
      //       });

      //   });
      //   </script>
        

      // <script >
      //   $("button").on("click",function(e){
      //     e.preventDefault();
      //    var routeScheduleId = $(this).closest(".bus-card").find("input[name='routeScheduleId']").val();
      //    var inventoryType = $(this).closest(".bus-card").find("input[name='inventoryType']").val();

      //    //var valdata = $(this).closest("button").find("span").text();

      //    // var data = $("input[name='routeScheduleId']").val();
      //    // alert(routeScheduleId);
      //    // alert(inventoryType);
      //    // $.post('<?=base_url('GetStation/getbuslayout')?>',{
      //    //      routeScheduleId : routeScheduleId,
      //    //      inventoryType : inventoryType
      //    // });

      //     $.ajax({
      //                           type : 'POST',
      //                           data : {routeScheduleId: routeScheduleId, inventoryType:inventoryType},
      //                           url : '<?=base_url('GetStation/getbuslayout');?>', 
      //                           async:false,                               
      //                           success: function (result) {
      //                                //(window.location.href = "<?=base_url('GetStation/getbusview');?>").html(result);
                                    
                               
                              
      //                       }
      //                       });

      //   });

        
</script>
</body>

</html>
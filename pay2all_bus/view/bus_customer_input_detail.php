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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

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
<?php //echo "<pre>";print_r($boardingPoints);die; ?>

<div class="container">
<div class="row">
<div class="col-md-6 seat">
    
                            <?php

$bustype = "";
$rowarray = array();
$array_zindez0_tr1 = array();
$array_zindez0_tr2 = array();
$array_zindez0_tr3 = array();
$array_zindez0_tr4 = array();
$array_zindez0_tr5 = array();

$array_zindez1_tr1 = array();
$array_zindez1_tr2 = array();
$array_zindez1_tr3 = array();
$array_zindez1_tr4 = array();
$array_zindez1_tr5 = array();


$array_row_values0 = array();
$array_col_values0 = array();

$array_row_values1 = array();
$array_col_values1 = array();

$zindex0 = false;
$zindex1 = false;  

                //print_r($dataseat);die;

$zindex0str = '';
$zindex1str = '';
                     // echo '<hr><hr><hr><hr>';
if (isset($dataseat->seats) && !empty($dataseat->seats)) {
  
foreach($dataseat->seats as $sr)   
{
                            //print_r($sr);die();
    $width = (string)$sr->width;
    $ladiesSeat = (string)$sr->ladiesSeat;
    $fare = (string)$sr->fare;
    $zIndex = (string)$sr->zIndex;
    
    $serviceTaxAmount = (string)$sr->serviceTaxAmount;
    $commission = (string)$sr->commission;
    $operatorServiceChargeAbsolute = (string)$sr->operatorServiceChargeAbsolute;
    $operatorServiceChargePercent = (string)$sr->operatorServiceChargePercent;
    $totalFareWithTaxes = (string)$sr->totalFareWithTaxes;
    
    $bookedBy = (string)$sr->bookedBy;
    $ac = (string)$sr->ac;
    $sleeper = (string)$sr->sleeper;
    $serviceTaxPer = (string)$sr->serviceTaxPer;
    $available = (string)$sr->available;
    $column = (string)$sr->column;
    $row = (string)$sr->row;
    $length = (string)$sr->length;
    $id = (string)$sr->id;                      
                                //echo "Width :".$width."   zIndex : ".$zIndex."   Column : ".$column."   Row : ".$row; die();

    if($zIndex == "0")
    {
                                   // echo "sleeper";
        array_push($array_row_values0, $row);
        array_push($array_col_values0, $column);
        $zindex0 = true;
        
        $rowarray[0][$row][$column] = $sr;
        
        
        
    }
    if($zIndex == "1")
    {
                                    //echo "Volvo";                                    
        array_push($array_row_values1, $row);
        array_push($array_col_values1, $column);
        $zindex1 = true;
        $rowarray[1][$row][$column] = $sr;
    }


                                // if($zIndex == "0" && $length=='1' && $width=='1')
                                // {
                                //     echo 'Seater/Semi Sleeper';
                                //    // array_push($array_row_values0, $row);
                                //    // array_push($array_col_values0, $column);
                                //    // $zindex0 = true;
    
                                //    // $rowarray[0][$row][$column] = $sr;
    
    
                                // }

                                // if(($zIndex == "1" || $zIndex == "0") && $length=='1' && $width=='2' )
                                // { 
                                //   echo '<br>Vertical Sleeper';
                                //   if($zIndex == "1"){
                                //      echo '<br>Upper Sleeper';
                                //   }else if($zIndex == "0"){
                                //      echo '<br>Lower Sleeper';
                                //   }
                                //     // array_push($array_row_values1, $row);
                                //     // array_push($array_col_values1, $column);
                                //     // $zindex1 = true;
                                //     // $rowarray[1][$row][$column] = $sr;
                                // }
                                //  if(($zIndex == "1" || $zIndex == "0") && ($length=='1' || $length=='2') && $width=='1' ){
                                //   echo '<br>Horizontal Sleeper cum semi sleeper';
                                //   if($zIndex == "1"){
                                //      echo '<br>Upper  Sleeper cum semi sleeper';
                                //   }else if($zIndex == "0"){
                                //      echo '<br>Lower  Sleeper cum semi sleeper';
                                //   }
                                //   // array_push($array_row_values1, $row);
                                //   //   array_push($array_col_values1, $column);
                                //   //   $zindex1 = true;
                                //   //   $rowarray[1][$row][$column] = $sr;
                                //  }

                                //  if($zIndex == "0" && $length=='2' && $width=='1' ){
                                //   echo '<br>Horizontal Sleeper';
                                //  }
    
    
    
                                //echo "<hr>";
    
                            }
                            }else
                            {
                              echo "No data";
                            }  //print_r($rowarray) ; die('here');
                            $i = 1;
                            foreach ($rowarray as $key => $row) {
                                 //print_r($row) ; die('here');
                                 //echo "<br>row>>>>".$key;
                              
                                foreach ($row as $colkey => $column) {
                                     //echo "<br>column>>>>".$colkey;
                                    //print_r($column) ;
                                    ?>
                                    <table>
                                    <tr>
                                   <?php  
                                    foreach ($column as $seatkey => $seat) {
                                        //print_r($seat) ;
                                        //echo $i;
                                        ?>
                                        
                                            <td>
                                                <?php if (isset($seat->available) && !empty($seat->available)) {
                                                    
                                                   ?>
                                                   <input type="hidden" name="fare" id="fareId" value="<?=$seat->fare?>">
                                                   <input type="hidden" name="totalFareWithTaxes" id="totalFareWithTaxesId" value="<?=$seat->totalFareWithTaxes?>">
                                                   <input type="hidden" name="row" id="rowId" value="<?=$seat->row?>">
                                                   <input type="hidden" name="column" id="columnId" value="<?=$seat->column?>">
                                                   <input type="hidden" name="serviceTaxAmount" id="serviceTaxAmountId" value="<?=$seat->serviceTaxAmount?>">
                                                   <input type="hidden" name="operatorServiceChargeAbsolute" id="operatorServiceChargeAbsoluteId" value="<?=$seat->operatorServiceChargeAbsolute?>">

                                                    <input type="hidden" name="ladiesSeat" id="ladiesSeatId" value="<?= $seat->ladiesSeat == ''?'false': $seat->ladiesSeat?>" >
                                                    <input type="hidden" name="ac" id="acId" value="<?= $seat->ac == ''?'false': $seat->ac?>" >
                                                    <input type="hidden" name="sleeper" id="sleeperId" value="<?= $seat->sleeper == ''?'false': $seat->sleeper?>" > 
                                                   <button id="seatId" style="color: red;"><img src="<?=base_url('images/busicon.png')?>" width="33" height="33" title="<?=$seat->id?>"><?=$seat->id?></button>
                                                   <?php }else{ ?>
                                                   <button ><img src="<?=base_url('images/busicon.png')?>" width="33" height="33" title="<?=$seat->id?>"><?=$seat->id?></button>
                                                   <?php  } ?>
                                                   

                                                   
                                               </td>
                                           
                                           
                                           <?
                                          $i++; 
                                       }
                                       echo "</table>";
                                       echo "</tr>";
                                   }
                               } //die('here'); ?>
                                    </div>
                                    <div class="col-md-6">
                                     <div class="busform">
                                      <form action="<?=base_url('GetStation/getcustomerdetails')?>" method="POST" >
                                                   
                                       <div class="form-group">
                                        <div class="col-md-4">
                                          <h4>Source City</h4> 
                                        <input class="form-control" value="<?=$_SESSION['sourceCity']?>" readonly>
                                      </div>
                                      <div class="col-md-4">
                                          <h4>Destination City</h4> 
                                        <input class="form-control" value="<?=$_SESSION['destinationCity']?>" readonly>
                                      </div>
                                      <div class="col-md-4">
                                          <h4>Date of Jounery</h4> 
                                        <input class="form-control"   value="<?=$_SESSION['doj']?>" readonly>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label>Name</label>
                                      <input type="text" name="customerName">
                                    </div>
                                    <div class="form-group">
                                      <label>LastName</label>
                                      <input type="text" name="customerLastName">
                                    </div>
                                    <div class="form-group">
                                      <label>Email</label>
                                      <input type="email" name="customerEmail">
                                    </div>
                                    <div class="form-group">
                                      <label>Phone</label>
                                      <input type="text" name="customerPhone" maxlength="10">
                                    </div>
                                    <div class="form-group">
                                      <label>Emergency Phone</label>
                                      <input type="text" name="emergencyPhNumber" maxlength="10">
                                    </div>
                                    <div class="form-group">
                                      <label>Address</label>
                                      <input type="text" name="CustomerAddress">
                                    </div>
                                    <h2>Travelling Personal Details</h2>
                                    <div class="form-group">
                                      <label>Title</label>
                                      <input type="text" name="Title" placeholder="Mr./Mrs.">
                                      <label>Passenger Name</label>
                                      <input type="text" name="name">
                                    </div>
                                    <div class="form-group">
                                      <label>Passenger Last Name</label>
                                      <input type="text" name="lastName">
                                    </div>
                                    <div class="form-group">
                                      <label>Passenger Email</label>
                                      <input type="email" name="email">
                                    </div>
                                     <div class="form-group">
                                      <label>Passenger Number</label>
                                      <input type="number" name="mobile" maxlength="10">
                                    </div>
                                    <div class="form-group">
                                      <label>Passenger Age</label>
                                      <input type="number" name="age">
                                    </div>
                                    <div class="form-group">
                                      <label>Passenger seat Number</label>
                                      <input name="seatNbr" id="SeatId" value="" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label>Passenger sex</label>
                                      <input type="radio" name="idType" value="PAN">Pan Card
                                      <input type="radio" name="idType" value="PASSPORT">Passport
                                      <input type="radio" name="idType" value="AADHAR">AADHAR Card
                                    </div>
                                    <div class="form-group">
                                      <label>Passenger Id Number</label>
                                      <input type="text" name="idNumber" >
                                    </div>
                                    <div class="form-group">
                                      <label>Passenger Name On Id</label>
                                      <input type="text" name="nameOnId">
                                    </div>
                                    <div class="form-group">
                                      <label>Passenger Id Type</label>
                                      <input type="radio" name="sex" value="M">Male
                                      <input type="radio" name="sex" value="F">Female
                                    </div>
                                    <div class="form-group">
                                      <label>Ac</label>
                                      <input name="ac" id="AcId" value="" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label>Sleeper</label>
                                      <input name="sleeper" id="SleeperId" value="" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label>Ladies Seat</label>
                                      <input name="ladiesSeat" id="LadieId" value="" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label>Boarding Location</label>
                                      <?php foreach ($boardingPoints as $key => $boardingPoint) { ?>
                                      <select name="boardingPoint_id">
                                        
                                        <option value="<?=$boardingPoint['id']?>" ><?=$boardingPoint['location']?></option>
                                        <input type="hidden" name="boardingPoint_loaction" value="<?=$boardingPoint['location']?>">
                                        <input type="hidden" name="boardingPoint_time" value="<?=$boardingPoint['time']?>">
                                        
                                        
                                      </select><? }?>
                                    </div>
                                    <div class="form-group">
                                      <label>Dropping Point</label>
                                      <?php foreach ($droppingPoints as $key => $droppingPoint) { ?>
                                      <input  name="droppingPoints_location" value="<?=$droppingPoint['location']?>" readonly>
                                        <input type="hidden" name="droppingPoints_id" value="<?=$droppingPoint['id']?>">
                                        <input  name="droppingPoints_time" value="<?=$droppingPoint['time']?>" readonly>
                                        
                                        
                                     <? }?>
                                    </div>
                                    <input type="hidden" name="primary" value="true">
                                    <input type="hidden" name="row" id="RowId" value="">
                                    <input type="hidden" name="column" id="ColumnId" value="">

                                    <div class="form-group">
                                      <label>Fare</label>
                                      <input name="fare" id="FareId" value="" style="background-color: #C0C0C0; width: 50px;" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label>Service Tax Amount</label>
                                      <input name="serviceTaxAmount" id="ServiceTaxAmountId" value="" style="background-color: #C0C0C0; width: 50px;" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label>Operater Charge</label>
                                      <input name="operatorServiceChargeAbsolute" id="OperatorServiceChargeAbsoluteId" value="" style="background-color: #C0C0C0; width: 50px;" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label>Total Fare</label>
                                      <input name="totalFareWithTaxes" id="TotalFareWithTaxesId" value="" style="background-color: #C0C0C0; width: 50px;" readonly>
                                    </div>                                      
                                    <!-- <div class="col-md-2">INR<input value="1241" readonly style="background-color: #C0C0C0; width: 50px;"></h3></div> -->
                                    <div class="col-md-4"><button class="btn">Proceed to Pay</button></div>
                                  </div>
                                </div>
                                </form>
                              </div>

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
    $(document).on('click','#seatId', function() { 
                                            //var rmc = $('h3[id^="recharge_coupon"]').val();
                                            var seat = $(this).text();
                                            var fare = $(this).closest('td').find("input[name='fare']").val();
                                            var totalFareWithTaxes = $(this).closest('td').find("input[name='totalFareWithTaxes']").val();
                                            var serviceTaxAmount = $(this).closest('td').find("input[name='serviceTaxAmount']").val();
                                            var operatorServiceChargeAbsolute = $(this).closest('td').find("input[name='operatorServiceChargeAbsolute']").val();

                                            var row = $(this).closest('td').find("input[name='row']").val();
                                            var column = $(this).closest('td').find("input[name='column']").val();
                                            var ladiesSeat = $(this).closest('td').find("input[name='ladiesSeat']").val();
                                            var ac = $(this).closest('td').find("input[name='ac']").val();
                                            var sleeper = $(this).closest('td').find("input[name='sleeper']").val();
                                            //<?=$seat->row?>


                                           // alert(this.id);
                                            // alert(seat);
                                             //alert(ladiesSeat);
                                             //alert(ac);
                                            // alert(sleeper);                                            
                                           // alert(fare);
                                           // alert(totalFareWithTaxes);
                                           // alert(serviceTaxAmount);
                                           // alert(operatorServiceChargeAbsolute);

                                           $('#SeatId').val(seat);
                                           $('#FareId').val(fare);
                                           $('#ServiceTaxAmountId').val(serviceTaxAmount);
                                           $('#OperatorServiceChargeAbsoluteId').val(operatorServiceChargeAbsolute);                                           
                                           $('#TotalFareWithTaxesId').val(totalFareWithTaxes);
                                           $('#RowId').val(row);
                                           $('#ColumnId').val(column);
                                           $('#LadieId').val(ladiesSeat);
                                           $('#AcId').val(ac);
                                           $('#SleeperId').val(sleeper);

                                          });
</script>
</body>

</html>
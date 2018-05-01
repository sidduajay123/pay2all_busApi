<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GetStation extends CI_Controller {

    public function pat($value='')
    {
       for ($i=0; $i <=9; $i++) 
       { 
            for ($j=0; $j <=4 ; $j++) 
            { 
               // echo $i."=".$j."&nbsp";
                if ($j==2) {

                }else
                {
                    echo $i."=".$j;
                }
             }
            echo "<br>";
        }
    }

        
                
        public function index() 
        {
                $parameters = array();
        
                $key = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijk2MjNmNWE5NjFmMmU4NjkwZGMxNTkxOGYyMjAzYmQ1MWRhM2JkYWRjN2M5ZGZlNjRjOWZjZWFjOWJhZTNiMmE1YzJkZmE3MTU0OGFkMjkxIn0.eyJhdWQiOiI1IiwianRpIjoiOTYyM2Y1YTk2MWYyZTg2OTBkYzE1OTE4ZjIyMDNiZDUxZGEzYmRhZGM3YzlkZmU2NGM5ZmNlYWM5YmFlM2IyYTVjMmRmYTcxNTQ4YWQyOTEiLCJpYXQiOjE1MjQwNDIzNzIsIm5iZiI6MTUyNDA0MjM3MiwiZXhwIjoxNTU1NTc4MzcyLCJzdWIiOiIxMDk0MSIsInNjb3BlcyI6W119.o8xJf63V14E9ZJa9U949-uDNigzRk36Hwjd0urVug2YAF_gdZsdWbbVHpxoUCfU4TWZtatvh8gatx6a2hnO9UbzslVpfOO6AiI9wj6YjDQOLw40Q6WB_dnnWTv1Cnc4vNkLwGY33xoMcCJ6-vOH7lUdsKrg-8dDyX-siscZ_Rb63ldw6t7a0USACG-IixfNM7m4--bGyhhv8SKfHVHCJrmCMv1H_fA1sT7USgTI66xCzR6go7wknQT6K6yd3VKdcAzizsfsCLrxgADQTamPhdAg53AqhAgcoP2FAncKC5jIdWEKYF7_d4vtMPKXALxAM2Ao5VTBX8ygbwhSQ4ztgDmv3ve4GrK-gVRkKmUd3zL1Pi__W-WR8kvGtp-PpvUWZEkhDGGxuj7-dmJKf6W5NIHS1P_kvHHV3UVW2aiIAvC12yvXMGNQng_LFffh-HW4Et5pQJOjM0zeHgo89htTTmRscohWZyzU1ywHLnJGbbtiRHhgsbd0tbjCODVH8jZPGCJMJ8-h7Vga-NOd1VI_f5GGz98QSGp92i6j9pBicIDojVfWRmbg9p38FRJHFHkvel2sEMcFwVEe_6cqDMgOnpGpam1_hLrLLbUkjkooHpy695v2D6H0GxO9WipDgeGXxxDGfVWFkiHXC57x3-ghn8gMUpRJqbX8A4g9ru8QcLRU"; //you have to add personal access token 
        
                $header = ["Accept:application/json", "Authorization:Bearer ".$key];
        
                $method = 'GET';
        
                $url = 'https://www.pay2all.in/api/bus/v1/getStations';
        
        
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
                curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_URL, $url);
                $response = curl_exec($ch);
               // print_r($response);die(); //[JSON RESPONSE]
                $bus_station = json_decode($response);
                //echo "<pre>";
                //print_r($bus_station->stationList);die();
                $data['stations'] = $bus_station->stationList;

                //echo "<pre>";
               // print_r($stationarr[0]->stationName);die();

                uasort($data['stations'], function($a, $b){
                            return strcmp($a->stationName, $b->stationName);
                        });
                  // echo "<pre>";
                  // print_r($data['stations']) ;die();

                // $busarr[] = array();

                // foreach ($stationarr as $key => $busstation) {
                // //         echo "<pre>";
                // // print_r($busstation);echo "</pre>";
                //         if ($busstation->stationId != '-1') {
                //                 $data['stations'][] = array(
                //                 'stationName' => $busstation->stationName,
                //                 'stationId' => $busstation->stationId,

                //         );
                //         }
                        
                // }

                //print_r($data);die;
                // foreach($data['stations'] as $dataVal){
                //       echo '<pre>';print_r($dataVal['stationName']);  
                // }die;

              // $busarr = ksort($data['stations']['stationName']) ;
              // print_r($busarr);die();

                // usort($data, function ($stations, $stations) {
                //             if ($stations1['stationId'] == $stations2['stationId']) return 0;
                //             return $stations1['stationId'] < $stations2['stationId'] ? -1 : 1;
                //         });

                // foreach ($data['stations'] as $key => $value) {
                //         $value['stationName'] = 
                // }

                // uasort($data['stations'], function($a, $b){
                //             return strcmp($a['stationName'], $b['stationName']);
                //         });

               //print_r($data) ;die();

                $this->load->view('bus',$data);
        }

       

        public function getbus()
        {
                {
                        $_SESSION['sourceCity'] = $this->input->post('sourceCity');
                        $_SESSION['destinationCity'] = $this->input->post('destinationCity');
                        $_SESSION['doj'] = $this->input->post('doj');

                $parameters = array(

                    'sourceCity'=>$_SESSION['sourceCity'],
                    'destinationCity'=>$_SESSION['destinationCity'],
                    'doj'=>$_SESSION['doj']
                );
        
                $key = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijk2MjNmNWE5NjFmMmU4NjkwZGMxNTkxOGYyMjAzYmQ1MWRhM2JkYWRjN2M5ZGZlNjRjOWZjZWFjOWJhZTNiMmE1YzJkZmE3MTU0OGFkMjkxIn0.eyJhdWQiOiI1IiwianRpIjoiOTYyM2Y1YTk2MWYyZTg2OTBkYzE1OTE4ZjIyMDNiZDUxZGEzYmRhZGM3YzlkZmU2NGM5ZmNlYWM5YmFlM2IyYTVjMmRmYTcxNTQ4YWQyOTEiLCJpYXQiOjE1MjQwNDIzNzIsIm5iZiI6MTUyNDA0MjM3MiwiZXhwIjoxNTU1NTc4MzcyLCJzdWIiOiIxMDk0MSIsInNjb3BlcyI6W119.o8xJf63V14E9ZJa9U949-uDNigzRk36Hwjd0urVug2YAF_gdZsdWbbVHpxoUCfU4TWZtatvh8gatx6a2hnO9UbzslVpfOO6AiI9wj6YjDQOLw40Q6WB_dnnWTv1Cnc4vNkLwGY33xoMcCJ6-vOH7lUdsKrg-8dDyX-siscZ_Rb63ldw6t7a0USACG-IixfNM7m4--bGyhhv8SKfHVHCJrmCMv1H_fA1sT7USgTI66xCzR6go7wknQT6K6yd3VKdcAzizsfsCLrxgADQTamPhdAg53AqhAgcoP2FAncKC5jIdWEKYF7_d4vtMPKXALxAM2Ao5VTBX8ygbwhSQ4ztgDmv3ve4GrK-gVRkKmUd3zL1Pi__W-WR8kvGtp-PpvUWZEkhDGGxuj7-dmJKf6W5NIHS1P_kvHHV3UVW2aiIAvC12yvXMGNQng_LFffh-HW4Et5pQJOjM0zeHgo89htTTmRscohWZyzU1ywHLnJGbbtiRHhgsbd0tbjCODVH8jZPGCJMJ8-h7Vga-NOd1VI_f5GGz98QSGp92i6j9pBicIDojVfWRmbg9p38FRJHFHkvel2sEMcFwVEe_6cqDMgOnpGpam1_hLrLLbUkjkooHpy695v2D6H0GxO9WipDgeGXxxDGfVWFkiHXC57x3-ghn8gMUpRJqbX8A4g9ru8QcLRU"; //you have to add personal access token 
        
                $header = ["Accept:application/json", "Authorization:Bearer ".$key];
        
                $method = 'POST';
        
                $url = 'https://www.pay2all.in/api/bus/v1/getAvailableBuses';
        
        
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
                curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_URL, $url);
                $response = curl_exec($ch);
                //echo $response;die;
                $dataarr = json_decode($response);
                  // echo "<pre>";
                  // print_r($dataarr);die;
                if (isset($dataarr) && !empty($dataarr)) {
                    $data['results'] = $dataarr->apiAvailableBuses;

                    $this->load->view('bus_search',$data);
                }else{
                    redirect(base_url('GetStation'));
                }
                
                //$data['formdatas'] = $_POST;
                // echo "<pre>";
                // print_r($data);die();
               // echo $response;  //[JSON RESPONSE]

                
                }
        }

      


         public function getbuslayout()
        
                {
                    //echo "<pre>";
                          // print_r($_POST);die();
                    if (isset($_POST['inventoryType']) && !empty($_POST['inventoryType']) && isset($_POST['routeScheduleId']) && !empty($_POST['routeScheduleId'])) {
                       $_SESSION['inventoryType'] = $_POST['inventoryType'];
                        $_SESSION['routeScheduleId'] = $_POST['routeScheduleId'];
                    }else{

                        redirect(base_url('GetStation'));
                        
                          // echo "<pre>";
                          // print_r($_POST);die();
                    }

                $parameters = array(
                        'sourceCity'=>$_SESSION['sourceCity'],
                        'destinationCity'=>$_SESSION['destinationCity'],
                        'doj'=>$_SESSION['doj'],
                        'inventoryType'=>$_SESSION['inventoryType'],
                        'routeScheduleId'=>$_SESSION['routeScheduleId']
                );
        
                $key = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijk2MjNmNWE5NjFmMmU4NjkwZGMxNTkxOGYyMjAzYmQ1MWRhM2JkYWRjN2M5ZGZlNjRjOWZjZWFjOWJhZTNiMmE1YzJkZmE3MTU0OGFkMjkxIn0.eyJhdWQiOiI1IiwianRpIjoiOTYyM2Y1YTk2MWYyZTg2OTBkYzE1OTE4ZjIyMDNiZDUxZGEzYmRhZGM3YzlkZmU2NGM5ZmNlYWM5YmFlM2IyYTVjMmRmYTcxNTQ4YWQyOTEiLCJpYXQiOjE1MjQwNDIzNzIsIm5iZiI6MTUyNDA0MjM3MiwiZXhwIjoxNTU1NTc4MzcyLCJzdWIiOiIxMDk0MSIsInNjb3BlcyI6W119.o8xJf63V14E9ZJa9U949-uDNigzRk36Hwjd0urVug2YAF_gdZsdWbbVHpxoUCfU4TWZtatvh8gatx6a2hnO9UbzslVpfOO6AiI9wj6YjDQOLw40Q6WB_dnnWTv1Cnc4vNkLwGY33xoMcCJ6-vOH7lUdsKrg-8dDyX-siscZ_Rb63ldw6t7a0USACG-IixfNM7m4--bGyhhv8SKfHVHCJrmCMv1H_fA1sT7USgTI66xCzR6go7wknQT6K6yd3VKdcAzizsfsCLrxgADQTamPhdAg53AqhAgcoP2FAncKC5jIdWEKYF7_d4vtMPKXALxAM2Ao5VTBX8ygbwhSQ4ztgDmv3ve4GrK-gVRkKmUd3zL1Pi__W-WR8kvGtp-PpvUWZEkhDGGxuj7-dmJKf6W5NIHS1P_kvHHV3UVW2aiIAvC12yvXMGNQng_LFffh-HW4Et5pQJOjM0zeHgo89htTTmRscohWZyzU1ywHLnJGbbtiRHhgsbd0tbjCODVH8jZPGCJMJ8-h7Vga-NOd1VI_f5GGz98QSGp92i6j9pBicIDojVfWRmbg9p38FRJHFHkvel2sEMcFwVEe_6cqDMgOnpGpam1_hLrLLbUkjkooHpy695v2D6H0GxO9WipDgeGXxxDGfVWFkiHXC57x3-ghn8gMUpRJqbX8A4g9ru8QcLRU"; //you have to add personal access token 
        
                $header = ["Accept:application/json", "Authorization:Bearer ".$key];
        
                $method = 'POST';
        
                $url = 'https://www.pay2all.in/api/bus/v1/getBusLayout';
        
        
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
                curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_URL, $url);
                $response = curl_exec($ch);
                //echo $response; die();
                $datarr= json_decode($response);
                 // echo "<pre>";
                 // print_r($datarr);die;
                if (isset($datarr) && !empty($datarr)) {
                    $data['dataseat'] =$datarr;
                $data['boardingPoints'] = $_POST['boarding'];
                $data['droppingPoints'] = $_POST['dropping'];


                $this->load->view('bus_customer_input_detail',$data);
                
                }else{
                    redirect(base_url('GetStation'));
                }
                
                //echo "<pre>";
                //print_r($data);

                // echo "<pre>";
                // print_r($data);die;
               // echo $response;  //[JSON RESPONSE]
                //return $data;
              //  $this->getbusviewlayout($data);

                //redirect(base_url('GetStation/getbusviewlayout'),$seats);
        }

        public function getcustomerdetails()
        {

        	$_SESSION['customerName'] = $this->input->post('customerName');
        	$_SESSION['customerEmail'] = $this->input->post('customerEmail');
        	$_SESSION['CustomerAddress'] = $this->input->post('CustomerAddress');
        	$_SESSION['amount'] = $this->input->post('totalFareWithTaxes');


        	$prebook=array(
        		'sourceCity'=>$_SESSION['sourceCity'], 
        		'destinationCity'=>$_SESSION['destinationCity'],
        		'doj'=>$_SESSION['doj'],
        		'routeScheduleId'=>$_SESSION['routeScheduleId'],
        		'boardingPoint'=>array(
        			'id'=>$this->input->post('boardingPoint_id'),                    
        			'time'=>$this->input->post('boardingPoint_time'),
        			'location'=>$this->input->post('boardingPoint_loaction'),

        		),
        		'droppingPoint'=>array(
        			'id'=>$this->input->post('droppingPoints_id'),                    
        			'time'=>$this->input->post('droppingPoints_time'),
        			'location'=>$this->input->post('droppingPoints_location'),

        		),     
        		'customerName'=>$this->input->post('customerName'),
        		'customerLastName'=>$this->input->post('customerLastName'),
        		'customerEmail'=>$this->input->post('customerEmail'),
        		'customerPhone'=>$this->input->post('customerPhone'),
        		'emergencyPhNumber'=>$this->input->post('emergencyPhNumber'),
        		'customerAddress'=>$this->input->post('CustomerAddress'),
        		'blockSeatPaxDetails'=>array(array(
        			'age'=>$_POST['age'],
        			'name'=>$_POST['name'],
        			'seatNbr'=>$_POST['seatNbr'],
        			'sex'=>$_POST['sex'],
        			'fare'=>$_POST['fare'],
        			'serviceTaxAmount' => $this->input->post('serviceTaxAmount'),
        			'operatorServiceChargeAbsolute' => $this->input->post('operatorServiceChargeAbsolute'),
        			'totalFareWithTaxes'=>$_POST['totalFareWithTaxes'],
        			'ladiesSeat'=>$this->input->post('ladiesSeat'),
        			'lastName'=>$_POST['lastName'],
                // 'mobile'=>$_POST['mobile'],
        			'title'=>$this->input->post('Title'),
        			'email'=>$_POST['email'],
        			'idType'=>$_POST['idType'],
        			'idNumber'=>$_POST['idNumber'],
        			'nameOnId'=>$_POST['nameOnId'],
        			'primary'=>$_POST['primary'],
        			'ac'=>$_POST['ac'],
        			'sleeper'=>$_POST['sleeper'],
        		)),
        		'inventoryType'=>$_SESSION['inventoryType']             
        	);
        	$json=json_encode($prebook);
         // print_r($json);die;


        	$key =  "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijk2MjNmNWE5NjFmMmU4NjkwZGMxNTkxOGYyMjAzYmQ1MWRhM2JkYWRjN2M5ZGZlNjRjOWZjZWFjOWJhZTNiMmE1YzJkZmE3MTU0OGFkMjkxIn0.eyJhdWQiOiI1IiwianRpIjoiOTYyM2Y1YTk2MWYyZTg2OTBkYzE1OTE4ZjIyMDNiZDUxZGEzYmRhZGM3YzlkZmU2NGM5ZmNlYWM5YmFlM2IyYTVjMmRmYTcxNTQ4YWQyOTEiLCJpYXQiOjE1MjQwNDIzNzIsIm5iZiI6MTUyNDA0MjM3MiwiZXhwIjoxNTU1NTc4MzcyLCJzdWIiOiIxMDk0MSIsInNjb3BlcyI6W119.o8xJf63V14E9ZJa9U949-uDNigzRk36Hwjd0urVug2YAF_gdZsdWbbVHpxoUCfU4TWZtatvh8gatx6a2hnO9UbzslVpfOO6AiI9wj6YjDQOLw40Q6WB_dnnWTv1Cnc4vNkLwGY33xoMcCJ6-vOH7lUdsKrg-8dDyX-siscZ_Rb63ldw6t7a0USACG-IixfNM7m4--bGyhhv8SKfHVHCJrmCMv1H_fA1sT7USgTI66xCzR6go7wknQT6K6yd3VKdcAzizsfsCLrxgADQTamPhdAg53AqhAgcoP2FAncKC5jIdWEKYF7_d4vtMPKXALxAM2Ao5VTBX8ygbwhSQ4ztgDmv3ve4GrK-gVRkKmUd3zL1Pi__W-WR8kvGtp-PpvUWZEkhDGGxuj7-dmJKf6W5NIHS1P_kvHHV3UVW2aiIAvC12yvXMGNQng_LFffh-HW4Et5pQJOjM0zeHgo89htTTmRscohWZyzU1ywHLnJGbbtiRHhgsbd0tbjCODVH8jZPGCJMJ8-h7Vga-NOd1VI_f5GGz98QSGp92i6j9pBicIDojVfWRmbg9p38FRJHFHkvel2sEMcFwVEe_6cqDMgOnpGpam1_hLrLLbUkjkooHpy695v2D6H0GxO9WipDgeGXxxDGfVWFkiHXC57x3-ghn8gMUpRJqbX8A4g9ru8QcLRU";
        	$ch = curl_init();
        	$url = "https://www.pay2all.in/api/bus/v1/blockTicket";

        //$key = "Personal Access Tokens";
        	$header = ["Accept:application/json", "Authorization:Bearer ".$key];
        	$method = 'POST';
        	curl_setopt($ch, CURLOPT_URL, $url); 
        	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
        	curl_setopt($ch, CURLOPT_POST, 1);                                                                   
        	curl_setopt($ch, CURLOPT_POSTFIELDS, $json);                                                                  
        	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);                                                                                              
        	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);    
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                                                           
        	$result = curl_exec($ch);
        	curl_close($ch);
           // echo "<pre>";
           // echo $result;die;
        	$data=json_decode($result);
        	//print_r($data);
        	//print_r($data->blockTicketKey);die;
        	$_SESSION['blockTicketKey'] = $data->blockTicketKey;
        	$this->busGatwaye();          

        }

        public function busGatwaye()
        {
        	$customerName = $_SESSION['customerName'];
        	$customerEmail = $_SESSION['customerEmail'];
        	$CustomerAddress = $_SESSION['CustomerAddress'];
        	$amount = $_SESSION['amount'];

        		date_default_timezone_set('Asia/Calcutta');
				$datenow = date("d/m/Y h:m:s");
				$transactionDate = str_replace(" ", "%20", $datenow);

				$transactionId = rand(1000000,9999999);
				

				$this->load->library('TransactionRequest');

				$transactionRequest = new TransactionRequest();
				

				//Setting all values here
				$transactionRequest->setMode("Production");
				$transactionRequest->setLogin(57938);
				$transactionRequest->setPassword("GMNP@123");
				$transactionRequest->setProductId("GMNP_RECHARGE");
				$transactionRequest->setAmount($amount);
				$transactionRequest->setTransactionCurrency("INR");
				$transactionRequest->setTransactionAmount($amount);
				$transactionRequest->setReturnUrl(base_url('GetStation/response'));
				$transactionRequest->setClientCode($user_id);
				$transactionRequest->setTransactionId($transactionId);
				$transactionRequest->setTransactionDate($transactionDate);
				$transactionRequest->setCustomerName($customerName);
				$transactionRequest->setCustomerEmailId($customerEmail);
				//$transactionRequest->setCustomerMobile($number);
				$transactionRequest->setCustomerBillingAddress($CustomerAddress);
				$transactionRequest->setCustomerAccount("639827");
				$transactionRequest->setReqHashKey("dffb98122da3cc8670");


				$url = $transactionRequest->getPGUrl();

				// echo $url;die;

				header("Location: $url");
        }

        public function response()
    {
        //require_once (base_url().'TransactionResponse.php');  
        $this->load->library('TransactionResponse');      
        $transactionResponse = new TransactionResponse();
        //print_r($transactionResponse);die;
        $transactionResponse->setRespHashKey("0203c4c086322903be");
        	 //echo "<pre>";
            	// print_r($_POST);die;


        if($transactionResponse->validateResponse($_POST)){
            $this->rechargemodel->addBusgatwayedata($_POST);
           // $this->rechargemodel->storewalletdata($_POST);



            // print_r($_SESSION['mainamount'] );
            // print_r($_SESSION['amount'] );die;

            if ($_POST['mmp_txn'] != 0 ) {

            	//echo "<pre>";
            	//print_r($this->session->userdata());die;
                

                

                echo "Transaction Processed <br/>";

                

                redirect(base_url('GetStation/seatBook'));
            }else
            {

                $this->load->view('GetStation');
            }
            
            // echo "Transaction Processed <br/>";
            // echo "<pre>";
            // print_r($_POST);die;
            //  redirect(base_url('recharge/').$recharge_type);
        } else {
            
            
            redirect(base_url('GetStation'));
            
        }


        //print_r($_POST);
            }

        public function seatBook()
        {

        	$parameter = array(
        		'blockTicketKey' => $_SESSION['blockTicketKey'] 
        	); 

        	$key =  "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijk2MjNmNWE5NjFmMmU4NjkwZGMxNTkxOGYyMjAzYmQ1MWRhM2JkYWRjN2M5ZGZlNjRjOWZjZWFjOWJhZTNiMmE1YzJkZmE3MTU0OGFkMjkxIn0.eyJhdWQiOiI1IiwianRpIjoiOTYyM2Y1YTk2MWYyZTg2OTBkYzE1OTE4ZjIyMDNiZDUxZGEzYmRhZGM3YzlkZmU2NGM5ZmNlYWM5YmFlM2IyYTVjMmRmYTcxNTQ4YWQyOTEiLCJpYXQiOjE1MjQwNDIzNzIsIm5iZiI6MTUyNDA0MjM3MiwiZXhwIjoxNTU1NTc4MzcyLCJzdWIiOiIxMDk0MSIsInNjb3BlcyI6W119.o8xJf63V14E9ZJa9U949-uDNigzRk36Hwjd0urVug2YAF_gdZsdWbbVHpxoUCfU4TWZtatvh8gatx6a2hnO9UbzslVpfOO6AiI9wj6YjDQOLw40Q6WB_dnnWTv1Cnc4vNkLwGY33xoMcCJ6-vOH7lUdsKrg-8dDyX-siscZ_Rb63ldw6t7a0USACG-IixfNM7m4--bGyhhv8SKfHVHCJrmCMv1H_fA1sT7USgTI66xCzR6go7wknQT6K6yd3VKdcAzizsfsCLrxgADQTamPhdAg53AqhAgcoP2FAncKC5jIdWEKYF7_d4vtMPKXALxAM2Ao5VTBX8ygbwhSQ4ztgDmv3ve4GrK-gVRkKmUd3zL1Pi__W-WR8kvGtp-PpvUWZEkhDGGxuj7-dmJKf6W5NIHS1P_kvHHV3UVW2aiIAvC12yvXMGNQng_LFffh-HW4Et5pQJOjM0zeHgo89htTTmRscohWZyzU1ywHLnJGbbtiRHhgsbd0tbjCODVH8jZPGCJMJ8-h7Vga-NOd1VI_f5GGz98QSGp92i6j9pBicIDojVfWRmbg9p38FRJHFHkvel2sEMcFwVEe_6cqDMgOnpGpam1_hLrLLbUkjkooHpy695v2D6H0GxO9WipDgeGXxxDGfVWFkiHXC57x3-ghn8gMUpRJqbX8A4g9ru8QcLRU";
        	$ch = curl_init();
        	$url = "https://www.pay2all.in/api/bus/v1/getRtcUpdatedFare";

        //$key = "Personal Access Tokens";
        	$header = ["Accept:application/json", "Authorization:Bearer ".$key];
        	$method = 'POST';
        	curl_setopt($ch, CURLOPT_URL, $url); 
        	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
        	curl_setopt($ch, CURLOPT_POST, 1);                                                                   
        	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameter));                                                                  
        	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);                                                                                              
        	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);    
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                                                           
        	$rtcupdate = curl_exec($ch);
        	curl_close($ch);


        	$ch = curl_init();
        	$url = "https://www.pay2all.in/api/bus/v1/seatBooking";

        //$key = "Personal Access Tokens";
        	$header = ["Accept:application/json", "Authorization:Bearer ".$key];
        	$method = 'POST';
        	curl_setopt($ch, CURLOPT_URL, $url); 
        	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
        	curl_setopt($ch, CURLOPT_POST, 1);                                                                   
        	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameter));                                                                  
        	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);                                                                                              
        	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);    
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                                                           
        	$seats = curl_exec($ch);
        	curl_close($ch);
        	$data=json_decode($seats);

        	//echo "<pre>";
        	//print_r($data);die;
        	$this->getBookedTicket($data->etstnumber);
        }

        public function getBookedTicket($etstnumber)
        {
        	
        	$parameter = array(
        		'etstnumber' =>  $etstnumber //'ETS784B1PT188010'  //
        	);

        	$key =  "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijk2MjNmNWE5NjFmMmU4NjkwZGMxNTkxOGYyMjAzYmQ1MWRhM2JkYWRjN2M5ZGZlNjRjOWZjZWFjOWJhZTNiMmE1YzJkZmE3MTU0OGFkMjkxIn0.eyJhdWQiOiI1IiwianRpIjoiOTYyM2Y1YTk2MWYyZTg2OTBkYzE1OTE4ZjIyMDNiZDUxZGEzYmRhZGM3YzlkZmU2NGM5ZmNlYWM5YmFlM2IyYTVjMmRmYTcxNTQ4YWQyOTEiLCJpYXQiOjE1MjQwNDIzNzIsIm5iZiI6MTUyNDA0MjM3MiwiZXhwIjoxNTU1NTc4MzcyLCJzdWIiOiIxMDk0MSIsInNjb3BlcyI6W119.o8xJf63V14E9ZJa9U949-uDNigzRk36Hwjd0urVug2YAF_gdZsdWbbVHpxoUCfU4TWZtatvh8gatx6a2hnO9UbzslVpfOO6AiI9wj6YjDQOLw40Q6WB_dnnWTv1Cnc4vNkLwGY33xoMcCJ6-vOH7lUdsKrg-8dDyX-siscZ_Rb63ldw6t7a0USACG-IixfNM7m4--bGyhhv8SKfHVHCJrmCMv1H_fA1sT7USgTI66xCzR6go7wknQT6K6yd3VKdcAzizsfsCLrxgADQTamPhdAg53AqhAgcoP2FAncKC5jIdWEKYF7_d4vtMPKXALxAM2Ao5VTBX8ygbwhSQ4ztgDmv3ve4GrK-gVRkKmUd3zL1Pi__W-WR8kvGtp-PpvUWZEkhDGGxuj7-dmJKf6W5NIHS1P_kvHHV3UVW2aiIAvC12yvXMGNQng_LFffh-HW4Et5pQJOjM0zeHgo89htTTmRscohWZyzU1ywHLnJGbbtiRHhgsbd0tbjCODVH8jZPGCJMJ8-h7Vga-NOd1VI_f5GGz98QSGp92i6j9pBicIDojVfWRmbg9p38FRJHFHkvel2sEMcFwVEe_6cqDMgOnpGpam1_hLrLLbUkjkooHpy695v2D6H0GxO9WipDgeGXxxDGfVWFkiHXC57x3-ghn8gMUpRJqbX8A4g9ru8QcLRU";

        	$ch = curl_init();
        	$url = "https://www.pay2all.in/api/bus/v1/getTicketByETSTNumber";

        //$key = "Personal Access Tokens";
        	$header = ["Accept:application/json", "Authorization:Bearer ".$key];
        	$method = 'POST';
        	curl_setopt($ch, CURLOPT_URL, $url); 
        	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
        	curl_setopt($ch, CURLOPT_POST, 1);                                                                   
        	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameter));                                                                  
        	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);                                                                                              
        	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);    
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                                                           
        	$bookedticket = curl_exec($ch);
        	curl_close($ch);
        	$data['bookedticket'] = json_decode($bookedticket);
        	//echo $bookedticket ;die;

        	$this->load->view('busTicket',$data);

        }

        public function cancelTicket($value='')
        {
        	$parameter = array(
        		'APICancelRequest' => '',
        		'etsTicketNo' => $_POST[''],
        		'seatNbrsToCancel' => $_POST['']
        	);

        	$key =  "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijk2MjNmNWE5NjFmMmU4NjkwZGMxNTkxOGYyMjAzYmQ1MWRhM2JkYWRjN2M5ZGZlNjRjOWZjZWFjOWJhZTNiMmE1YzJkZmE3MTU0OGFkMjkxIn0.eyJhdWQiOiI1IiwianRpIjoiOTYyM2Y1YTk2MWYyZTg2OTBkYzE1OTE4ZjIyMDNiZDUxZGEzYmRhZGM3YzlkZmU2NGM5ZmNlYWM5YmFlM2IyYTVjMmRmYTcxNTQ4YWQyOTEiLCJpYXQiOjE1MjQwNDIzNzIsIm5iZiI6MTUyNDA0MjM3MiwiZXhwIjoxNTU1NTc4MzcyLCJzdWIiOiIxMDk0MSIsInNjb3BlcyI6W119.o8xJf63V14E9ZJa9U949-uDNigzRk36Hwjd0urVug2YAF_gdZsdWbbVHpxoUCfU4TWZtatvh8gatx6a2hnO9UbzslVpfOO6AiI9wj6YjDQOLw40Q6WB_dnnWTv1Cnc4vNkLwGY33xoMcCJ6-vOH7lUdsKrg-8dDyX-siscZ_Rb63ldw6t7a0USACG-IixfNM7m4--bGyhhv8SKfHVHCJrmCMv1H_fA1sT7USgTI66xCzR6go7wknQT6K6yd3VKdcAzizsfsCLrxgADQTamPhdAg53AqhAgcoP2FAncKC5jIdWEKYF7_d4vtMPKXALxAM2Ao5VTBX8ygbwhSQ4ztgDmv3ve4GrK-gVRkKmUd3zL1Pi__W-WR8kvGtp-PpvUWZEkhDGGxuj7-dmJKf6W5NIHS1P_kvHHV3UVW2aiIAvC12yvXMGNQng_LFffh-HW4Et5pQJOjM0zeHgo89htTTmRscohWZyzU1ywHLnJGbbtiRHhgsbd0tbjCODVH8jZPGCJMJ8-h7Vga-NOd1VI_f5GGz98QSGp92i6j9pBicIDojVfWRmbg9p38FRJHFHkvel2sEMcFwVEe_6cqDMgOnpGpam1_hLrLLbUkjkooHpy695v2D6H0GxO9WipDgeGXxxDGfVWFkiHXC57x3-ghn8gMUpRJqbX8A4g9ru8QcLRU";

        	$ch = curl_init();
        	$url = "https://www.pay2all.in/api/bus/v1/cancelTicketConfirmation";

        //$key = "Personal Access Tokens";
        	$header = ["Accept:application/json", "Authorization:Bearer ".$key];
        	$method = 'POST';
        	curl_setopt($ch, CURLOPT_URL, $url); 
        	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
        	curl_setopt($ch, CURLOPT_POST, 1);                                                                   
        	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameter));                                                                  
        	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);                                                                                              
        	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);    
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                                                           
        	$confirmcancelticket = curl_exec($ch);
        	curl_close($ch);


        	$ch = curl_init();
        	$url = "https://www.pay2all.in/api/bus/v1/cancelTicket";

        //$key = "Personal Access Tokens";
        	$header = ["Accept:application/json", "Authorization:Bearer ".$key];
        	$method = 'POST';
        	curl_setopt($ch, CURLOPT_URL, $url); 
        	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
        	curl_setopt($ch, CURLOPT_POST, 1);                                                                   
        	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameter));                                                                  
        	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);                                                                                              
        	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);    
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                                                           
        	$cancelticket = curl_exec($ch);
        	curl_close($ch);

        }


       

   
}


?>


<!--     Ajax for displaying seats on same page 

     //     function seat(source, destination, inventry, routeshed, doj, operatorName, busType) {
    // //$('#myModal2').modal({backdrop: 'static', keyboard: false});

    //                 $("#btnnn_" + routeshed).text("Loading....");
    //                 $("#btnnn_" + routeshed).attr("disabled", true);
    //                 var dataString = 'surce=' + source + '&destination=' + destination + '&doj=' + doj + '&inventry=' + inventry + '&routeid=' + routeshed;

    //                 $.ajax({
    //                     type: "GET",
    //                     url: "http://ewaymate.com/GetStation/getbuslayout",
    //                     dataType: "text",
    //                     data: dataString,
    //                     beforeSend: function () {
    //                         $('#overlay').show();
    //                     },
    //                     success: function (msg) {

    //                         //alert(msg.message);
    //                         //$(this).nextUntil('aadil').slideToggle(1000);
    //                         if (msg.message == 'Opps some thing went wrong from operator end, Please select another bus') {
    //                             $("#btnnn_" + routeshed).text("Seats");
    //                             $("#btnnn_" + routeshed).attr("disabled", false);
    //                             alert(msg.message);
    //                         } else {
    //                             $("#btnnn_" + routeshed).text("Seats");
    //                             $("#btnnn_" + routeshed).attr("disabled", false);
    //                             $(".operatorName").html(operatorName);
    //                             $(".busType ").html(busType);

    //                             $('#myModal2').modal('show');
    //                             var htmlstring = msg;
    //                             $("#yourdiv").html(htmlstring);
    //                         }
    //                     }
    //                 });

    //             } -->
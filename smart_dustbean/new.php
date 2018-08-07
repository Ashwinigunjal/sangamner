<?php 
$data = file_get_contents('php://input'); 
$json = json_decode($data); 
// var_dump($json);
if(isset($json))
{
    $dervice = $json->{'dev_id'}; 
    if($dervice == 'ac1')
    {
        $data=array('dev_id'=>"ac1", 'on_off'=>"off", "mode"=>"mode_fan", "temp"=>"c27", "fan"=>"fan_mid", "swing"=>"sw_off"); 
        echo json_encode($data);
    }
}





// header("Content-Type: application/json; charset=UTF-8");
// $obj = json_decode($_GET["x"], false);

// echo $obj->dev_id;

// // echo $_GET['dev_id'];
// if(isset($_GET['dev_id']))
// {
//     $data=array('dev_id'=>"test_123", 'control'=>50, "ack"=>1); 
//     echo json_encode($data);
// }
// else
// {
//     echo "Data not received";
// }
?>
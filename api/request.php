<?

header('Access-Control-Allow-Origin: *');
	
//header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

$k = "5c18a705dd6e85b850675864d79529a7";
$jsonString = file_get_contents('backHand.json');
$all_data = json_decode($jsonString, true);



$sn = $_GET["sn"];

if(isset($_GET["auth"])){

    $key = $_GET["auth"];  
    
    if($key == $k){
    
        $ac = $_POST["ac"];
        $dc = $_POST["dc"];
        $dowm = $_POST["down_time"];

        $update_arr = array(
            'ac' => $ac,
            'dc' => $dc,
            'down_time' => $dowm
        );
        $all_data[$sn][time()] = $update_arr;
            // var_dump($_POST);
            // var_dump($_GET);
            // var_dump($all_data);
        


        $newJsonString = json_encode($all_data);
        if(file_put_contents('backHand.json', $newJsonString) == false)
            echo "failed";
        else
            echo "success";
         
    }


}else if(isset($_GET["user"])){

    $key = $_GET["user"];
    
    if($key == $k){
        
        echo json_encode(array_pop($all_data[$sn]));
         
    }


}


//www.velhect.com/station_monitor/api/request.php?sn=testing123&auth=5c18a705dd6e85b850675864d79529a7
//www.velhect.com/station_monitor/api/request.php?sn=testing123&user=5c18a705dd6e85b850675864d79529a7
?>
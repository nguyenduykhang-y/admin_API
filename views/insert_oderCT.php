<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$data = json_decode(file_get_contents("php://input"));
include_once '../helpers/getBearerToken.php';

include_once '../configs/core.php';
include_once '../libs/php-jwt-master/src/BeforeValidException.php';
include_once '../libs/php-jwt-master/src/ExpiredException.php';
include_once '../libs/php-jwt-master/src/SignatureInvalidException.php';
include_once '../libs/php-jwt-master/src/JWT.php';

include_once '../controllers/oderCTCTL.php';

use \Firebase\JWT\JWT;


$access_token = getBearerToken();
if ($access_token) {
    try {
        $decoded = JWT::decode($access_token, Constant::MY_SECRET_KEY, array('HS256'));

       
        // $oderCTId, $oderId,  $productId, $namePr,$quantity,$price,$address

        $oderctId = $data->oderctId;
        $idUser = $data->idUser;
        $productId = $data->productId;
        $quantity = $data->quantity;
        $price = $data->price;
        $address = $data->address;
        $date = $data->date;
        
        $status = (new OderCTCTL())->insertODerCT( $oderctId, $idUser, $productId,$price,$quantity,$address,$date);
        if ($status) {
            http_response_code(200);  
            echo json_encode(array("status"=> true));
        } else {
            http_response_code(404);  
            echo json_encode(array("status"=> false));
        }
        
    } catch (\Throwable $th) {
        http_response_code(401); 
    }
} else {
    http_response_code(401);    
}

?>
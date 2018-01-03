<?php
// common helper for validation purpose
class common {
    function validateInput($requestType, $requestArray, $apiArray) {
        $responseArray = array();
            if ($requestArray === null) {
                $responseArray = array(
                    "status" => "false",
                    "message" => "Invalid JSON Object !"
                );
                return $responseArray;
            } else {
                if (count($requestArray) !== count($apiArray)) {
                    $responseArray = array(
                        "status" => "false",
                        "message" => "Number of input parameter(s) mismatched !"
                    );
                    return $responseArray;
                } else {
                    $differenceArray = array_diff_key($apiArray, $requestArray);
                    if (count($differenceArray) >= 1) {
                        $responseArray = array(
                            "status" => "false",
                            "message" => "Parameter(s) mismatched !"
                        );
                        return $responseArray;
                    } else {
                        $isEmptyElement = in_array("", $requestArray);
                        if ($isEmptyElement == "true") {
                            $responseArray = array(
                                "status" => "false",
                                "message" => "Empty Parameter(s) Found !"
                            );
                            return $responseArray;
                        }
                    }
                }
            }        
    }
// check authToken is valid or not
    function checkAuthToken($authToken) {
        $responseArray = array();
        if($authToken == '' || $authToken == null) {
            $responseArray = array(
                                "status" => "false",
                                "response" => "Authentication Failed!Please check if authentication token is empty."
            );
            return $responseArray;
        } else {
            // TODO : Need to add database query for getting the authToken or add hard coded token
            // for time being the authToken is static
            
            if($authToken == '1234567890'){
                return $responseArray;
            } else {
                 $responseArray = array(
                                "status" => "false",
                                "response" => "Authentication Failed!Please check if authentication token is correct."
                );
                return $responseArray;
            }
            
        }
    }

}
?>
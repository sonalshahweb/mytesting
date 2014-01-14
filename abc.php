<?php
echo phpinfo();exit;dd
function CallAPI($method, $url, $data)
{

    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }



    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
echo curl_error($curl);exit;
    return curl_exec($curl);
}

$data = array("key"=>"48f3e148b8181df4e4a62de977325157",
	      "api_key"=>"XAJgtAviNIn0YSUoRB6ctvev",
	      "entity"=>"contact",
	      "action"=>"create",
	      "first_name"=>"John",
	      "last_name"=>"SMith",
	      "email"=>"jsmith@example.org",
	      "contact_type"=>"Individual"
	      );
$result = CallAPI("POST","http://localhost/drupal/sites/all/modules/civicrm/extern/rest.php",$data);
echo "<pre>";print_r($result);exit;
?>

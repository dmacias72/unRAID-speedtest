<?
$response_xml_data = file_get_contents('http://www.speedtest.net/speedtest-servers-static.php');
 if($response_xml_data){
     file_put_contents('/boot/build/SpeedTest/servers.xml', $response_xml_data);
 }

$select  = $_GET['select'];
exec($cmd, $output);

$options = '';
$size = sizeof($output);
for ($i = 2; $i < $size; $i++) {
    $server = explode(') ', trim($output[$i]),2);
    $id = $server[0];

    $options .= '<option ';
    if ($id == $select)
        $options .= 'selected="" ';
    $options .= "value='$id'>".str_pad($id, 4, '0', STR_PAD_LEFT)." - ${server[1]}</option>";
}

echo json_encode($options);
?>

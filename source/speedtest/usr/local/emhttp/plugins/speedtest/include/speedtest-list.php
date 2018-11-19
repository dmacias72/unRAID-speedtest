<?
$servers_file = '/boot/config/plugins/speedtest/servers.xml';
$servers_xml_data = file_get_contents('http://www.speedtest.net/speedtest-servers-static.php');
 if($servers_xml_data){
     file_put_contents($servers_file, $servers_xml_data);
 }
$xml = new SimpleXMLElement($servers_xml_data);
$select  = $_GET['select'];
$options = '';

foreach ($xml->servers->server as $server) {
    $id = $server->attributes()->id;
    $host = $server->attributes()->host;
    $options .= '<option ';
    if ($id == $select)
        $options .= 'selected="" ';
    $options .= "value='$id'>".str_pad($id, 4, '0', STR_PAD_LEFT)." - ${host}</option>";
}

echo json_encode($options);
?>

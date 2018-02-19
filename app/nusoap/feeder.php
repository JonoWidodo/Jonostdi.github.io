<?php
class Feeder
{
    function getProxy()
    {
        $feeder_url = 'http://localhost:8082/ws/sandbox.php?wsdl';
        $client = new nusoap_client($feeder_url,TRUE);
        return $client->getProxy();
    }
      
    function getToken($live = FALSE)
    {
        $username = '043079';
        $password = 'dkyaad25gn';
        $token = $this->getProxy()->GetToken($username, $password);
        return $token;
    }
}
?>
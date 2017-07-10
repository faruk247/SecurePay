<?php

$xml="<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
$xml.="<SecurePayMessage>";
$xml.=  "<MessageInfo>";
$xml.="<messageID>8af793f9af34bea0cf40f5fb750f64</messageID>";
$xml.="<messageTimestamp>20162201115745000000+660</messageTimestamp>";
$xml.="<timeoutValue>60</timeoutValue>";
$xml.="<apiVersion>xml-4.2</apiVersion>";
$xml.="</MessageInfo>";
$xml.="<MerchantInfo>";
$xml.="<merchantID>ABC0001</merchantID>";
$xml.="<password>abc123</password>";
$xml.="</MerchantInfo>";
$xml.="<RequestType>Payment</RequestType>";
$xml.="<Payment>";
$xml.="<TxnList count='1'>";
$xml.="<Txn ID='1'>";
$xml.="<txnType>0</txnType>";
$xml.="<txnSource>23</txnSource>";
$xml.="<amount>2600</amount>";
$xml.="<recurring>1000</recurring>";
$xml.="<currency>AUD</currency>";
$xml.="<purchaseOrderNo>test</purchaseOrderNo>";
$xml.="<CreditCardInfo>";
$xml.="<cardNumber>4444333322221111</cardNumber>";
$xml.="<cardType>4444333322221111</cardType>";
$xml.="<expiryDate> 08/23</expiryDate>";
$xml.="<cvv>123</cvv>";
$xml.="</CreditCardInfo>";
$xml.="</Txn>";
$xml.="</TxnList>";
$xml.="</Payment>";
$xml.="</SecurePayMessage>";




ini_set('max_execution_time', 0);

$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'https://test.api.securepay.com.au/xmlapi/payment');
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch, CURLOPT_POST, true );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch, CURLOPT_POSTFIELDS, $xml );
$result = curl_exec($ch);
curl_close($ch);

$xml = simplexml_load_string($result);


$json = json_encode($xml);
$xml_data= json_decode($json,TRUE);

print_r($xml_data);

?>
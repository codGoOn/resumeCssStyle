<?php
header('Content-Type: text/html;charset=utf-8');
/* Сюда приходят данные с сервера */
$arMessage = array();
/* Какой-то идентификатор пользователя */
$userid = 1;
/* Основная функция */
function make_request($request_xml, &$arMessage, $num) {
	$opts = array(
				'http'=>array(
							'method'=>"POST",
							'header'=>"User-Agent: PHPRPC/1.0\r\n" .
										"Content-Type: text/xml\r\n" .
										"Content-length: " . strlen($request_xml) . "\r\n",
							'content'=>"$request_xml"			
						)
			);
	$context = stream_context_create($opts);		
	//$fp = fopen('http://mysite.local/demo/xml-rpc/server.php', 'r', false, $context);
	//$retval = stream_get_contents($fp);
	$retval = file_get_contents('http://mysite.local/demo/xml-rpc/server.php', false, $context);
	$data = xmlrpc_decode($retval);
	if (is_array($data) && xmlrpc_is_fault($data)){
		$arMessage[] = "Невозможно получить данные о полке номер $num";
		$arMessage[] = "Error Code: " . $data['faultCode'];
		$arMessage[] = "Error Message: " . $data['faultString'];
	}else{
		$arMessage[] = $data;
	}
}	
/* Номер необходимой полки */
$num = "10";
$request_xml = xmlrpc_encode_request('getStock', array($userid, $num));
make_request($request_xml, $arMessage, $num);
/* Добавляем пустой элемент для вывода пустой строки */
$arMessage[] = "";
/* Номер необходимой полки */
$num = "2";
$request_xml = xmlrpc_encode_request('getStock', array($userid, $num));
make_request($request_xml, $arMessage, $num);
/* Добавляем пустой элемент для вывода пустой строки */
$arMessage[] = "";
/* Номер необходимой полки */
$num = "3";
$request_xml = xmlrpc_encode_request('getStock', array($userid, $num));
make_request($request_xml, $arMessage, $num);
/* Добавляем пустой элемент для вывода пустой строки */
$arMessage[] = "";
/* Такой полки нет */
$num = "4";
$request_xml = xmlrpc_encode_request('getStock', array($userid, $num));
make_request($request_xml, $arMessage, $num);
/* Добавляем пустой элемент для вывода пустой строки */
$arMessage[] = "";
/* Неправильное число аргументов */
$num = "4";
$request_xml = xmlrpc_encode_request('getStock', array($num));
make_request($request_xml, $arMessage, $num);
/* Вывод результата */
print '<pre>';
foreach ($arMessage as $message)
	print $message."\n";
print '</pre>';
?>
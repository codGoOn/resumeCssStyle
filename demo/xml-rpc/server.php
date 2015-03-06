<?php
/* Наш склад */
$arStocks = array('1'=>100, '2'=>200, '3'=>300);
/* Основная функция */
function get_stock($method_name, $args, $extra) {
	if (!is_array($args) || count($args) <> 2)
		return array('faultCode'=>-2, 'faultString'=>'Неверное количество параметров!');
	$userid = $args[0];
	$num = $args[1];
	if (array_key_exists($num, $GLOBALS['arStocks']))
		return "На полке номер $num " . $GLOBALS['arStocks'][$num] . ' товаров';
	else
		return array('faultCode'=>-1, 'faultString'=>"Полка номер $num отсутствует!");
}
$request_xml = file_get_contents("php://input");
/* Создаем XML-RPC сервер и регистрируем функцию */
$xmlrpc_server = xmlrpc_server_create();
xmlrpc_server_register_method($xmlrpc_server, "getStock", "get_stock");
/*Отдаем правильный заголовок*/
header('Content-Type: text/xml;charset=utf-8');
/* Отдаем результат */
print xmlrpc_server_call_method($xmlrpc_server, $request_xml, null);
?>
<?
if (1) error_reporting(E_ALL ^ E_NOTICE);
else  error_reporting(0);

//-----------------------------------------------------------------------------------------------------
if ($_SERVER["DOCUMENT_ROOT"]) $_SERVER_NAME=explode($_SERVER["DOCUMENT_ROOT"], str_replace("\\","/",dirname(__FILE__)));
$_SERVER_NAME=$_SERVER['SERVER_NAME'].$_SERVER_NAME[1];
$tmp_server_path=explode(":",dirname(__FILE__));
count($tmp_server_path)==1 ? $_SERVER_PATH=$tmp_server_path[0] : $_SERVER_PATH=str_replace("\\","/",$tmp_server_path[1]);

define(SERVER_NAME,$_SERVER_NAME);
define(SERVER_PATH,$_SERVER_PATH);
//-----------------------------------------------------------------------------------------------------
$DB_CONF = array(
'User' => 'root',
'Password' => '123456',
'Database' => 'test',
'Port' => '3306',
//-----------------------------------------------------------------------------------------------------
'Host' => '127.0.0.1',
'Type' => 'mysqlt',
'Charset'=>'utf8',
'Modules'=> 'transaction : pear'
);
//-----------------------------------------------------------------------------------------------------

?>
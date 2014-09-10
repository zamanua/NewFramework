<?php

$oObject=new Test();
$sPreffix='test_';

switch (Base::$aRequest['action'])
{
	case 'show':
		$oObject->Show();
		break;
	
	default:
		$oObject->Index();
		break;

}
?>
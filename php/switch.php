<?php

	switch($pg){
		case 'list':
			if(isset($art))
				include('php/art.php');
			else
				include('php/list.php');
			break;
		case 'who':
			include('php/who.php');
			break;
		case 'account':
			include('php/account.php');
			break;
		case 'insert':
			include('php/admin/insertart.php');
			break;
		case 'conditions':
			include('php/conditions.php');
			break;
		case 'insertphoto':
			include('php/admin/insertphoto.php');
			break;
		case 'cart':
			include('php/cart.php');
			break;
		case 'deleteart':
			include('php/admin/deleteart.php');
			break;
		case 'signup':
			include('php/signup.php');
			break;
		case 'inviodati':
			include('php/signup_verification.php');
			break;
		case 'login':
			include('php/login.php');
			break;
		case 'logintry':
			include('php/logintry.php');
			break;
		case 'logout':
			include('php/logout.php');
			break;
		case 'where':
			include('php/where.php');
			break;
		case 'err':
			include('php/err.php');
			break;
		case 'opcart':
			include('php/opcart.php');
			break;
		default:
			include('view/home.php');
	}
?>				
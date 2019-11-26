<?php 
switch($action)
{
	case 'about':
		show_about(); break;
	case 'contact':
		show_contact(); break;
	case 'delivery':
		show_deli_list();break;
	default:
		exit("Unknow action");
}

function show_about()
{
	$pg_title = "About us | The Best Shop";
	render("about_us", $pg_title);
}

function show_contact()
{
	$pg_title = "Contact us | The Best Shop";
	render("contact_us", $pg_title);
}

function show_deli_list()
{
	$pg_title = "Delivery List | The Best Shop";
	$delis = get_delis();
	render("show_deli_list", $pg_title, $delis);
}

 ?>

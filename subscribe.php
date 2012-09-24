<?php

/*

curl -d "first=asdf&last=sdwef&email=luqmaan@createchwebdesign.com&skill=designer&phone=23i1&website=wefwef.com" http://localhost/usfhackathon.com/subscribe.php

*/

if ($_POST['email'] == 'email@mail.com')
	die();

header("Cache-Control: no-cache");

require_once 'config.php';
require_once 'idiorm/idiorm.php';

ORM::configure('mysql:host='.$host.';dbname='.$dbname.'');
ORM::configure('username', $user);
ORM::configure('password', $pass);

$max_seats = ORM::for_table('option')->where('name', 'max_guests')->find_one()->value;
$seats_filled = ORM::for_table('guest')->where('status', 'valid')->count();
$empty_seats = $max_seats - $seats_filled;

if ($empty_seats > 0) {
	$status = "valid";
}
else {
	$status = "waitlist";
}

$guest = ORM::for_table('guest')->create();
$guest->first = $_POST['first'];
$guest->last = $_POST['last'];
$guest->email = $_POST['email'];
$guest->phone = $_POST['phone'];
$guest->skill = $_POST['skill'];
$guest->website = $_POST['website'];
$guest->created_on = date('Y-m-d H:i:s');
$guest->status = $status;
$guest->save();

$sysmsg = $guest->first . " : first\n" . $guest->last . " : last\n" . $guest->email . " : email\n" . $guest->phone . " : phone\n" . $guest->skill . " : skill\n" . $guest->website . " : website\n"  . $guest->status . " : status\n";
$guestmsg = "Hey ". $guest->first .",\n\nThanks for signing up for the The Createch Hackathon. See you on the Saturday that your Saturday will be.\n\nBe sure to view and share your ideas for what to build at the hackathon, here http://createchusf.uservoice.com/forums/177021-general \n\n -\nCreatech at USF\nhttp://facebook.com/createchusf\n (Oh, and do let us know if we're taking the Old Spice Man joke a little too far. :P) ";

mail($guest->email, "Registered: The Createch Hackathon", $guestmsg, $headers);
mail('luqmaan@createchwebdesign.com', $guest->first . " " . $guest->last, $sysmsg);
mail('hebrontgeorge@gmail.com', $guest->first . " " . $guest->last, $sysmsg);

$output = array(
	"result" => "success",
	"status" => $status
);

$json = json_encode($output);
echo isset($_REQUEST['callback'])
    ? "{$_REQUEST['callback']}($json)"
    : $json;

?>
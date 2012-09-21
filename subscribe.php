<?php

/*

curl -d "first=asdf&last=sdwef&email=ijf@ijeif.com&skill=designer&phone=23i1&website=wefwef.com" http://localhost/createch-hackathon/subscribe.php

*/

require_once 'config.php';
require_once 'idiorm/idiorm.php';

ORM::configure('mysql:host=localhost;dbname=hackathon');
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

$output = array(
	"result" => "success",
	"status" => $status
);

$json = json_encode($output);
echo isset($_REQUEST['callback'])
    ? "{$_REQUEST['callback']}($json)"
    : $json;

?>
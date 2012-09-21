<?php

require_once 'config.php';
require_once 'idiorm/idiorm.php';

ORM::configure('error_mode', PDO::ERRMODE_WARNING);

ORM::configure('mysql:host=localhost;dbname=hackathon');
ORM::configure('username', $user);
ORM::configure('password', $pass);

$db = ORM::get_db();

$db->exec("
    CREATE TABLE `guest` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `first` text NOT NULL,
        `last` text NOT NULL,
        `email` text NOT NULL,
        `phone` text NOT NULL,
        `website` text NOT NULL,
        `skill` text NOT NULL,
        `status` text NOT NULL,
        `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
        `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;"
);

$db->exec("
    CREATE TABLE `option` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` text,
        `value` text,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;"
);

$option = ORM::for_table('option')->create();

$option->name = 'max_guests';
$option->value = '50';
$option->save();

?>
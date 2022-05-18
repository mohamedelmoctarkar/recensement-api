<?php

return [
    'name' => 'Authentification',
    'use_to_web' => false, // put true if you wont to use module authentification to web  else put false
    'login_blade_name' => 'login', // if  use_to_web true name to login_blade is require
    'page_name_after_login' => 'home', // if  use_to_web true name to page_name_after_login is require
    'use_to_api' => true, // put true if you wont to use module authentification to api else put false
];

// run  php artisan queue:table &&  change QUEUE_CONNECTION=database in file .env && run php artisan migrate && run php artisan queue:listen

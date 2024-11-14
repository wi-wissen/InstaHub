<?php

return [
    // readonly hubs can't rehash passwords
    // https://laravel.com/docs/11.x/upgrade#password-rehashing
    'rehash_on_login' => false,
];
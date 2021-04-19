<?php

return array(

    'user\/order\/price_id-([0-9]+)'=>'user/order/$1',
    'user\/id=([0-9]+)' => 'user/cabinet/$1',

    'user\/register' => 'user/register',
    'user\/login' => 'user/login',
    'user\/logout' => 'user/logout',
    'news\/comment\/([0-9]+)'=>'news/view_comment/$1',
    'news\/page-([0-9]+)' => 'news/index/$1',
    'news\/([0-9]+)' => 'news/item/$1',
    'news' => 'news/index',
    'about' => 'site/about',
    'contacts' => 'site/contacts',

    '' => 'site/index',
);

?>
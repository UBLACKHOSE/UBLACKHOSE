<?php

return array(

    'film\/([0-9]+)\/\Dq=([0-9]+)'=>'film/view2/$1/$2',
    'film\/([0-9]+)\/\Dreting=([0-9]+)'=>'film/view_reiting/$1/$2',
    'film\/([0-9]+)\/reting'=>'film/view_reting/$1',
    'film\/([0-9]+)' => 'film/view/$1',
    'search\/\Dsearch=([_0-9A-Za-zА-Яа-пр-яЁё%\s]+)'=>'site/search/$1',
    'user\/login' => 'user/login',
    'user\/register' => 'user/register',
    'user\/logout' => 'user/logout',
    'cabinet' => 'cabinet/index',
    '' => 'site/index'
);

?>
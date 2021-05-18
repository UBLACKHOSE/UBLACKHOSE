<?php
// Массив соостоящий из шаблонов для сверки текущего url с шаблоном.
return array(

    'user\/register' => 'user/register',
    'user\/login' => 'user/login',
    'user\/logout' => 'user/logout',
    'search\/\Dsearch=([_0-9A-Za-zА-Яа-пр-яЁё%\s]+)'=>'site/search/$1',
    'category\/([0-9]+)\/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category\/([0-9]+)' => 'catalog/category/$1',
    'news\/comment\/([0-9]+)'=>'news/view_comment/$1',
    'news\/([0-9]+)' => 'news/view/$1',
    '' => 'site/index'
);

?>
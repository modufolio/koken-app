<?php

    $c = new Category();
    $c->where('slug', null)
        ->or_where('slug', '')
        ->limit(100)->get_iterated();

    foreach ($c as $content) {
        $content->slug = '__generate__';
        $content->save();
    }

    $c = new Category();

    if ($c->where('slug', null)->or_where('slug', '')->count() === 0) {
        $done = true;
    }

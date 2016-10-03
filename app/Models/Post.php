<?php

namespace BA\Models

class Post
{
    public $app;

    public function __construct()
    {
        global $app;
        $this->app = $app;
    }
}

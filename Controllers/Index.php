<?php

namespace Controllers;

class Index
{
    /**
     * Function for displaying form
     *
     * @return void
     */
    public function index(): string
    {
        return view('index/index');
    }
}
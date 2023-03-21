<?php

namespace Controllers;

class Index
{
    /**
     * function for displaying form
     * @return void
     */
    public function index(): void{
        view('index/index');
    }
}
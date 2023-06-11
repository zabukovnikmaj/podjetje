<?php

namespace Controllers;

use Services\Storage;

class Config extends BaseController
{
    /**
     * function for displaying form
     *
     * @return string
     */
    public function show(): string
    {
        $configFile = require base_path('config/config.php');

        return view('config/edit', [
            'existingFileType' => $configFile['currentStorageMethod'],
            'fileTypes' => $configFile['possibleStorageMethods']
        ]);
    }

    /**
     * function for processing data before saving
     *
     * @return string
     */
    public function processData(): void
    {

        redirect('/');
    }
}
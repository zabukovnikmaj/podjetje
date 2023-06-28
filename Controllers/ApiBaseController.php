<?php

namespace Controllers;

use Services\Storage;

class ApiBaseController
{

    /**
     * Function for generating REST response
     *
     * @return void
     */
    public function apiData(): void
    {
        //TODO: adding authentication of the user, so only certain users can access this API

        $table = $this->getFileNameFromUri();
        $data = Storage::loadElements($table);

        $this->sendResponse(200, [
            'status' => 'success',
            'message' => 'Data loaded successfully!',
            'data' => $data
        ]);
    }

    /**
     * Function for sending API response with specific status code and data
     *
     * @param int $statusCode
     * @param array $data
     * @return void
     */
    protected function sendResponse(int $statusCode, array $data): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json($data);
        exit;
    }

    /**
     * Function for getting filename from URI
     *
     * @return string
     */
    protected function getFileNameFromUri(): string
    {
        $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $filename = strtoupper(substr($currentUri, 5, 1)) . substr($currentUri, 6, strlen($currentUri));
        return trim($filename, '/');
    }
}
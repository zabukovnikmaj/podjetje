<?php

/**
 * Function that makes path into one string
 *
 * @param string $path
 * @return string
 */
function base_path(string $path): string
{
    return BASE_PATH . $path;
}

/**
 * Function for creating path for saving data into json
 *
 * @param string $path
 * @return string
 */
function storage_path(string $path): string
{
    return base_path("data/" . $path);
}

/**
 * Function for displaying appropriate views
 *
 * @param string $path
 * @param array $attributes
 * @return void
 */
function view(string $path, array $attributes = []): string
{
    extract($attributes);

    return require base_path("views/" . $path . ".php");
}

/**
 * Function for creating  directory if it does not exist yet
 *
 * @param string $name
 * @return void
 */
function createDirectory(string $path): void
{
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }
}

/**
 * Function for making redirects
 *
 * @param string $path
 * @return void
 */
function redirect(string $path): void
{
    header('Location: ' . $path);
    exit();
}

/**
 * Function for converting array to json
 *
 * @param array $dataToEncode
 * @return string
 */
function json(array $dataToEncode): string
{
    return json_encode($dataToEncode, JSON_PRETTY_PRINT);
}

/**
 * Function for starting file download on client side
 *
 * @param string $filename
 * @return void
 */
function fileDownload(string $filename): void
{
    $basePath = base_path('data/files/');

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $basePath . $filename . '"');
    header('Content-Length: ' . filesize($basePath . $filename));

    readfile($basePath . $filename);
    exit;
}

/**
 * Function generates unique UUID
 *
 * @return string
 * @throws Exception
 */
function uuid(): string
{
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = random_bytes(16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

/**
 * Function retrieves old data for specific field from posted data.
 *
 * @param string $name
 * @param string|null $default
 * @return string
 */
function old(string $name, ?string $default = null): string
{
    if (isset($_POST[$name])) {
        return htmlspecialchars($_POST[$name]);
    }

    return htmlspecialchars((string)$default);
}

/**
 * Function is used to render request method field in form
 *
 * @param string $method
 * @param $var
 * @return string
 */
function request_method(string $method, $var): string
{
    if (!empty($var)) {
        return '<input type="hidden" name="_method" value="' . $method . '">';
    }
    return '';
}
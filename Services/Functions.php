<?php
/**
 * method that makes path into one string
 *
 * @param string $path
 * @return string
 */
function base_path(string $path): string
{
    return BASE_PATH . $path;
}

/**
 * method for creating path for saving data into json
 *
 * @param string $path
 * @return string
 */
function storage_path(string $path): string
{
    return base_path("data/" . $path);
}

/**
 * method for displaying appropriate views
 *
 * @param string $path
 * @param array $attributes
 * @return void
 */
function view(string $path, array $attributes = []): void
{
    extract($attributes);

    include base_path("views/" . $path . ".php");
}

/**
 * Method generates unique UUID
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
 * Method retrieves old data for specific field from posted data.
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
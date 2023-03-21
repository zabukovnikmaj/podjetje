<?php
/** method that makes path into one string
 * @param string $path
 * @return string
 */
function base_path(string $path): string
{
    return BASE_PATH . $path;
}

/**method for creating path for saving data into json
 * @param string $path
 * @return string
 */
function storage_path(string $path): string
{
    return base_path("storage/" . $path);
}

/**method for displaying appropriate views
 * @param string $path
 * @param array $attributes
 * @return void
 */
function view(string $path, array $attributes = []): void
{
    extract($attributes);

    include base_path("views/" . $path . ".php");
}
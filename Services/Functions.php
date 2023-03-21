<?php

function base_path(string $path): string
{
    return BASE_PATH . $path;
}

function storage_path(string $path): string
{
    return base_path("storage/" . $path);
}

function view(string $path, array $attributes = []): void
{
    extract($attributes);

    include base_path("views/" . $path . ".php");
}
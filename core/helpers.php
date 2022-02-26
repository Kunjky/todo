<?php

/**
 * Require a view.
 *
 * @param  string $name
 * @param  array  $data
 */
function view($name, $data = [])
{
    extract($data);

    return require "app/views/{$name}.view.php";
}

/**
 * Redirect to a new page.
 *
 * @param  string $path
 */
function redirect($path)
{
    header("Location: /{$path}");
}

/**
 * Pretty print of data
 *
 * @param  object $data
 */
function dd($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre';
}

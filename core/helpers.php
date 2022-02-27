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
    return die();
}

/**
 * Validate inputs
 *
 * @param  array $inputs
 */
function validate($inputs)
{
    $errors = [];

    foreach ($inputs as $key => $regex) {
        if (!isset($_POST[$key]) || !preg_match($regex, $_POST[$key])) {
            $errors[$key] = "{$key} is invalid";
        }
    }

    return $errors;
}

/**
 * Response JSON
 *
 * @param  array $data
 */
function responseJson($data)
{
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}

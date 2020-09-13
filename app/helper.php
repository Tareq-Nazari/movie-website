<?php
if (!function_exists('image_store')) {
    function image_store($image)
    {
        $destination = base_path() . '/images/';
        $filename = rand(111111111, 999999999) . '.' . $image->getClientOriginalExtension();
        $file = $image;
        $file->move($destination, $filename);
        return $filename;
    }
}

<?php

use Illuminate\Support\Facades\Storage;

/**
 * Set Image given a img from database
 */
function useImage($image)
{
    if (str($image)->contains('uploads/')) {
        return asset("storage/$image");
    } else {
        return $image;
    }
}


/**
 * Stores an image given an image request and a directory
 * @return string
 */
function saveImage($image, $dir, $prefix = "image")
{
    $ext = $image->extension();
    $name =  $prefix . uniqid() . '.' . $ext;
    $path = $image->storeAs("uploads/$dir", $name, 'public');
    return $path;
}

/**
 * Updates a file given a new file and old path
 * @return string $new_path
 */
function updateFile($file, $old_path)
{
    $new_path = $old_path;
    $path = "public/" . $old_path;
    if ($file) {
        $new_path = saveImage($file, 'profile', 'user-image');
        if (Storage::exists($path)) {
            $deleted = Storage::delete($path);
        }
    }
    return $new_path;
}

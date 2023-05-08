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
 */
function saveImage($image, $dir, $prefix = 'image')
{
    $ext = $image->extension();
    $name = $prefix . uniqid() . '.' . $ext;
    $path = $image->storeAs("uploads/$dir", $name, 'public');
    return $path;
}

/**
 * Updates a file given a new file and old path
 * @return string $new_path
 */
function updateFile($file, $old_path, $dir,  $prefix = "image")
{
    $new_path = $old_path;
    $path = 'public/' . $old_path;
    if ($file) {
        $new_path = saveImage($file, $dir, $prefix);
        if (Storage::exists($path)) {
            $deleted = Storage::delete($path);
        }
    }
    return $new_path;
}

/**
 * An Array for social media platform data
 */
function socialItems(): array
{
    $socialItems = [
        [
            'name' => 'facebook',
            'icon' => 'mdi mdi-facebook'
        ],
        [
            'name' => 'messenger',
            'icon' => 'mdi mdi-facebook-messenger'
        ],
        [
            'name' => 'twitter',
            'icon' => 'mdi mdi-twitter'
        ],
        [
            'name' => 'youtube',
            'icon' => 'mdi mdi-youtube'
        ],
        [
            'name' => 'whatsapp',
            'icon' => 'mdi mdi-whatsapp'
        ],
        [
            'name' => 'linkedin',
            'icon' => 'mdi mdi-linkedin'
        ],
        [
            'name' => 'telegram',
            'icon' => 'mdi mdi-telegram'
        ],
        [
            'name' => 'google+',
            'icon' => 'mdi mdi-google-plus'
        ],
        [
            'name' => 'snapchat',
            'icon' => 'mdi mdi-snapchat'
        ],
        [
            'name' => 'github',
            'icon' => 'mdi mdi-github'
        ],
    ];
    return $socialItems;
}

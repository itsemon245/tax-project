<?php
function useImage($image)
{
    if (str($image)->contains('uploads/')) {
        return asset("storage/$image");
    } else {
        return $image;
    }
}

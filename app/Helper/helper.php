<?php

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Set Image given a img from database.
 *
 * @param string $image
 *
 * @return string url
 */
function useImage($image) {
    return str($image)->isUrl() ? $image : asset("storage/$image");
}

/**
 * Returns current timestamp in format = 'Y-m-d-H-m-s-u'.
 *
 * @return string
 */
function timestamp() {
    return Carbon::now()->format('Y-m-d-H-m-s-u');
}
/**
 * Stores an image given an image request and a directory.
 *
 * @param UploadedFile $image
 * @param string       $prefix skip if you need clientOriginalName
 * @param string       $disk   default = public
 *
 * @return string $new_path
 */
function saveImage($image, string $dir, ?string $prefix = '', string $disk = 'public') {
    if ($image) {
        if ('' === $prefix || null === $prefix) {
            $prefix = str($image->getClientOriginalName())->slug();
        }
        $ext = $image->extension();
        $name = $prefix.'-'.timestamp().'.'.$ext;
        $path = $image->storeAs("uploads/$dir", $name, $disk);

        return $path;
    } else {
        return $image;
    }
}

/**
 * Updates a file given a new file and old path.
 *
 * @param UploadedFile $file
 * @param string       $old_path
 * @param string       $dir
 * @param string       $prefix   skip if you need clientOriginalName
 * @param string       $disk     default = public
 *
 * @return string $new_path
 */
function updateFile($file, $old_path, $dir, $prefix = '', $disk = 'public') {
    if (null === $file) {
        return $old_path;
    }
    $new_path = $old_path;
    $isFile = str($old_path)->contains('/storage');
    if ($isFile) {
        $old_path = explode('storage', $old_path)[1];
    }
    $path = $old_path ? $disk.'/'.$old_path : 'no file exists';
    $fileExists = Storage::exists($path);
    if ($fileExists) {
        if ($file) {
            $new_path = saveImage($file, $dir, $prefix, $disk);
            Storage::delete($path);
        }
    } else {
        $new_path = saveImage($file, $dir, $prefix, $disk);
    }

    return $new_path;
}

/**
 * Deletes a file given its path from database.
 *
 * @param string $old_path
 * @param string $disk     default = public
 */
function deleteFile($old_path, $disk = 'public') {
    $isFile = str($old_path)->contains('/storage');
    if ($isFile) {
        $old_path = explode('storage', $old_path)[1];
    }
    $path = $disk.'/'.$old_path;
    $deleted = false;
    if (Storage::exists($path)) {
        $deleted = Storage::delete($path);
    }

    return $deleted;
}
/**
 * An Array for social media platform data.
 */
function socialItems(): array {
    $socialItems = [
        [
            'name' => 'facebook',
            'icon' => 'mdi mdi-facebook',
        ],
        [
            'name' => 'messenger',
            'icon' => 'mdi mdi-facebook-messenger',
        ],
        [
            'name' => 'twitter',
            'icon' => 'mdi mdi-twitter',
        ],
        [
            'name' => 'youtube',
            'icon' => 'mdi mdi-youtube',
        ],
        [
            'name' => 'whatsapp',
            'icon' => 'mdi mdi-whatsapp',
        ],
        [
            'name' => 'linkedin',
            'icon' => 'mdi mdi-linkedin',
        ],
        [
            'name' => 'telegram',
            'icon' => 'mdi mdi-telegram',
        ],
        [
            'name' => 'google+',
            'icon' => 'mdi mdi-google-plus',
        ],
        [
            'name' => 'snapchat',
            'icon' => 'mdi mdi-snapchat',
        ],
        [
            'name' => 'github',
            'icon' => 'mdi mdi-github',
        ],
    ];

    return $socialItems;
}

/**
 * Get records from the specified table with queries.
 *
 * @param string $table
 * @param array  $queries
 * @param int limit
 */
function getRecords($table = 'users', $queries = [], $limit = 10) {
    if (count($queries) > 0) {
        if (!is_array($queries[0])) {
            $queries = [$queries];
        }
    }
    $records = DB::table($table)->where($queries)->limit($limit)->get();

    return $records;
}

/**
 * Get count for any given table from database.
 *
 * @param string $table
 * @param array  $queries
 *
 * @return int count
 */
function countRecords($table = 'users', $queries = []) {
    if (count($queries) > 0) {
        if (!is_array($queries[0])) {
            $queries = [$queries];
        }
    }
    $count = DB::table($table)->where($queries)->count();

    return $count;
}

/**
 * Returns an image url from picsum.photos.
 *
 * @param ?string $seed
 * @param ?int    $width
 * @param ?int    $height
 *
 * @return string $picsum
 */
function picsum(?string $seed = null, int $width = 720, ?int $height = null) {
    if (!$height) {
        $height = $width;
    }
    if (!$seed) {
        $picsum = "https://picsum.photos/$width/$height";
    } else {
        $seed = str($seed)->slug();
        $picsum = "https://picsum.photos/seed/$seed/$width/$height";
    }

    return $picsum;
}

/**
 * Returns an array to query for reviews star count.
 */
function reviewsAndStarCounts(): array {
    $array = [
        'reviews',
        'reviews as reviews_5star' => function (Builder $query) {
            $query->where('rating', 5);
        },
        'reviews as reviews_4star' => function (Builder $query) {
            $query->where('rating', 4);
        },
        'reviews as reviews_3star' => function (Builder $query) {
            $query->where('rating', 3);
        },
        'reviews as reviews_2star' => function (Builder $query) {
            $query->where('rating', 2);
        },
        'reviews as reviews_1star' => function (Builder $query) {
            $query->where('rating', 1);
        },
    ];

    return $array;
}

/**
 * Returns current fiscal year.
 *
 * @return string like '2023-2024'
 */
function currentFiscalYear(): string {
    $from = currentYear() - 1;
    $to = currentYear();
    $currentYear = $from.'-'.$to;

    return $currentYear;
}

/**
 * Returns current year.
 */
function currentYear(): int {
    $date = now('Asia/Dhaka');
    $year = (int) now()->year;
    $month = (int) $date->month;
    if ($month >= 6) {
        $year = (int) now()->year + 1;
    }

    return $year;
}
/**
 * Returns style for review stars based on avg rating.
 *
 * @param float $rating
 * @param float $avg
 */
function starStyle($rating, $avg) {
    $gt = $rating <= $avg;
    $lt = $avg <= $rating + 1;
    $mask = '';
    if ($gt & $lt) {
        $percnetage = (round($avg, 1) - $rating) * 100;
        $black = "black $percnetage%";
        $transparent = 'transparent '.(100 - $percnetage).'%';
        $mask = "
    -webkit-mask-image: linear-gradient(to right, $black , $transparent);
    mask-image: linear-gradient(to right, $black, $transparent);
    ";
    }

    return $mask;
}

/**
 * Returns an integer for paginate count
 * Returns 20 by default.
 *
 * @param ?int count default 20
 *
 * @return int default 20
 */
function paginateCount(?int $count = 20): int {
    // $count = $count === null ? $defaultCount : $count;
    return $count;
}
/**
 * Extract Coordinates from google map's embeeded url.
 */
function extractCoordinates(string $url) {
    $pattern = '/@(-?\d+\.\d+),(-?\d+\.\d+)/';
    preg_match($pattern, $url, $matches);

    if (3 == count($matches)) {
        $latitude = $matches[1];
        $longitude = $matches[2];

        return [$latitude, $longitude];
    } else {
        return false;
    }
}
/**
 * Construct Google maps shared url from coordinates.
 *
 * @param string $latitude
 * @param string $longitude
 *
 * @return string
 */
function constructShareURL($latitude, $longitude) {
    $baseUrl = 'https://www.google.com/maps/place/';

    return $baseUrl.$latitude.','.$longitude;
}

function convertEmbedUrl(string $embeddedUrl): ?string {
    $coordinates = extractCoordinates($embeddedUrl);

    if (false !== $coordinates) {
        // Construct share URL
        return constructShareURL($coordinates[0], $coordinates[1]);
    }

    return null;
}

function currencyFormat(mixed $value): string {
    $value = (float) $value;
    $formatter = new NumberFormatter('en_BD', NumberFormatter::DEFAULT_STYLE);

    return '&#2547; '.$formatter->format($value);
}

function routeWithQuery(string $name, mixed $params = []) {
    $queryStrings = '';
    $count = 0;
    if (count(request()->query()) > 0) {
        $queryStrings = '?';
        $queryStrings .= http_build_query(request()->query());

        return route(
            $name,
            $params
        ).$queryStrings;
    }

    return route(
        $name,
        $params
    );
}

function isDatabaseOk() {

    return true;
    try {
        DB::getPdo();
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

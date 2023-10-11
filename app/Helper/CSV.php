<?php

namespace App\Helper;

use Illuminate\Http\UploadedFile;

class CSV
{
    public $path;
    public function __construct(string $path = null)
    {
        $this->path = $path;
    }

    function upload(UploadedFile $file) : string {
            $path = saveImage(image:$file, disk: 'temp', dir: 'csv');
            $this->path = 'temp/'.$path;
            return $path;
    }

    public function parse()
    {
        $rows = [];
        $handle = fopen($this->path, "r");
        while (($row = fgetcsv($handle)) !== false) {
            $rows[] = $row;
        }
        fclose($handle);
        // Remove the first one that contains headers
        $headers = array_shift($rows);

        return compact('headers', 'rows');

    }
}

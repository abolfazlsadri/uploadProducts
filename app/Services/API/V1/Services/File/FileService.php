<?php 

namespace App\Services\API\V1\Services\File;

use App\Services\API\V1\Interfaces\FileInterface;
use App\Jobs\InsertProductJobs;

class FileService implements FileInterface
{
   
    public function upload(array $requset)
    {
        $path = request()->file('products')->getRealPath();
        if (!$path) return false;

        $file = file($path);
        if (!$file) return false;
        $header = str_replace(PHP_EOL, '', $file[0]);
        $header = explode(',' , $header);

        $data = array_slice($file, 1);
        if (!$data) return false;

        $parts = (array_chunk($data, 500));

        foreach($parts as $line) {
            InsertProductJobs::dispatch($line, $header)->onQueue('insertproduct');
        }

        return true;
    }

} 
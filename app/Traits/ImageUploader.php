<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait ImageUploader
{
    public function uploadFile(UploadedFile $file, $file_name = null, $folder = null, $dist = 'public')
    {
    }
}

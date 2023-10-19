<?php

namespace App\Services\Faker;

use Faker\Factory;
use Faker\Generator;
use Faker\Provider\Base;
use Illuminate\Support\Facades\Storage;

class FakerImageProvider extends Base
{
    public function storeTestImages(string $sourceDirectory, string $targetDirectory):string
    {

        if(!Storage::exists($targetDirectory)){
            Storage::makeDirectory($targetDirectory);
        }
        $image = $this->generator->file($sourceDirectory, Storage::path($targetDirectory), false);
        return $targetDirectory . '/' . $image;
    }
}

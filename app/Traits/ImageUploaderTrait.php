<?php

namespace App\Traits;

use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

Trait ImageUploaderTrait
{

    public function ImageUploader($file , $path){
        $image_name = time().$file->getClientOriginalName();
        $file->move($path , $image_name);
        return $image_name;
    }

}

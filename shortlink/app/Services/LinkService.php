<?php

namespace App\Services;

use App\Models\Link;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LinkService
{


    public function createShortLink(string $originalUrl): Link
    {

        
        $alias = Str::random(6);
        while ($this->checkAlias($alias)) {
            $alias = Str::random(6);
        }


        return Link::create([
            'original_url' => $originalUrl,
            'alias' => $alias,
        ]);
    }

    public function checkAlias(string $alias): ?Link{
        return Link::where('alias',$alias)->first();
    }

    public function checkLink(string $originalUrl): ?Link{
        return Link::where('original_url', $originalUrl)->first();
    }
}

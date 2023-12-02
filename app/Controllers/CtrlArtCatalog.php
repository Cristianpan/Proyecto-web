<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArtItem;

class CtrlArtCatalog extends BaseController
{
    public function userCatalog(string $userId)
    {
        $items = (new ArtItem())->select('artItemId, image,userId,shortDescription')->where('userId', $userId)->findAll();
        return view("pages/catalog/index", ['items' => $items]);
    }
}


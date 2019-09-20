<?php

namespace App\Http\Controllers;

use App\Favorite;
use Illuminate\Http\Request;
use Auth;

class FavoriteController extends Controller
{
    public function addFavorite($model, $id) {
        Auth::user()->favorites()->create([
            'favoriteable_type' => 'App\\' . ucfirst($model),
            'favoriteable_id' => $id
        ]);

        return back();
    }

    public function removeFavorite(Favorite $favorite) {
        $favorite->delete();
        
        return back();
    }
}

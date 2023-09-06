<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class RouteWisata extends Model
{
    protected $fillable = [ 'route_wisata_from', 'route_wisata_target', 'route_wisata_price', 'route_wisata_estimate'];
}

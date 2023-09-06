<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class DestinationWisata extends Model
{
    protected $fillable = ['destination_wisata_code', 'destination_wisata_province', 'destination_wisata_name', 'destination_wisata_description'];
}

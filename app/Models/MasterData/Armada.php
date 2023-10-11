<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{
    protected $table = 'armadas';

    protected $fillable = [
        'armada_category',
        'armada_merk',
        'armada_type',
        'armada_year',
        'armada_capacity',
        'armada_cylinder',
        'armada_seat',
        'armada_no_police',
        'armada_update_at',
        'id_pick_point',
        'id_destination_wisata'
    ];

    public function pickPoint()
    {
        return $this->belongsTo(PickPoint::class, 'id_pick_point');
    }

    public function destinationWisata()
    {
        return $this->belongsTo(DestinationWisata::class, 'id_destination_wisata');
    }


}

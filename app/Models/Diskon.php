<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    use HasFactory;

    protected $guarded = ['id_diskon'];
    protected $table = "Diskon";

    protected $primaryKey = 'id_diskon';
    public $timestamps = false;

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'detail_diskon', 'id_diskon', 'id_genre');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'id_genre');
    }

    public function detailDiskons()
    {
        return $this->hasMany(DetailDiskon::class, 'id_diskon', 'id_diskon');
    }

}

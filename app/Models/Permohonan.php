<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function desa()
    {
        return $this->hasOne('App\Models\Desa', 'id', 'desa_id');
    }

    public function prosedur()
    {
        return $this->hasOne('App\Models\Prosedur', 'id', 'prosedur_id');
    }

    public function keterangan()
    {
        return $this->hasOne('App\Models\Keterangan', 'id', 'keterangan_id');
    }
}

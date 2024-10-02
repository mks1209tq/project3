<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Org extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function parent()

    {

        return $this->belongsTo(Org::class, 'parent_id');

    }




    public function children()

    {

        return $this->hasMany(Org::class, 'parent_id');

    }




    public function positions()

    {

        return $this->hasMany(Position::class);

    }


}

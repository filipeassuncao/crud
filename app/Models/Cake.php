<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Cake extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'id',
        'name',
        'weight',
        'price',
        'available_quantity'
    ];

     /**
     * Obtém emails inscritos
     */
    public function subscribes()
    {
        return $this->hasMany(Subscribe::class,'cake_id','id');
    }
    /**
     * É acionada toda vez que usa essa entidade. Varia de acordo com a ação que é executada.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }
}

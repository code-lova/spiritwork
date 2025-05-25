<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Agreement extends Model
{
    use HasFactory;
    protected $table = 'agreements';
    protected $fillable = [
        'uuid',
        'userId',
        'propertyId',
        'catId',
        'payment_status',
        'email',
        'agreement_date',
        'name',
        'address',
        'signature',
        'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid()->toString();
        });
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function user(){
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function property(){
        return $this->belongsTo(PropertyListing::class, 'propertyId', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'catId', 'id');
    }



}

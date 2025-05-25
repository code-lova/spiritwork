<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyListing extends Model
{
    use HasFactory;
    protected $table = 'property_listings';
    protected $fillable = [
        'catId',
        'userId',
        'property_name',
        'slug',
        'description',
        'price',
        'type',
        'square_ft',
        'address',
        'country',
        'state',
        'city',
        'master_bedrooms_num',
        'bathrooms_num',
        'rooms_num',
        'availability',
        'service_charge',
        'status',
        'listing',
        'meta_title',
        'meta_keyword',
        'meta_description'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'catId', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function PropertyImages(){
        return $this->hasMany(PropertyImage::class, 'propertyId', 'id');
    }

    public function Agreements(){
        return $this->hasMany(Agreement::class, 'propertyId', 'id');
    }
}

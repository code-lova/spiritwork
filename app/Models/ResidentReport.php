<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentReport extends Model
{
    use HasFactory;
    protected $table = 'resident_reports';
    protected $fillable = ['user_id', 'title', 'message','attachment', 'is_read'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

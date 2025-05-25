<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepliedReport extends Model
{
    use HasFactory;
    protected $table = 'replied_reports';
    protected $fillable = ['report_id', 'tenant_id', 'admin_id', 'reply'];

    public function report(){
        return $this->belongsTo(ResidentReport::class);
    }

    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function tenant(){
        return $this->belongsTo(User::class, 'tenant_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\village;
class villageImages extends Model
{
    use HasFactory;
    public function villages(){
        return $this->belongsTo(village::class , 'village_id' , 'id');
    }
}

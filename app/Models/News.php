<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $casts = [
        'created_at' => 'datetime:d-m-Y'
        ];
    public function getArrayTagsAttribute(){
        return explode(',',$this->tags);
    }
}

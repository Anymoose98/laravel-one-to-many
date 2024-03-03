<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\type;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','description','img','type_id'];
    public function type(){
        return $this->belongsTo(Type::class);
    }
}

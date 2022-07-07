<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'name',
        'user_id'  
    ];
    
    public function user(){
        return $this->belongsTo('App\Models\User','user_id','user_id');
    }
    public function posts(){
        $this->hasMany('App\Models\Post','category_id','category_id');
    }
}

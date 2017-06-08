<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
        protected $fillable = ['name'];
        
        public function scopeDone( $query, $done ) 
        {
            return $query->where('done', $done);    
        }
}

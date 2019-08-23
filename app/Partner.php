<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
     public static function getAllPartners() {
        
        $partners = Partner::select('id','email','name')->get()->toArray();
        
        return $partners;
        
    }
    
}

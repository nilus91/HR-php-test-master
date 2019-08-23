<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;

class PartnerController extends Controller
{
    
    public static function showAllPartners() {
        
        return view('partners',
                [
                    'partner_list'=>Partner::getAllPartners()
                    
                ]);
        
    }
        
   
}

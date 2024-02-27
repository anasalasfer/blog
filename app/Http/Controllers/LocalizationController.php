<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    public function changeLanguage(Request $request)
    {
        $locale = $request->input('locale');
    
        if (in_array($locale, ['en', 'ar'])) {
            session()->put('locale', $locale);
        }
    
        return redirect()->back();
    }
    
    
}

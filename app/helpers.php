<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

function AdminName(){
    if(Auth::check()){
        $usr = Auth::user();
        return $usr->email;
    }
}

<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Partner;
use App\Traits\ImageUploaderTrait;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(){
        return view('user.partners.index')->with(['partners' => Partner::all()]);
    }
}

<?php

namespace App\Http\Controllers\tables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asset;


class Basic extends Controller
{
  public function index(Request $request)
  {
    $assets = Asset::all();
    return view('content.tables.tables-list-assets', compact('assets'));
  }
}

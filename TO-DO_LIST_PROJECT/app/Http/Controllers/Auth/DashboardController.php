<?php

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


public function index()
{
    $user = Auth::user();
    $name = $user->name; // assuming the user's name is stored in the 'name' column

    return view('pages.dashboard', compact('name'));}

}
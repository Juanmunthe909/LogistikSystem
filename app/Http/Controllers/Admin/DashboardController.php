<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard.main');
    }
}

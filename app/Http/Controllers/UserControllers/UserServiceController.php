<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class UserServiceController extends Controller
{
    public function index(Request $request, Service $services)
    {
        $q = $request->input('q');

        $services = $services->when($q, function ($query) use ($q) {
            return $query->where('name', 'like', '%' . $q . '%');
        })->paginate(5);

        // Menumpuk searching dan pagiation
        $request = $request->all();

        return view('frontEndCustomer.services.list', [
            'title' => 'Service',
            'services' => $services,
            'request' => $request
        ]);
    }
}

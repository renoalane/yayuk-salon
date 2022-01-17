<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Service $services)
    {
        $q = $request->input('q');

        $services = $services->when($q, function ($query) use ($q) {
            return $query->where('name', 'like', '%' . $q . '%');
        })->paginate(5);

        // Menumpuk searching dan pagiation
        $request = $request->all();

        return view('dashboard.service.list', [
            'services' => $services,
            'title' => 'service',
            'active' => 'services',
            'request' => $request
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.service.form', [
            'active' => 'services',
            'title' => 'service',
            'button' => 'Create',
            'url' => 'dashboard.service.store',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255|unique:services',
            'description' => 'max:500',
            'price' => 'required|regex:^[1-9][0-9]+^|not_in:0',
            'duration' => 'required',
            'status' => 'required',
        ]);


        // Note belum bisa
        $validateData['user_id'] = auth()->user()->id;
        Service::create($validateData);

        return redirect()
            ->route('dashboard.service')
            ->with('success', 'Service has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('dashboard.service.form', [
            'active' => 'services',
            'title' => 'category',
            'button' => 'Update',
            'service' => $service,
            'url' => 'dashboard.service.update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $rules = [
            'description' => 'max:500',
            'price' => 'required|regex:^[1-9][0-9]+^|not_in:0',
            'duration' => 'required',
            'status' => 'required',
        ];

        if ($request->name != $service->name) {
            $rules['name'] = 'required|unique:services';
        }

        $validateData = $request->validate($rules);

        $service->update($validateData);

        return redirect()
            ->route('dashboard.service')
            ->with('success', 'Service has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('dashboard.service')->with('success', 'Service has been deleted');
    }
}

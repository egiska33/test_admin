<?php

namespace App\Http\Controllers;

use App\Companie;
use App\Employee;
use App\Http\Requests\StoreCompanieRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companie::paginate(6);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Companie::class);

        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanieRequest $request)
    {
        $this->authorize('create', Companie::class);

        $path = $request->file('logo')->store('public/image');


        $company = new Companie();
        $company->name=$request->name;
        $company->address=$request->address;
        $company->logo= basename($path);

        $company->save();

        return redirect()->route('companies.index')->with(['message' => 'Company added successfully']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Companie::class);

        $company = Companie::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompanieRequest $request, $id)
    {
        $this->authorize('update', Companie::class);

        $path = $request->file('logo')->store('public/image');

        $company = Companie::findOrFail($id);

        $path_old = 'public/image/';
        Storage::delete($path_old.$company->logo);


        $company->name=$request->name;
        $company->address=$request->address;
        $company->logo= basename($path);
        $company->update();
        return redirect()->route('companies.index')->with(['message' => 'Company updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Companie::class);

        $numberOfEmployees = DB::table('employees')->where('company_id', $id)->count();

        if($numberOfEmployees == 0){
            $company = Companie::findOrFail($id);
            $path = 'public/image/';
            Storage::delete($path.$company->logo);
            $company->delete();
            return redirect()->route('companies.index')->with(['message' => 'Company deleted successfully']);
        } else {
            return redirect()->route('companies.index')->with(['message' => 'Can not delete Company because this company has employees']);

        }
    }
}

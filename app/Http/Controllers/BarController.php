<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBarRequest;
use App\Models\Bar;
use App\Models\City;
use App\Models\Province;
use App\Services\BarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarController extends Controller
{
    /** @var BarService */
    protected $barService;

    public function __construct(BarService $barService)
    {
        $this->barService = $barService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('bar.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('bar.create')->with([
            'provinces' => Province::all(),
            'cities' => City::all(),
        ]);
    }

    /**
     * @param StoreBarRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreBarRequest $request)
    {
        try {
            $data = $request->all();
            $data['bar_owner_id'] = Auth::id();
            Bar::create($data);

            return redirect('/bar-owner')->with('success', 'Bar Created');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

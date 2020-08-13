<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBarManagerRequest;
use App\Http\Requests\StoreBartenderRequest;
use App\Models\User;
use App\Services\BarOwnerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BarOwnerController extends Controller
{
    /** @var BarOwnerService */
    protected $barOwnerService;

    /**
     * BarOwnerController constructor.
     *
     * @param BarOwnerService $barOwnerService
     */
    public function __construct(BarOwnerService $barOwnerService)
    {
        $this->barOwnerService = $barOwnerService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('bar_owner.index')->with([
            'bars' => $this->barOwnerService->getBarOwnerBars(Auth::id()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createBartender()
    {
        return view('bartender.create')->with([
            'bars' => $this->barOwnerService->getBarOwnerBars(Auth::id()),
        ]);
    }

    /**
     * @param StoreBartenderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeBartender(StoreBartenderRequest $request)
    {
        $data = $request->all();
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'bar_id' => $data['bar_id'],
            'user_type_id' => config('user_types.bartender'),
        ]);

        return redirect()->back()->with('success', 'Bartender Created');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createManager()
    {
        return view('bar_manager.create')->with([
            'bars' => $this->barOwnerService->getBarOwnerBars(Auth::id()),
        ]);
    }

    /**
     * @param StoreBarManagerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeManager(StoreBarManagerRequest $request)
    {
        $data = $request->all();
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'bar_id' => $data['bar_id'],
            'user_type_id' => config('user_types.bar_manager'),
        ]);

        return redirect()->back()->with('success', 'Bar Manager Created');
    }
}

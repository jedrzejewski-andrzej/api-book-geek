<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrizeRequest;
use App\Http\Requests\UpdatePrizeRequest;
use App\Http\Resources\PrizeResource;
use App\Models\Prize;
use Illuminate\Http\Request;

class PrizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $prizes = Prize::query();
        if($request->filled('query')) {
            $prizes->where('name', 'like','%'.$request->get('query').'%');
        }
        $prizes = $prizes->paginate($request->limit ?? 10);
        return PrizeResource::collection($prizes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePrizeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrizeRequest $request)
    {
        Prize::create(['name'=>$request->name]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prize  $prize
     * @return \Illuminate\Http\Response
     */
    public function show(Prize $prize)
    {
        return PrizeResource::make($prize);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePrizeRequest  $request
     * @param  \App\Models\Prize  $prize
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrizeRequest $request, Prize $prize)
    {
        $prize->update(['id'=>$request->id,'name'=>$request->name]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prize  $prize
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prize $prize)
    {
        return $prize->delete();
    }
}

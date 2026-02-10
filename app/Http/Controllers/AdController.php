<?php

namespace App\Http\Controllers;

use App\Facades\RequestHub;
use App\Http\Resources\Ad as AdResource;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::orderBy('created_at', 'desc')->get();
        $ads = AdResource::collection($ads);

        return view('ad.index')->with(['ads' => $ads->response()->content()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ad = new Ad;
        $queryLevel = RequestHub::query_level() ?? 'gui';

        return view('ad.edit')->with(['ad' => $ad, 'queryLevel' => $queryLevel]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'max:100',
            'type' => 'required',
            'priority' => 'numeric',
            'url' => 'required',
            'img' => 'required',
            'query' => 'required',
        ]);

        $ad = new Ad;
        $ad->name = $request->name;
        $ad->type = $request->type;
        $ad->priority = $request->priority;
        $ad->url = $request->url;
        $ad->img = $request->img;
        $ad->query = $request->get('query'); // $request->query is reserved...

        $ad->save();

        flash($ad->name.' saved')->success();

        return redirect('/ads');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        $queryLevel = RequestHub::query_level() ?? 'gui';

        return view('ad.edit')->with(['ad' => $ad, 'queryLevel' => $queryLevel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'max:100',
            'type' => 'required',
            'priority' => 'numeric',
            'url' => 'required',
            'img' => 'required',
            'query' => 'required',
        ]);

        $ad = Ad::findOrFail($id);
        $ad->name = $request->name;
        $ad->type = $request->type;
        $ad->priority = $request->priority;
        $ad->url = $request->url;
        $ad->img = $request->img;
        $ad->query = $request->get('query'); // $request->query is reserved...

        $ad->save();

        flash($ad->name.' saved')->success();

        return redirect('/ads');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);

        $ad->delete();

        return response()->json([
            'success' => __('Ad has been deleted successfully!'),
        ]);
    }
}

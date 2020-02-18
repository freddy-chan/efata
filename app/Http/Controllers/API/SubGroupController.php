<?php

namespace App\Http\Controllers\API;

use App\SubGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            SubGroup::insert([
                'orgId' => $request->get('orgId'),
                'parentGroupId' => $request->get('parentGroupId'),
                'name' => $request->get('name'),
            ]);

            return response('ok', 200);
        } catch(Exception $e) {
            return response($e->getMessage(), 500);
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
        return SubGroup::select('id','name', 'parentGroupId')->where('orgId',$id)->get();
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
        try {
            SubGroup::where('id', $id)->delete();

            return response('ok', 200);
        } catch(Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Better;
use Illuminate\Http\Request;
use App\Models\Horse;

class BetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->horse_id) && $request->horse_id !== 0)
        $betters = \App\Models\Better::where('horse_id', $request->horse_id)->orderBy('bet', 'asc')->get();
    else
       
    $betters = \App\Models\Better::orderBy('bet', 'asc')->get();
        
    return view('betters.index', [
        'betters' => $betters,
        'horses' => Horse::orderBy('name')->get()
    ]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('betters.create', ['horses' => Horse::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $rules = [
            
            'name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:100',
            'surname' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max:150',
            'bet' => 'required|gt:0',
            'horse_id' => 'required'
        ];

        $this->validate($request, $rules);

        // send contact details to email address

    



        $better = new Better();
	// can be used for seeing the insides of the incoming request
        // dd($request->all()); die();
       $better->fill($request->all());
       $better->save();
       return redirect()->route('betters.index')->with('message', 'Better added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function show(Better $better)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function edit(Better $better)
    {   $horses = \App\Models\Horse::orderBy('name')->get();
        return view('betters.edit', ['better' => $better, 'horses' => $horses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Better $better)
    {
        $better->fill($request->all());
        $better->save();
        return redirect()->route('betters.index');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function destroy(Better $better)
    {
         $better->delete();
        return redirect()->route('betters.index');

    }
}

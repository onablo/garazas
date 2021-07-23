<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use Illuminate\Http\Request;
use Validator;

class MechanicController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mechanics = Mechanic::all();   //is DB paima visus mechanics
        return view('mechanic.index', ['mechanics' => $mechanics]); 
        //$mechanics - objektas kolekc.tipo(jis nera masyvas, bet ji galima forichinti kaip masyva) kolekcijos turi savo metodus, gali save isrusiuoti ir kt
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mechanic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
           'mechanic_name' => ['required', 'min:3', 'max:64'],
           'mechanic_surname' => ['required', 'min:3', 'max:64'],
        ]        
        );

        if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }

        $mechanic = new Mechanic;
        $mechanic->name = $request->mechanic_name;
        //DB stulpelis->stulp vardas = formos-> is create.blade.php atributas
        $mechanic->surname = $request->mechanic_surname;
        $mechanic->save();      //i DB
        return redirect()->route('mechanic.index')->with('success_message', 'New mechanic has arrived.');   
         //index kur bus visas sarasas

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function show(Mechanic $mechanic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function edit(Mechanic $mechanic)
    {
        return view('mechanic.edit', ['mechanic' => $mechanic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mechanic $mechanic)
    {
        $validator = Validator::make($request->all(),
        [
           'mechanic_name' => ['required', 'min:3', 'max:64'],
           'mechanic_surname' => ['required', 'min:3', 'max:64'],
        ]        
        );

        if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }

        $mechanic->name = $request->mechanic_name;
        $mechanic->surname = $request->mechanic_surname;
        $mechanic->save();
        return redirect()->route('mechanic.index')->with('success_message', 'Mechanic was edited.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mechanic $mechanic)
    {
        if($mechanic->mechanicHasTruck->count()){
        return redirect()->route('master.index')->with('info_message', 'Cannot be deleted! Mechanic has an unfinished order!');
        }
        $mechanic->delete();
       return redirect()->route('mechanic.index')->with('success_message', 'The Mechanic came out .');
    }
}




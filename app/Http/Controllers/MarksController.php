<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mark;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Marks = Mark::all();
        return view('adminMarks', compact('Marks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addMark');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
            [
                'name' => 'required|unique:marks|max:20|min:2'
            ],

            [
                'required' => 'Completar campo',
                'unique' => 'El Nombre ya se encuentra en la base de datos',
                'min' => 'Debe ingresar más de 2 letras',
                'max' => 'Debe ingresar menos de 20 letras'
            ]
        );


        $Mark = new Mark;
        $Mark->name = $request['name'];

        $Mark->save();

        return redirect('adminMarks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Mark = Mark::find($id);
         // return view('', compact('Mark')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Mark = Mark::find($id);
        return view('editMark', compact('Mark')); 
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
        $this->validate($request, 
            [
                'name' => 'required|unique:marks|max:20|min:2'
            ],

            [
                'required' => 'Completar campo',
                'unique' => 'El Nombre ya se encuentra en la base de datos',
                'min' => 'Debe ingresar más de 2 letras',
                'max' => 'Debe ingresar menos de 20 letras'
            ]
        );


        $Mark = Mark::find($id);
        $Mark->name = $request['name'];

        $Mark->save();

        return redirect('adminMarks');
    }

    /**
     * Show the confirmation form for destroying the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $Mark = Mark::find($id);
        return view('deleteMark', compact('Mark')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Mark = Mark::find($id);
        $Mark->delete();
        return redirect('/adminMarks');
    }
}

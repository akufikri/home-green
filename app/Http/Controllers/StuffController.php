<?php

namespace App\Http\Controllers;

use App\Models\Stuff;
use Illuminate\Http\Request;

class StuffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function stuff()
    {   $data = Stuff::all();
        return view('stuff', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
       
        $validate = $request->validate([
            'name' => 'required',
            'image' => 'required|file|mimes:png,jpg,pdf,jpeg|nullable',
            'type' => 'required',
            'price' => 'required|numeric',
            'planting_date' => 'required|date',
            'availability' => 'required', 
        ],
        [
            'name.required' => 'Column cannot be empty!',
            'image.required' => 'Column cannot be empty!',
            'image.file' => 'The uploaded file must be a file.',
            'image.mimes' => 'Allowed file types are jpeg, png or pdf',
            'type.required' => 'Column cannot be empty!',
            'price.required' => 'Column cannot be empty!',
            'price.numeric' => 'Price must be in the form of a number!',
            'planting_date.required' => 'Column cannot be empty!',
            'planting_date.date' => 'Date must be entered!',
            'availability.required' => 'Column cannot be empty!'
        ]
    );
        
         $data = Stuff::create($validate);
 if ($request->hasFile('image')) {
            $request->file('image')->move('imageFile/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Stuff::findorfail($id);

        return view('update.update_stuff', compact('data'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Stuff::findorfail($id);

        $data->update($request->all());
          if ($request->hasFile('image')) {
            $request->file('image')->move('imageFile/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }

        return redirect('stuff');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Stuff::findorfail($id);
        $data->delete($id);
        return redirect()->back();
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['data' => Category::all()], 200);

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
    $validate = Validator::make($request->all(),$this->validateCate());
    if($validate->fails()){
        return response()->json(['errors' => $validate->errors()], 422);
    }
    else{
        return response()->json(['ok'=>'Created', 'data' => Category::create($request->all())], 201);
    }
    }
 private function validateCate()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:categories']
        ];
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
     $cate = Category::find($id);
     if($cate){
        $validate = Validator::make($request->all(),[
            'name' => ['nullable', 'string', 'max:255', Rule::unique('categories')->ignore($id)]
        ]);
        if($validate->fails()){
            return response()->json(['errors' => $validate->errors()], 422);
        }
        else{
            $cate->fill($request->all());
            $cate->push();
            return response()->json(['ok'=>'Updated', 'data' => $cate->toArray()], 201);
        }
        }
            return response()->json(['errors' => 'Category not found'], 404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $cate = Category::find($id);
      if($cate){
      $cate->delete();
            return response()->json(['ok'=>'Deleted'], 200);
      }
            return response()->json(['errors' => 'Category not found'], 404);

    }
}
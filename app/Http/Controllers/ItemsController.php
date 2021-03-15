<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        foreach($items as $item){
        $item->item_category;
        }

        return response()->json(['data' => $items], 200);
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
    $category = Category::find($request->input('category_id'));

    if($category){
    $validate = Validator::make($request->all(), $this->validateItems());
    if($validate->fails()){
        return response()->json(['errors'=>$validate->errors()], 422);
    }
    else{
    $item = $category->category_item()->create($request->all());
        return response()->json(['ok'=>'Created', 'data' => $item->toArray()], 201);
    }

    }

    return response()->json(['error'=>'Sorry no category found'], 404);

    }

    private function validateItems()
    {
        return [
            'title' => ['required', 'string', 'max:255', 'unique:items'],
            'price' => ['required', 'numeric', 'min:1', 'max:99.99', 'regex:/^\d+(\.\d{1,2})?$/'],
            'description' => ['required', 'string'],
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
        $item = Item::find($id);

        $validate = Validator::make($request->all(), $this->validateItemsUpdate());
        if($validate->fails()){
            return response()->json(['errors' => $validate->errors()], 422);
        }

        if ($request->input('category_id')) {
            $cate = Category::find($request->input('category_id'));
            if (!$cate) {
                return response()->json(['errors' => $request->category_id], 404);
            }
        }

            if($item){
                $item->fill($request->all());
                $item->category_id = ($request->category_id)? $request->category_id : $item->category_id;
                $item->item_category->push();
                return response()->json(['ok'=>'Updated', 'data' => $item], 201);

            }else{
                return response()->json(['errors' => 'Item not found'], 404);
            }

    }

    private function validateItemsUpdate()
    {
        return [
            'category_id' => ['nullable','numeric', 'max:11'],
            'title' => ['nullable','string', 'max:255'],
            'price' => ['nullable','numeric', 'min:1', 'max:99.99', 'regex:/^\d+(\.\d{1,2})?$/'],
            'description' => ['nullable','string'],
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
      if($item){
      $item->delete();
        return response()->json(['ok'=>'Deleted'], 200);
      }
        return response()->json(['errors' => 'Item not found'], 404);
    }
}
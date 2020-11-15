<?php

namespace App\Http\Controllers;
use App\Http\Resources\Category as CategoryResource;

use App\Models\Category;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Collection;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        $category = Category::orderBy('created_at','desc')->paginate(10);
          $data =  CategoryResource::collection($category);
          return \response()->json($data,200);



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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:categories',

        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug'=> Str::slug($request->name),
        ]);
        return response()->json('success',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if($category)
        {
            return \response()->json($category,200);
        }
        else
        {
            return  \response()->json('Faild',404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name'=>'required|unique:categories',
        ]);

        $category->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
        ]);

        return \response()->json('success',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category)
    {
        if($category) {
            $category->delete();
            return \response()->json('success',200);
        }
        else{
            return \response()->json('error',404);
        }
    }
}

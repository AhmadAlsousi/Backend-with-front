<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\APIController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subcategory\createCategoryRequest;
use App\Http\Resources\SubCategory\CreateSubCategoryResesource;
use App\Http\Resources\SubCategory\IndexSubCategoryResesource;
use App\Http\Resources\SubCategory\TagSubCategoryResesource;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends APIController
{
    public function index() {
        $subcategory=Subcategory::all();
        return $this->sendResponce(IndexSubCategoryResesource::collection($subcategory),'a',200);
    }

    public function create(createCategoryRequest $request)
    {
        $data = $request->validated();
        $category = Subcategory::create([
            'name' => $data['name'],
            'category_id' => $data['category_id']
        ]);
        $category->addmedia($data['image'])->toMediaCollection('subcategory');
        return $this->sendResponce(CreateSubCategoryResesource::make($category),'s',201);
    }
       public function filter() {
        $subcategory=Subcategory::all();
        return $this->sendResponce(TagSubCategoryResesource::collection($subcategory),'a',200);
    }
}

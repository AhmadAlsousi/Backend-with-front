<?php

namespace App\Http\Controllers\Category;

use App\Enum\Image\CategoryEnum;
use App\Http\Controllers\APIController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Resources\Category\CreateCategoryResesource;
use App\Http\Resources\Category\IndexCategoryResesource;
// use App\Http\Resources\Category\IndexCategoryResesource;
use App\Models\Category;
use Illuminate\Http\Request;

class CreateCategoryController extends APIController
{
    public function index(){
        $category=Category::all();
        return $this->sendResponce(IndexCategoryResesource::collection($category),'نجاح',200);
    }

      public function create(CreateCategoryRequest $request){
        $data=$request->validated();
        $category=Category::create( ['name'=> $data['name']]);
        $category->addmedia($data['image'])->toMediaCollection('category');

        return $this->sendResponce(CreateCategoryResesource::make($category),'Success',200);
        


    }
    
}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;

class CategoriesController extends Controller
{
    //
    // Populate the main route with all categories. Within the database.
    //
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    //
    // Show a Category with a given ID.
    //
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.show', compact('category'));
    }

    //
    // Show the form so that the user can create a category.
    // URI: flommerce.dev/category/create
    //
    public function create()
    {
        return view('categories.create');
    }

    //
    // Store the data after user input and send the user
    // back to the categories page to review.
    //
    // @param CreateCategoryRequest
    // @return Response
    //
    public function store(CreateCategoryRequest $request)
    {
        Category::create($request->all());

        return redirect('categories');
    }
}

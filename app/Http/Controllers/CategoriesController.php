<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;

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
        $this->middleware('auth');
        return view('categories.create');
    }

    //
    // Store the data after user input and send the user
    // back to the categories page to review.
    //
    // @param CreateCategoryRequest
    // @return Response
    //
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());

        return redirect('categories');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    public function update($id, CategoryRequest $request)
    {
        $category = Category::findOrFail($id);

        $category->update($request->all());
    }
}

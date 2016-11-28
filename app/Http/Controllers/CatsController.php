<?php
namespace App\Http\Controllers;

use App\Cat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatsController extends Controller
{
    public function __construct()
    {

    }

	public function index()
	{
        $cats = Cat::all();
        $title = "Listing all categories";

		return view('cats.index', compact('cats', 'title'));
	}

	public function show(Cat $cat)
	{
        $cat->load('cats');

		return view('cats.cat', compact('cat'));
	}

	public function add()
	{
		/*
			Create a new Category
		*/
		return view('cats.create');
	}

	public function edit(Cat $cat, $id)
	{
		/*
			Update existing category
		*/
	}

	public function remove(Cat $cat, $id)
	{
		/*
			TODO: Insert Awesome Kill Cat Command.
			NOTE: No Cats were actually killed in building this application.
			Remove a category
		*/
	}
}

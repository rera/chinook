<?php

namespace App\Http\Controllers;

use App\Beer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Faker\Generator;

class BeersController extends Controller
{
	public function create(Request $request)
	{
			$beer = new beer();
			$beer->name = $request->name;
			$beer->brewery = $request->brewery;
			$beer->style = $request->style;
		  $beer->save();

		  return response($beer->jsonSerialize(), Response::HTTP_CREATED);
	}

	public function index()
	{
	  return response(Beer::all()->jsonSerialize(), Response::HTTP_OK);
	}

	public function update(Request $request, $id)
	{
	  $beer = Beer::findOrFail($id);
		$beer->name = $request->name;
		$beer->brewery = $request->brewery;
		$beer->style = $request->style;
	  $beer->save();

	  return response(null, Response::HTTP_OK);
	}

	public function destroy($id)
	{
	  Beer::destroy($id);

	  return response(null, Response::HTTP_OK);
	}
}

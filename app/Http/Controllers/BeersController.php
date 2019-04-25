<?php

namespace App\Http\Controllers;

use App\Beer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Faker\Generator;

class BeersController extends Controller
{
	public function index(Request $request)
  {
    $params = $request->except('_token');
    $beers = Beer::filter($params)->get();
		return response($beers, Response::HTTP_OK);
	}

	public function store(Request $request)
	{
		$beer = new Beer();
		$beer->name = $request->name;
		$beer->brewery = $request->brewery;
		$beer->sampled = $request->sampled;
		$beer->abv = $request->abv;
		$beer->rating = $request->rating;
		$beer->notes = $request->notes;
		$beer->save();

		return response($beer->jsonSerialize(), Response::HTTP_CREATED);
	}

	public function update(Request $request, $id)
	{
		$beer = Beer::findOrFail($id);
		$beer->name = $request->name;
		$beer->brewery = $request->brewery;
		$beer->sampled = $request->sampled;
		$beer->abv = $request->abv;
		$beer->rating = $request->rating;
		$beer->notes = $request->notes;
		$beer->save();

		return response(null, Response::HTTP_OK);
	}

	public function edit(Request $request, $id)
	{
	  $beer = Beer::findOrFail($id);
	  return response($beer, Response::HTTP_OK);
	}

	public function destroy($id)
	{
	  Beer::destroy($id);

	  return response(null, Response::HTTP_OK);
	}
}

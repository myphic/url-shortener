<?php
namespace App\Http\Controllers;

use App\Http\Requests\LinksRequest;

class LinksController extends Controller
{
    public function show()
    {
        return view('show');
    }

    public function send(LinksRequest $request)
    {
        $url = $request->input('url');
        dd($request->all());
    }
}

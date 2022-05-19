<?php
namespace App\Http\Controllers;

use App\Http\Requests\LinksRequest;
use App\Models\Link;
use Illuminate\Support\Str;

class LinksController extends Controller
{
    public function show()
    {
        return view('show');
    }

    public function send(LinksRequest $request)
    {
        $url = $request->input('url');
        $randomStr = Str::random(5);
        $linkKey = str_shuffle($randomStr);
        $link = Link::create([
                'source_link' => $url,
                'key_link' => $linkKey,
            ]
        );
        $data = ['url' => route('links.redirect', ['key' => $linkKey])];
        return $data;
    }

    public function redirect(string $keyLink)
    {
        $link = Link::where(['key_link' => $keyLink])->first();

        if($link) {
            return redirect()->away($link->source_link);
        }
    }
}

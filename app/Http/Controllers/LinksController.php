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

        if($link) {
            return back()->with('success', route('links.redirect', ['key' => $linkKey]));
        }
        return back()->with('error', 'Ссылка не сохранилась');
    }

    public function redirect(string $keyLink)
    {
        $link = Link::where(['key_link' => $keyLink])->first();
        echo $link->source_link;
        if($link) {
            return redirect()->away($link->source_link);
        }
    }
}

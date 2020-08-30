<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PagePostAction extends Controller
{
    //
    public function __invoke(Request $request): Response
    {
        $data = $request->all();

        $page = \App\Page::find($request->route()->parameter('id'));
        if ($page == null) {
            $page = \App\Page::create([
                'title' => $request->get('title'),
                'content' => $request->get('content')
            ]);
        } else {
            $page->update([
                'title' => $request->get('title'),
                'content' => $request->get('content')
            ]);
        }
        return response(view('page.show', ['page' => $page]));
    }
}

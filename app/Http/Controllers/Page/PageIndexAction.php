<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PageIndexAction extends Controller
{
    //
    public function __invoke(Request $request): Response
    {
        $pages = \App\Page::all();

        return response(view('page.index', ['pages' => $pages]));
    }
}

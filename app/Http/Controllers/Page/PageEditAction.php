<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PageEditAction extends Controller
{
    //
    public function __invoke(Request $request): Response
    {
        $page = \App\Page::find($request->route()->parameter('id'));

        return response(view('page.edit', ['page' => $page]));
    }
}

<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PageNewAction extends Controller
{
    //
    public function __invoke(Request $request): Response
    {
        $page = new \App\Page();

        return response(view('page.edit', ['page' => $page]));
    }
}

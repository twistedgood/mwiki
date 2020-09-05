<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PagePostAction extends Controller
{
    //
    public function __invoke(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'max:1000'],
            'content' => ['required']
        ]);

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
        return redirect()->route('page.edit', [$page->id])->with('action_result', 'Successfully Saved!');
    }
}

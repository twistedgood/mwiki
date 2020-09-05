<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        $pages = \App\Page::all();
        return response(view('pages.index', ['pages' => $pages]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Response
    {
        $page = new \App\Page();
        $page->title = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        return response(view('pages.edit', ['page' => $page]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $page = \App\Page::create([
            'title' => $request->get('title'),
            'content' => $request->get('content')
        ]);
    return redirect()->route('pages.edit', [$page->id])->with('action_result', 'Successfully Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page): Response
    {
        $page = \App\Page::findOrFail($page->id);
        return response(view('pages.show', ['page' => $page]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page): Response
    {
        $page = \App\Page::find($page->id);
        return response(view('pages.edit', ['page' => $page]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page): RedirectResponse
    {
        $page = \App\Page::findOrFail($page->id);
        $page->update([
            'title' => $request->get('title'),
            'content' => $request->get('content')
        ]);
        return redirect()->route('pages.edit', [$page->id])->with('action_result', 'Successfully Saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index');
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        return('store here');
    }

    public function show($id)
    {
        return('show here');
    }

    public function edit($id)
    {
        return('edit here');
    }

    public function update(Request $request, $id)
    {
        return('update here');
    }

    public function destroy($id)
    {
        retun('delete here');
    }
}

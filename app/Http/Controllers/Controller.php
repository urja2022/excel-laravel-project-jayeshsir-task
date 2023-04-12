<?php

namespace App\Http\Controllers;

use App\Exports\PostsExport;
use App\Http\Requests\StorePost;
use App\Imports\PostsImport;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store(StorePost $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        Excel::store(new PostsExport(), 'uploads/release/release.xlsx', 'real_public');
        return back()->with('success','Information Store Successfully 😊!');
    }

    public function importExportView()
    {
        return view('import');
    }
    public function export()
    {
        return Excel::store(new PostsExport(), 'uploads/release/release.xlsx', 'real_public');
    }
    public function import()
    {
        Excel::import(new PostsImport, request()->file('file'));
        return back();
    }
}

<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\News;
use App\Helpers\PixaBayHelper;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin-panel.news.index', [
            'news' => News::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string',
            'text' => 'required|string'
        ]);

        $validate['photo_link'] = PixaBayHelper::getRandomImage()["userImageURL"];
        News::create($validate);

        return redirect('/news');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin-panel.news.edit', [
            'news' => News::find($id),
        ]);
    }

    public function regenerateImage(string $id)
    {
        $news = News::find($id);

        $news->photo_link = PixaBayHelper::getRandomImage()["userImageURL"];

        $news->save();

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.     
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'title' => 'required|string',
            'text' => 'required|string'
        ]);

        $news = News::find($id);

        $news->title = $validate['title'];
        $news->text = $validate['text'];

        $news->save();

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $new = News::find($id);
        $new->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticlePhoto;
use App\Models\Category;
use Carbon\Traits\Date;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['articles'] = Article::with('categories')->get();
        
        return view('admins.articles.index')->with($data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::get();
        return view('admins.articles.createOrUpdate')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = 0)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'published_at' => date('Y-m-d'),
            'slug' => 'slug_name',
            'category_id' => $request->category_id
        ];

        $createOrUpdate = Article::updateOrCreate(['id' => $id], $data);
        $images = $request->file('files');
        if ($request->hasFile('files')) :
                foreach ($images as $item):
                    $var = date_create();
                    $time = date_format($var, 'YmdHis');
                    $imageName = $time . '-' . $item->getClientOriginalName();
                    //$item->move(base_path() . 'resources/uploads/file/', $imageName);
                    $destinationPath = public_path('/images/uploads/file/');
                    $item->move($destinationPath, $imageName);
                    $arr[] = $imageName;
                    $image = implode(",", $arr);
                    ArticlePhoto::insert(
                        array(
                            'article_id' => $createOrUpdate->id,
                            'name' => $image
                            )
                    );
                endforeach;
        else:
                $image = '';
        endif;
        

        return redirect('admin/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['object'] = Article::find($id);
        $data['categories'] = Category::get();
        return view('admins.articles.createOrUpdate')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $detete = Article::where('id', $request->id)->delete();
        if($detete) {
            $request->session()->flash('success', 'Data has been deleted!');
            return redirect('admin/articles');  
        }else {
            $request->session()->flash('error','Fail to save data, please check again!');
            return redirect('admin/articles'); 
        }
    }

    public function allArticles()
    {
        $data['all_articles'] = Article::with('articlePhoto')->get();

        return view('contents.all_articles')->with($data);
    }

    public function entertainment()
    {
        $data['entertainments'] = Article::where('category_id', 1)->get();
        return view('contents.entertainment')->with($data);
    }

    public function sports()
    {
        $data['sports'] = Article::where('category_id', 2)->get();
        return view('contents.sport')->with($data);
    }


    public function technology()
    {
        $data['technologies'] = Article::where('category_id', 3)->get();
        return view('contents.technology')->with($data);
    }


    public function social()
    {
        $data['socials'] = Article::where('category_id', 4)->get();
        return view('contents.social')->with($data);
    }
}
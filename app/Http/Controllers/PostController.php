<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Post::all();
        return view('admin.post.index')->with(compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|max:255',
                'summary' => 'required|max:255',
                'slug' => 'required|unique:post',
                'content' => 'required|max:255',
                'img' => 'required|image|max:2048|mimes:jpg,png,jpeg,gif,svg'
            ],
            [
                'title.required' => 'Bạn chưa có tiêu đề bài viết',
                'summary.required' => 'Bạn chưa có mô tả',
                'slug.unique' => 'Slug này đã được sử dụng',
                'img' => 'Bạn chưa thêm ảnh hoặc ảnh quá nặng'
            ]
        );

        // $data2 = $request->all();
        // dd($data2);

        // if($request->has('img'))
        // {
        //     $file = $request->$img;
        //     $file_name = $file->getClient
        // }

        $post = new Post();
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->summary = $data['summary'];
        $post->slug = $data['slug'];

        $get_image = $request->img;
        $path = 'uploads/post';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_name = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path, $new_name);

        $post->img_post = $new_name;
        $post->post_view = 0;
        $post->creator_id = 1;
        $post->status = 1;
        $post->save();

        return redirect()->back()->with('message', 'Them post thanh cong!');

        //dd($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return view('admin.post.edit');
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
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->back()->with('message', 'Xoa post thanh cong!');
    }

}

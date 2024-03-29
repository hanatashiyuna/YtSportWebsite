<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('permission:edit articles', ['only' => ['index', 'show', 'edit']]);
    //     $this->middleware('permission:add articles', ['only' => ['index', 'store']]);
    //     $this->middleware('permission:delete articles', ['only' => ['index', 'destroy']]);
    //     $this->middleware('permission:publish articles', ['only' => ['index']]);
    // }

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

        $post->category = $request->input('category');
        $post->img_post = $new_name;
        $post->post_view = 0;
        $post->creator_id = 1;
        $post->status = 1;
        $post->save();

        return redirect()->back()->with('message', 'Them post thanh cong!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Post::find($id);
        $detail->post_view++;
        $detail->save();
        return view('member.show',compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post.edit', compact('post'));
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
        $data = $request->validate(
            [
                'title' => 'required',
                'summary' => 'required',
                'slug' => 'required',

            ],
            [
                'title.required' => 'Bạn chưa có tiêu đề bài viết',
                'summary.required' => 'Bạn chưa có mô tả',
                'slug.required' => 'Slug này đã được sử dụng',

            ]
        );

        $post = Post::find($id);
        $post->title = $data['title'];
        // $post->content = $data['content'];
        $post->summary = $data['summary'];
        $post->slug = $data['slug'];

        $get_image = $request->img;
        if($get_image){
            $path = 'uploads/post';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_name = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path, $new_name);
            $post->img_post = $new_name;
        }
        $post->category = $request->input('category');
        $post->content = $request->input('content');
        $post->post_view = 0;
        $post->creator_id = 1;
        $post->status = 1;
        $post->save();

        return redirect()->back()->with('message', 'Cập nhật bài viết thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $path = 'uploads/post'.$post->img_post;
        if(file_exists($path)){
            unlink($path);
        }
        Post::find($id)->delete();
        return redirect()->back()->with('message', 'Xoa post thanh cong!');
    }

    public function category($category)
    {
    //    $category = DB::table('members')->get()->where('name',$name);

       $category = Post::where('category',$category)->paginate(15);

       return view('member.category', ['category' => $category]);
    }

}

<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\DataTables\CompanyBlogDataTable;

class CompanyBlogController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(CompanyBlogDataTable $datatable)
    {
        return $datatable->render('company.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:3000'],
            'title' => ['required', 'max:200'],
            'description' => ['required'],
        ]);

        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        $blog = new Blog();
        $blog->user_id = Auth::user()->id;
        $blog->image = $imagePath;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->status = $request->status;
        $blog->save();

        toastr('Created Successfully', 'success', 'success');
        return redirect()->route('company.blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('company.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'max:3000'],
            'title' => ['required', 'max:200'],
            'description' => ['required'],
        ]);

        $blog = Blog::findOrFail($id);

        $imagePath = $this->updateImage($request, 'image', 'uploads', $blog->image);

        $blog->user_id = Auth::user()->id;
        $blog->image= !empty($imagePath) ? $imagePath : $blog->image;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->status = $request->status;
        $blog->save();

        toastr('Updated Successfully', 'success', 'success');
        return redirect()->route('company.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        $this->deleteImage($blog->image);
        $blog->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully']);
    }

    public function changeStatus(Request $request)
    {

        $blog = Blog::findOrFail($request->id);
        $blog->status = $request->status == 'true' ? 1 : 0;
        $blog->save();

        return response(['message' => 'Status has been Updated!']);
    }

    public function employee(){
        return view('company.employee.index');
    }

    public function page(){
        return view('company.page.index');
    }

    public function BlogDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required'
        ]);

        $blogs = Blog::whereIn('id', $request->ids)->get();

        foreach ($blogs as $blog) {
            $this->deleteMultpleImages([$blog->image]);
            $blog->delete();
        }

        toastr('Deleted Successfully');
        return redirect()->back();
    }
}

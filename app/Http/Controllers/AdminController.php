<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function create()
    {
        // Logic to show the form for creating a new resource
        return view('admin.createpost');
    }
    public function store(Request $request)
    {
        // Logic to store a newly created resource in storage
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Post created successfully.');
    }

    public function show($id)
    {
        $post = Post::with('user')->findOrFail($id);
        return view('admin.showpost', compact('post'));
    }

    public function edit($id)
    {
        // Logic to show the form for editing a specific resource
        $post = Post::findOrFail($id);
        return view('admin.editpost', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا وجدت
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            $post->image = $request->file('image')->store('posts', 'public');
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('admin.dashboard')->with('success', 'Post updated successfully.');
    }
    
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // حذف الصورة من التخزين إذا وجدت
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Post deleted successfully.');
    }
}

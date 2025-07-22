<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Gallery::latest();

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('image', function ($photo) {
                    $url = asset('storage/' . $photo->image);
                    return '<img src="' . $url . '" width="40">';
                })

                ->addColumn('title', function ($photo) {
                    return e($photo->title);
                })

                ->addColumn('created_at', function ($photo) {
                    return $photo->created_at->format('d M Y'); 
                })

                ->addColumn('action', function ($photo) {
                    $editUrl = route('gallery.edit', $photo->id);
                    $deleteUrl = route('gallery.destroy', $photo->id);

                    return '
                        <a href="' . $editUrl . '" class="btn btn-sm btn-primary text-white">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="' . $deleteUrl . '" method="POST" class="delete-form" data-id="' . $photo->id . '" style="display:inline-block;">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button type="submit" class="btn btn-danger btn-sm deleteItem">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    ';
                })

                ->rawColumns(['image', 'action']) // prevent escaping HTML
                ->make(true);
        }
        return view('backend.gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|mimes:jpg,jpeg,png|max:10240',
        ]);

        $filename = 'none';
        if ($request->hasFile('image')) {
            $filename = $request->file('image')->store('gallery_image', 'public');
        }

        Gallery::create([
            'title'       => $validated['title'],
            'description' => $validated['description'] ?? '',
            'image'       => $filename,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Photo has been added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('backend.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|mimes:jpg,jpeg,png|max:10240',
        ]);

        $data = [
            'title'       => $validated['title'],
            'description' => $validated['description'] ?? '',
        ];

        if ($request->hasFile('image')) {
            if ($gallery->image && Storage::exists($gallery->image)) {
                Storage::delete($gallery->image);
            }

            $data['image'] = $request->file('image')->store('gallery_image', 'public');
        }

        $gallery->update($data);

        return redirect()->route('gallery.index')->with('success', 'Photo has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);

            if ($gallery->image && Storage::exists($gallery->image)) {
                Storage::delete($gallery->image);
            }

            $gallery->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'The photo has been deleted successfully!'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete the photo.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

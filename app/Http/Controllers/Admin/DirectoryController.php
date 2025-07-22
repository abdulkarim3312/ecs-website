<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\DirectoryCategory;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class DirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DirectoryCategory::query();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function(DirectoryCategory $category) {
                    $editUrl = route('directory.edit', $category->id);
                    $deleteUrl = route('directory.destroy', $category->id);

                    return '
                        <button type="button" class="btn btn-sm btn-primary text-white edit_btn editBtn" data-id="' . $category->id . '">
                            <i class="fa fa-edit"></i>
                        </button>

                        <form action="' . $deleteUrl . '" method="POST" class="delete-form" data-id="' . $category->id . '" style="display:inline-block;">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button type="submit" class="btn btn-danger btn-sm deleteItem">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    ';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('backend.directory_category.index');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'category_name' => preg_replace('/\s+/', ' ', trim($request->input('category_name')))
        ]);

        $validated = $request->validate([
            'category_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('directory_categories', 'category_name'),
            ],
        ]);

        $category = DirectoryCategory::create($validated);

        return response()->json([
            'success' => true,
            'data' => $category,
            'message' => 'created successfully!'
        ]);
    }

    public function edit($id)
    {
        $category = DirectoryCategory::findOrFail($id);
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->merge([
            'category_name' => preg_replace('/\s+/', ' ', trim($request->category_name))
        ]);

        $category = DirectoryCategory::findOrFail($id);

        $validated = $request->validate([
            'category_name' => 'required|string|max:255|unique:directory_categories,category_name,' . $category->id,
        ]);

        $category->update($validated);

        return response()->json(['success' => true, 'message' => 'updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = DirectoryCategory::findOrFail($id);
        $category->delete();
        return response()->json(['success' => true, 'message' => 'deleted successfully!']);
    }

}

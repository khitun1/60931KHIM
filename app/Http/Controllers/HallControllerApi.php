<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class HallControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response(Hall::limit($request->perpage ?? 5)
            ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
            ->get());
    }

    public function total()
    {
        return response(Hall::all()->count());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (! Gate::allows('create-hall')) {
            return response()->json([
                'code' => 1,
                'message' => 'No access to add a hall',
            ]);
        }
        $validated = $request->validate([
            'name' => 'required|unique:halls|max:255',
            'image' => 'required|file'
        ]);

        $file = $request->file('image');
        $filename = rand(1, 100000). '_' . $file->getClientOriginalName();
        try {
            $path = Storage::disk('s3')->putFileAs('hall_images', $file, $filename);
            $fileUrl = Storage::disk('s3')->url($path);
        } catch (Exception $e) {
            echo $e;
            return response()->json([
                'code' => 2,
                'message' => 'Upload error',
            ]);
        };

        $hall = new Hall($validated);

        $hall->picture_url = $fileUrl;
        $hall->save();
        return response()->json([
            'code' => 0,
            'message' => 'Successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(Hall::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

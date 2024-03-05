<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\DataTables\PluginDataTable;
use App\Http\Controllers\Controller;
use App\Models\Plugin;
use Str;
class PluginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PluginDataTable $datatable)
    {
        return $datatable->render('admin.plugin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.plugin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $plugin = Plugin::create([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'status' => $request->status,
        ]);
        toastr('Plugin Created Successfully');
        return redirect()->route('admin.plugin.index');
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
        $plugin = Plugin::findOrFail($id);
        return view('admin.plugin.edit', compact('plugin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $plugin = Plugin::findOrFail($id);

        $plugin->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'status' => $request->status,
        ]);

        toastr('Plugin Updated Successfully');
        return redirect()->route('admin.plugin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plugin = Plugin::findOrFail($id);
        $plugin->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully']);
    }

    public function changeStatus(Request $request){

        $plugin = Plugin::findOrFail($request->id);
        $plugin->status = $request->status == 'true' ? 1 : 0;
        $plugin->save();
        return response(['message' => 'Status has been Updated!']);
    }
}

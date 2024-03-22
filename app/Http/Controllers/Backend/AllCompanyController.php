<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\AllCompanyDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use File;

class AllCompanyController extends Controller
{

    use ImageUploadTrait;

    public function index(AllCompanyDataTable $dataTable)
    {
        return $dataTable->render('admin.companis.index');
    }

    public function changeStatus(Request $request){

        $user = User::findOrFail($request->id);
        $user->status = $request->status == 'true' ? 'active' : 'inactive';
        $user->save();

        return response(['message' => 'Status has been Updated!']);
    }

    public function destroy(string $id){

        $user = User::findOrFail($id);

        if (count($user->jobs) > 0) {
            return response(['status' => 'error', 'message' => 'This Company Have Job Post! First Delete Job Post Then Delete Company']);
        }
        File::delete(public_path($user->image));
        $user->delete();

        return response(['status' => 'success', 'message' => 'Status has been Updated!']);
    }

    public function CompanyDelete(Request $request)
    {

        $request->validate([
            'ids' => 'required'
        ], [
            'ids.required' => 'Need To Select First.'
        ]);

        $blogs = User::whereIn('id', $request->ids)->get();
    
        foreach ($blogs as $blog) {
            $this->deleteMultpleImages([$blog->image]);
            $blog->delete();
        }

        toastr('Deleted Successfully');
        return redirect()->back();
    }
    
}

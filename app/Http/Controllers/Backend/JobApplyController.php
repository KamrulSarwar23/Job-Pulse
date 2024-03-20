<?php

namespace App\Http\Controllers\Backend;

use App\Models\JobApply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\JobApplyAdminDataTable;

class JobApplyController extends Controller
{
    public function jobApply(JobApplyAdminDataTable $datatable){
      return $datatable->render('admin.job-apply.index');
    }

    public function JobApplyDelete(Request $request){
        $jobapply =JobApply::where('id', $request->id)->delete();
        toastr('Deleted Successfully');
        return response(['status' => 'success', 'message' => 'Deleted Successfully']);
    }

    public function JobApplyDeleteMulti(Request $request)
    {
        $request->validate([
            'ids' => 'required'
        ]);
        $jobs = JobApply::whereIn('id', $request->ids)->delete();
        toastr('Deleted Successfully');
        return redirect()->back();
    }
}

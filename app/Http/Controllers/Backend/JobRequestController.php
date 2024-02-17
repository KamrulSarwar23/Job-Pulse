<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\JobRequestDataTable;
use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobRequestController extends Controller
{
    public function index(JobRequestDataTable $datatable){
        return $datatable->render('admin.job-request.index');
    }

    public function changeStatus(Request $request){
        $jobs = Job::findOrFail($request->id);
        $jobs->status = $request->status == 'true' ? 'active' : 'inactive';
        $jobs->save();
        return response(['status' => 'success', 'message' => 'Status Chaged Successfully']);
    }
}

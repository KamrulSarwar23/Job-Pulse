<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApply;
use Illuminate\Http\Request;

class JobApplyController extends Controller
{
    public function jobApply(Request $request){

        $countapply = JobApply::where('user_id', auth()->user()->id)->where('job_id', $request->job_id)->get();

        if (count($countapply) > 0) {
            toastr()->error('You Already Applied For This Job');
            return redirect()->back();
        }
        else{
            $jobapply = JobApply::create([
                'user_id' => $request->user_id,
                'job_id' => $request->job_id
            ]);
            toastr('Applied For This Successfully');
            return redirect()->back();
        };
    }
}

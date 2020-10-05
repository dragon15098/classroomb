<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\UserJobFile;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobController extends BaseController
{
    public function showJobDetail(Request $request, $id)
    {
        $userJobFiles = UserJobFile::where('jobId', $id)->get();
        $currentUserFile = UserJobFile::firstWhere('userId', session('userId'));
        $job = Job::find($id);
        return view('job.job_detail', ['job' => $job, 'userJobFiles' => $userJobFiles, 'currentUserFile' => $currentUserFile]);
    }

    function createNewJob(Request $request)
    {
        $job = new Job;
        $job->jobName = $request->get('jobName');
        $uploadFile = $request->file('fileToUpload');
        $job->filePath = $uploadFile->storeAs('jobs', $uploadFile->getClientOriginalName());
        $job->save();
        return redirect('job');
    }

    function downloadMyFile(Request $request, $jobId)
    {   
        return $this->downloadUserFile($request, $jobId, session('userId'));
    }


    function downloadUserFile(Request $request,  $jobId, $userId)
    {
        $userFile = UserJobFile::where('userId', $userId)->where('jobId', $jobId)->first();
        return Storage::download($userFile->filePath);
    }



    public function submitJob(Request $request)
    {
        $userJobFile = new UserJobFile();
        $userJobFile->jobId = $request->get('jobId');
        $userJobFile->userId = session('userId');
        $uploadFile = $request->file('fileToUpload');
        $userJobFile->filePath = $uploadFile->storeAs('user_files', $uploadFile->getClientOriginalName());
        $userJobFile->save();
        return redirect()->back();
    }
}

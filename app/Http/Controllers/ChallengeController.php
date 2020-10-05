<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\UserJobFile;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChallengeController extends BaseController
{

    
    public function showChallengeDetail(Request $request, $id)
    {
        return view('job.job_detail', ['job' => $job, 'userJobFiles' => $userJobFiles, 'currentUserFile' => $currentUserFile]);
    }

}

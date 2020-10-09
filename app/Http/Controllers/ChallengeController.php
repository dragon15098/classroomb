<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\UserJobFile;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChallengeController extends BaseController
{

    public function showChallenges(Request $request)
    {
        $dirs =  Storage::directories("challenges/");
        $challenges = array();
        foreach ($dirs as &$dir) {
            $challenges[] = substr($dir, 20);
        }
        return view("challenge.challenges", ['challenges' => $challenges]);
    }

    public function showChallengeDetail(Request $request, $id)
    {
        $folderPath  = "challenges/challenge" . $id;
        $hintPath =  $folderPath  . "/hint.txt";
        $hint =  Storage::get($hintPath);
        return view("challenge.challenge_detail", ['id' => $id, 'hint' => $hint]);
    }


    public function submitAnswer(Request $request)
    {
        $id = $request->get('id');

        $folderPath  = "challenges/challenge" . $id;
        $hintPath =  $folderPath  . "/hint.txt";
        $hint =  Storage::get($hintPath);

        $userAnswer = $request->get('answer');
        $answerFile =  $this->getAnswerFileName($id);
        $answer = preg_replace("/\.(.*)/", "", $answerFile);
        if ($answer === $userAnswer) {
            return view("challenge.answer_challenge", ['id' => $id, 'hint' => $hint]);
        }
        return redirect()->back();
    }

    public function download(Request $request, $id)
    {
        $answerFilePath = "challenges/challenge" . $id . "/" .  $this->getAnswerFileName($id);
        return Storage::download($answerFilePath);
    }

    private function getAnswerFileName($id)
    {
        $folderPath  = "challenges/challenge" . $id;
        $hintPath =  $folderPath  . "/hint.txt";
        $hint =  Storage::get($hintPath);
        $files =  Storage::files($folderPath);
        if (($files[0] === $hintPath)) {
            $answerFile = explode("/", $files[1])[2];
        } else {
            $answerFile = explode("/", $files[0])[2];
        }
        return $answerFile;
    }

    public function createChallenge(Request $request)
    {
        $index = sizeof(Storage::directories("challenges"));
        $folderPath  = "challenges/challenge" . ($index + 1);
        Storage::makeDirectory($folderPath);
        $hintPath = $folderPath .  "/hint.txt";
        Storage::prepend($hintPath, $request->get("hint"));
        $uploadFile = $request->file('fileToUpload');
        $uploadFile->storeAs($folderPath, $uploadFile->getClientOriginalName());
        return redirect('/challenge');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentUser;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function show($id)
    {
        $data = Document::find($id);
     

        return view('materials.show', compact('data'));
    }

    public function learning(Request $request)
    {
        $document = Document::find($request->documentID);
        DocumentUser::learned($document->id)->first() ? true : $document->users()->attach(Auth::id());

        $totalDocuments = Lesson::documentsOfLesson($document['lesson_id'])->count();
        $documentsLearned = Document::documentLearned($document['lesson_id'])->get();
        $percentage = $documentsLearned->count() / $totalDocuments * 100;

        return response()->json([
            'number' => $documentsLearned,
            'percentage' => round($percentage)
        ]);
    }
}

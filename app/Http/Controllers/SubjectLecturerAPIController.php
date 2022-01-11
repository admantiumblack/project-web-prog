<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClusterSCC;
use App\Models\SubjectLecturer;
use League\Csv\Reader;

class SubjectLecturerAPIController extends Controller
{
    public function insertSubjectLecturers(Request $request){
        $request->validate([
            'file' => 'required|mimes:csv',
            'period' => 'required|string|min:3|max:3'
        ]);

        $file = $request->file('file');
        $reader = Reader::createFromFileObject($file->openFile());
        $reader->setHeaderOffset(0);
        $records = [];
        foreach($reader->getRecords() as $offset => $record){
            $records[] = [
                'lecturer_id' => $record['lecturer_id'],
                'subject_id' => $record['subject_id'],
                'period' => $request->period,
                'id' => $record['subject_id'].$request->period.$record['lecturer_id']
            ];
        }
        SubjectLecturer::insert($records);

        return redirect()->back();

    }
}

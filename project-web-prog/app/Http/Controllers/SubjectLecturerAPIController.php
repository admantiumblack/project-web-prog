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
            'period' => 'required'
        ]);

        $file = $request->file('file');
        $reader = Reader::createFromFileObject($file->openFile());
        $reader->setHeaderOffset(0);
        $records = [];
        foreach($reader->getRecords() as $offset => $record){
            $records[] = [
                'lecturer_id' => $record['lecturer id'],
                'subject_id' => $record['subject id'],
                'period' => $request->period,
                'id' => $record['subject id'].$request->period.$record['lecturer id']
            ];
        }
        SubjectLecturer::insert($records);

        return redirect()->back();

    }
}

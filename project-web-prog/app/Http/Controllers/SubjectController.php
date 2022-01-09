<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Models\Lecturer;
use App\Models\SubjectLecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class SubjectController extends Controller
{   
    public function ManageSubject(){
        
        $clusters = Cluster::get();
        $periods = SubjectLecturer::distinct()->pluck('period');
        
        $clusterfirst = Cluster::get()->first()->id;
        $periodfirst = SubjectLecturer::distinct()->pluck('period')->first();

        $dosens = DB::table('lecturers')
        ->join('subject_lecturers','subject_lecturers.lecturer_id','=','lecturers.id')
        ->join('subjects','subjects.id','=','subject_lecturers.subject_id')
        ->where('subject_lecturers.period', '=',$periodfirst)
        ->where('subjects.cluster_id','=',$clusterfirst)
        ->select('lecturers.*','subjects.subject')
        ->get();

        return view('manage.subjects', ['clusters' => $clusters, 'periods'=>$periods, 'dosens'=>$dosens, 'cluster'=>$clusterfirst, 'period' =>$periodfirst]);
    }

    public function ManageSubjectbyClusandPe(Request $request){
        $request->validate([
            'cluster' => 'required',
            'period' => 'required'
        ]);

        $clusters = Cluster::get();
        $periods = SubjectLecturer::distinct()->pluck('period');
        
        $cluster = $request->cluster;
        $period = $request->period;

        $dosens = DB::table('lecturers')
        ->join('subject_lecturers','subject_lecturers.lecturer_id','=','lecturers.id')
        ->join('subjects','subjects.id','=','subject_lecturers.subject_id')
        ->where('subject_lecturers.period', '=',$period)
        ->where('subjects.cluster_id','=',$cluster)
        ->select('lecturers.*','subjects.subject')
        ->get();

        return view('manage.subjects', ['clusters' => $clusters, 'periods'=>$periods, 'dosens'=>$dosens, 'cluster'=>$cluster, 'period' =>$period]);
    }
}

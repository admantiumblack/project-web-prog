<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectLecturer;
use App\Models\Cluster;
use App\Models\Lecturer;


class SubjectLecturerController extends Controller
{
    public function viewManageSubjectLecturer(Request $request){

        $clusters = Cluster::get();

        $periods = SubjectLecturer::select('period')
                    ->distinct('period')
                    ->get();
        
        $period_choice = -1;
        $cluster_choice = -1;
        if($request->period !== null){
            $period_choice = $request->period;
        }
        
        if($request->cluster_id !== null){
            $cluster_choice = $request->cluster_id;
        }

        $lecturers = null;

        if($period_choice != -1){
            $lecturers = Lecturer::with(['subjectLecturers'=> function($q) use($period_choice, $cluster_choice){
                if($period_choice != -1){
                    $q->with('subject.cluster')->whereHas('subject', function ($q) use ($cluster_choice){
                        if($cluster_choice != -1){
                            $q->where('cluster_id', $cluster_choice);
                        }
                        else{
                            $q;
                        }
                    })->where('period', $period_choice)->orderBy('period', 'Desc');
                }
                else{
                    $q->with('subject')->whereHas('subject', function ($q) use ($cluster_choice){
                        if($cluster_choice != -1){
                            $q->where('cluster_id', $cluster_choice);
                        }
                        else{
                            $q;
                        }
                    })
                    ->orderBy('period', 'Desc');
                }
            }]);
            
            $lecturers = $lecturers->whereHas('subjectLecturers', function ($q) use($period_choice, $cluster_choice){
                if($period_choice != 1){
                    $q->with('subject')->where('period', $period_choice)
                    ->whereHas('subject', function ($q) use ($cluster_choice){
                        if($cluster_choice != -1){
                            $q->where('cluster_id', $cluster_choice);
                        }
                        else{
                            $q;
                        }
                    })
                    ->orderBy('period', 'Desc');
                }
                else{
                    $q->with('subject')
                    ->whereHas('subject', function ($q) use ($cluster_choice){
                        if($cluster_choice != -1){
                            $q->where('cluster_id', $cluster_choice);
                        }
                        else{
                            $q;
                        }
                    })
                    ->orderBy('period', 'Desc');
                }
            });

        }
        else{
            $lecturers = Lecturer::with([
                'subjectLecturers' => function ($q){
                    $q->orderBy('period');
                }
            , 'subjectLecturers.subject']);
        }


        return view('manage.subjects', [
            'clusters' => $clusters,
            'periods' => $periods,
            'lecturers' => $lecturers->get(),
            'cluster_choice' => $cluster_choice,
            'period_choice' => $period_choice
        ]);
    }
}

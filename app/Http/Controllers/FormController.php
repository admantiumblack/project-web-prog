<?php

namespace App\Http\Controllers;

use App\Models\ClusterScc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Form;
use App\Models\SubjectLecturer;
use League\Csv\Reader;
use League\Csv\Statement;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    //
    public function viewAllForm(Request $request){
        
        $ssc_id = explode('_', $request->cookie('user_auth'))[0];
        $cluster_id = ClusterScc::where('lecturer_id','=',$ssc_id)->first()->cluster_id;

        $forms = DB::table('forms')
        ->join('subjects', 'forms.subject_id', '=', 'subjects.id')
        ->select('forms.*', 'subjects.subject')
        ->where('subjects.cluster_id', '=', $cluster_id)
        ->orderBy('period', 'Desc')
        ->paginate(5);
        
        return view('view.formresult', ['forms'=>$forms]);
    }
    
    public function viewInputForm(Request $request, $id){
        
        $lecturerId = explode('_', $request->cookie('user_auth'))[0];
        $data = DB::table('forms')
        ->join('subject_lecturers', 'forms.subject_id', '=', 'subject_lecturers.subject_id')
        ->join('lecturers', 'subject_lecturers.lecturer_id', '=', 'lecturers.id')
        ->join('subjects', 'subjects.id','=','subject_lecturers.subject_id')
        ->select('forms.*', 'lecturers.name', 'subject_lecturers.lecturer_id','subjects.subject')
        ->where('lecturers.id', '=', $lecturerId)
        ->where('forms.id','=',$id)
        ->first();
        return view('form', ['datalec'=>$data]);
    }

    public function viewFormDetail($formId){
        $form = Form::with('subject')->find($formId);

        $reader = Reader::createFromString(Storage::cloud()->get($form->result_path));

        $subjectLecturers = SubjectLecturer::where('subject_id', $form->subject_id)
                        ->where('period', $form->period)->get();
        
        $hasFilled = 0;
        $rCount = count($subjectLecturers);
        foreach($subjectLecturers as $subjectLecturer){
            if($subjectLecturer->has_filled_form){
                $hasFilled++;
            }
        }

        $reader->setHeaderOffset(0);
        $records = Statement::create()->process($reader);

        
        $forms = [];
        $answers = [];
        
        
        foreach ($records as $record) {
            $forms[] = $record;
        }
        
        // THIS ONLY WORKS WITH INTEGER ARRAY KEYS
        
        $columns = count($records->getHeader()); 
        error_log($columns);
        $q_types = [0, 0, 0, 1, 2,
                    1, 2, 1, 2, 1,
                    2, 1, 2, 1, 2,
                    1, 2, 1, 2, 1,
                    2, 1, 2, 1, 2
                    ];

        // CHART COLORS

        $opacity = 0.2;

        $global_colorx = 'rgba(99, 132, 255, ' . (string)$opacity . ')';
        $global_colory = 'rgba(255, 99, 132, ' . (string)$opacity . ')';
        $global_coloro = 'rgba(40, 40, 40, ' . (string)$opacity . ')';

        for ($i = 0; $i < $columns - 2; $i++){
            switch ($q_types[$i]){
                case 0: {
                    
                    $responses = array_column($forms, $i+1);

                    $freq = array_count_values($responses);

                    $chartname = 'chart_q';
                    $chartname .= $i;

                    $charttype = 'bar';

                    $labelx = 'Sudah';
                    $labely = 'Belum';
                    $labelother = 'Other';
                    
                    $colorx = $global_colorx;
                    $colory = $global_colory;
                    $coloro = $global_coloro;

                    $max = $rCount;

                    $freq_other = array_sum($freq) - ($freq[$labelx] ?? 0) - ($freq[$labely] ?? 0);

                    $chart = app()->chartjs
                        ->name($chartname)
                        ->type($charttype)
                        ->size(['width' => 500, 'height' => 400])
                        ->labels([$labelx, $labely, $labelother])
                        ->datasets([
                            [
                                'labels' => null,
                                'backgroundColor' => [$colorx, $colory, $coloro],
                                'data' => [$freq[$labelx] ?? 0, $freq[$labely] ?? 0, $freq_other]
                            ]
                        ])
                        ->options([
                            'scales' => ['yAxes' => [['ticks' => ['beginAtZero' => true, 'suggestedMax' => $max]]]],
                            'maintainAspectRatio' => false,
                            'legend' => ['display' => false]
                        ]);

                    // print_r($answers);

                    $answer = [
                        'responses' => $responses,
                        'chart' => $chart
                    ];

                    array_push($answers, $answer);

                    break;
                }
                case 1: {

                    $responses = array_column($forms, $i+1);

                    $freq = array_count_values($responses);

                    $chartname = 'chart_q';
                    $chartname .= $i;

                    $charttype = 'bar';

                    $labelx = 'Good';
                    $labely = 'Needs Improvement';
                    
                    $colorx = $global_colorx;
                    $colory = $global_colory;

                    $max = $rCount;

                    $chart = app()->chartjs
                        ->name($chartname)
                        ->type($charttype)
                        ->size(['width' => 500, 'height' => 400])
                        ->labels([$labelx, $labely])
                        ->datasets([
                            [
                                'labels' => null,
                                'backgroundColor' => [$colorx, $colory],
                                'data' => [$freq[$labelx] ?? 0, $freq[$labely] ?? 0]
                            ]
                        ])
                        ->options([
                            'scales' => ['yAxes' => [['ticks' => ['beginAtZero' => true, 'suggestedMax' => $max]]]],
                            'maintainAspectRatio' => false,
                            'legend' => ['display' => false]
                        ]);

                    $answer = [
                        'chart' => $chart
                    ];
                    
                    array_push($answers, $answer);
                    
                    break;
                }
                case 2: {

                    $responses = array_column($forms, $i+1);

                    $answer = [
                        'responses' => $responses
                    ];

                    $answers[$i-1] = $answers[$i-1] + $answer;
                    
                    // print_r($answers[$i-1]['content']);
                    // echo "\n";
                    
                    array_push($answers, 0);
                    
                    break;
                }
            }
        }
                    
        return view('view.formdetail', compact('answers', 'forms'))
            ->with('filled', $hasFilled)
            ->with('rCount', $rCount)
            ->with('id', $formId)
            ->with('form', $form);

    }

}

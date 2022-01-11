<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use App\Models\Form;
use Illuminate\Support\Str;

class CreateForms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $subjectIds;
    protected $deadline;
    protected $period;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subjectIds, $deadline, $period)
    {
        $this->subjectIds = $subjectIds;
        $this->deadline = $deadline;
        $this->period = $period;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $path = 'form_results';
        $template = 'template.csv';
        $dirs = Storage::disk('google')->directories();
        if(count($dirs) < 1){
            Storage::disk('google')->makeDirectory($path);
            $dirs = Storage::disk('google')->directories();
        }
        $header = Storage::get($template);
        foreach($this->subjectIds as $subjectId){
            $filename = Str::uuid().'.csv';
            $filepath = $dirs[0].'/'.$filename;
            Storage::disk('google')->put($filepath, $header);
            $fileMetadata = collect(Storage::cloud()->listContents($dirs[0], false))
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
            ->first();
            $form = new Form();
            $form->id = $this->period.$subjectId;
            $form->subject_id = $subjectId;
            $form->deadline = $this->deadline.' 23:59:59';
            $form->period = $this->period;
            $form->result_path = $fileMetadata['path'];
            $form->save();
        }
    }

}

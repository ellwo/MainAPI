<?php
namespace App\Http\Traits;

use App\Models\Report;
use Str;
trait Reportable{



    public function report(array $data)
    {
        $report=Report::updateOrCreate([
            'reportable_type'=>get_class($this),
            'reportable_id'=>$this->id,
            'note'=>$data["note"],
            'type'=>$data["type"],
            'reporting_id'=>$data["reporting_id"]

        ]);

        return true;
        # code...
    }

    public function reports()
    {

        return $this->morphMany(Report::class,"reportable");
        # code...
    }

}

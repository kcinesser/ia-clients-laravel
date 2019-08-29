<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Cron extends Model
{
    protected $primaryKey = 'command';
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['command', 'next_run', 'last_run'];
    
    public static function shouldRun($command, $minutes) {
        //returns true every X $minutes, then reschedules itself
        
        $cron = Cron::find($command);
        $now  = Carbon::now();
        
        if ($cron && $cron->next_run > $now->timestamp) {
            return false;
        }
        
        Cron::updateOrCreate(
            [
                'command'  => $command
            ],
            [
                'next_run' => Carbon::now()->addMinutes($minutes)->timestamp,
                'last_run' => Carbon::now()->timestamp
            ]
        );
        return true;
    }
}
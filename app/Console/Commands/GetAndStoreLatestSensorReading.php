<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SensorReading;

class GetAndStoreLatestSensorReading extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'LatestSensorReading:GetAndStore';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the latest sensor sample readings and insert into DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //get latest sample from remote central db

        //get latest local sample
        //if remote sample time > local sample time:
            //write remote sample into local db
            //ret 0
        //else return 1
        return 0;
    }
}

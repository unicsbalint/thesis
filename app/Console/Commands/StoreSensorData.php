<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Devices\Climate\Sensor;

class StoreSensorData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:storesensordata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hisrotikusan eltaroljuk minden percben hany fok volt a lakasban, milyen volt a paratartalom, ezt letarolom a sensor_data adattablaban.';

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
        Sensor::storeTemperature();
        Sensor::storeHumidity();
    }
}

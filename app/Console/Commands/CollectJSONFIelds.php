<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Geolocation;

class CollectJSONFIelds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:collect-json-fields';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Collecting JSON enabled fields'
        . ' from data-expansion/affiliates.json';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Geolocation::truncate();

        $rawData = file_get_contents(
            __DIR__ . '/..'
            . '/..'
            . '/../data-expansion/' . env('DATA_EXPANSION')
        );

        $jsonDecodedData = json_decode($rawData);

        foreach ($jsonDecodedData as $row) {
            $geolocation = new Geolocation();
            $geolocation->label = $row->name;
            $geolocation->geotag = [
                (float) $row->latitude,
                (float) $row->longitude
            ];

            $geolocation->save();
        }

        return 0;
    }
}

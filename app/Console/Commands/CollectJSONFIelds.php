<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Geolocation;
use Illuminate\Support\Facades\DB;

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
        $bar = $this->output->createProgressBar(count($jsonDecodedData));

        foreach ($jsonDecodedData as $row) {
            DB::insert(
                'insert into geolocations (label, geotag) values (?, ?)',
                [
                    $row->name,
                    \json_encode([
                        'latitude' => (float) $row->latitude,
                        'longitude' => (float) $row->longitude,
                    ])
                ]
            );

            $bar->advance();
        }
        $bar->finish();

        return 0;
    }
}

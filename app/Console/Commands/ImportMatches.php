<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Event;

class ImportMatches extends Command
{
    protected $signature = 'import:matches';
    protected $description = 'Import matches from API';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $response = Http::get('https://www.legaseriea.it/api/match?extra_link&order=oldest&lang=en&season_id=157617&match_day_id=157731');

        if ($response->successful()) {
            $matches = $response->json();
            $this->info('API response: ' . json_encode($matches));

            if (isset($matches['data']) && is_array($matches['data'])) {
                foreach ($matches['data'] as $matchData) {
                    if (isset($matchData['match_id'])) {
                        Event::updateOrCreate(
                            ['id' => $matchData['match_id']],
                            [
                                'home_team' => $matchData['home_team']['name'],
                                'away_team' => $matchData['away_team']['name'],
                                'match_date' => date('Y-m-d', strtotime($matchData['date_time'])),
                                'match_time' => date('H:i:s', strtotime($matchData['date_time'])),
                                'home_goal' => $matchData['home_goal'] ?? null,
                                'away_goal' => $matchData['away_goal'] ?? null,
                                'referee' => $matchData['referee'] ?? null
                            ]
                        );
                    } else {
                        $this->error('Skipping match data without "match_id" key: ' . json_encode($matchData));
                    }
                }

                $this->info('Matches imported successfully.');
            } else {
                $this->error('The API response was not in the expected format or does not contain valid data.');
            }
        } else {
            $this->error('Failed to fetch matches. Status: ' . $response->status());
            $this->error('Response: ' . $response->body());
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Organization;
use App\Models\Run;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Justin Klerk',
            'email' => 'justin@jcklerk.dev',
        ]);

        $org = Organization::create([
            'name' => 'Test Org',
            'location' => 'Dronten',
            'img' => 'https://picsum.photos/500/500',
            'description' => 'This is a test organization',
            'website' => 'https://jcklerk.dev',
        ]);

        $event1 = Event::create([
            'organization_id' => $org->id,
            'name' => 'Test Event',
            'location' => 'Dronten',
            'img' => 'https://picsum.photos/505/505',
            'description' => 'This is a test event',
            'website' => 'https://jcklerk.dev',
            'startDate' => '2024-08-30',
            'endDate' => '2024-08-31',
            'searchMode' => 'startNumber',
        ]);

        $event2 = Event::create([
            'organization_id' => $org->id,
            'name' => 'Test Event 2',
            'location' => 'Dronten',
            'img' => 'https://picsum.photos/507/507',
            'description' => 'This is a test event',
            'website' => 'https://jcklerk.dev',
            'startDate' => '2024-08-30',
            'endDate' => '2024-08-31',
            'searchMode' => 'voucher',
        ]);

        Run::create([
            'event_id' => $event1->id,
            'distance_km' => '5',
            'name' => '5KM location',
            'img' => 'https://picsum.photos/508/508',
        ]);

        Run::create([
            'event_id' => $event1->id,
            'distance_km' => '15',
            'name' => '15KM location',
            'img' => 'https://picsum.photos/509/509',
        ]);

        Run::create([
            'event_id' => $event2->id,
            'distance_km' => '5',
            'name' => '5KM location',
            'img' => 'https://picsum.photos/510/510',
        ]);





    }
}

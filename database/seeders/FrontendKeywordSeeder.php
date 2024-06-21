<?php

namespace Database\Seeders;

use App\Models\Admin\FrontendKeyword;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FrontendKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create data
        FrontendKeyword::insert([
            [
                'language_id' => 1,
                'key' => 'home',
                'value' => 'Home',
            ],
            [
                'language_id' => 1,
                'key' => 'name',
                'value' => 'Name',
            ],
            [
                'language_id' => 1,
                'key' => 'email_address',
                'value' => 'Email Address',
            ],
            [
                'language_id' => 1,
                'key' => 'phone_number',
                'value' => 'Phone Number',
            ],
            [
                'language_id' => 1,
                'key' => 'write_your_message',
                'value' => 'Write your message',
            ],
            [
                'language_id' => 1,
                'key' => 'message_submit',
                'value' => 'Message Submit',
            ],
            [
                'language_id' => 1,
                'key' => 'read_more',
                'value' => 'Read More',
            ],
            [
                'language_id' => 1,
                'key' => 'view_details',
                'value' => 'View Details',
            ],
            [
                'language_id' => 1,
                'key' => 'enter_your_email',
                'value' => 'Enter your email',
            ],
            [
                'language_id' => 1,
                'key' => 'subscribe_now',
                'value' => 'Subscribe Now',
            ],
            [
                'language_id' => 1,
                'key' => 'type_to_search',
                'value' => 'Type to search...',
            ],
            [
                'language_id' => 1,
                'key' => 'categories',
                'value' => 'Categories',
            ],
            [
                'language_id' => 1,
                'key' => 'recent_posts',
                'value' => 'Recent Posts',
            ],
            [
                'language_id' => 1,
                'key' => 'popular_tags',
                'value' => 'Popular Tags',
            ],
            [
                'language_id' => 1,
                'key' => 'tags',
                'value' => 'Tags',
            ],
            [
                'language_id' => 1,
                'key' => 'next_post',
                'value' => 'Next Post',
            ],
            [
                'language_id' => 1,
                'key' => 'prev_post',
                'value' => 'Previous Post',
            ],
            [
                'language_id' => 1,
                'key' => 'copy_link_and_share',
                'value' => 'Copy Url and Share:',
            ],
            [
                'language_id' => 1,
                'key' => 'share_on',
                'value' => 'Share on: ',
            ],
            [
                'language_id' => 1,
                'key' => 'nothing_found',
                'value' => 'Nothing found.',
            ],
            [
                'language_id' => 1,
                'key' => 'all',
                'value' => 'All',
            ]


        ]);
    }
}

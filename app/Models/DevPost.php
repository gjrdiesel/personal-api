<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class DevPost extends Model
{
    public function getApiUrl($id = '')
    {
        return "https://dev.to/api/articles/{$id}?username=" . config('posts.dev.username');
    }

    public function fetch()
    {
        collect(Http::get($this->getApiUrl())->json())
            ->each(function ($post) {
                if (Post::find($post['slug'])) {
                    return;
                }

                $post = Http::get($this->getApiUrl($post['id']))->json();

                Post::create([
                    'title' => $post['title'],
                    'slug' => $post['slug'],
                    'description' => $post['description'],
                    'cover_image' => $post['cover_image'],
                    'published_at' => str_replace('Z', '', $post['published_at']),
                    'markdown' => $post['body_markdown'],
                    'canonical' => $post['canonical_url'],
                    'source' => 'dev.to',
                ]);
            });
    }
}

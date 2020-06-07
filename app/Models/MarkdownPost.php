<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class MarkdownPost extends Model
{
    public function fetch()
    {
        collect(glob(resource_path('posts') . '/*.md'))
            ->map('file_get_contents')
            ->map([YamlFrontMatter::class, 'parse'])
            ->each(function ($post) {

                $fields = [
                    'title' => $post->title,
                    'slug' => $slug = Str::slug($post->title),
                    'description' => Str::limit($post->body()),
                    'cover_image' => $post->cover_image,
                    'markdown' => $post->body(),
                    'canonical' => url($slug),
                    'source' => 'personal',
                ];

                if ($existingPost = Post::find($slug)) {
                    if ($post->published && !$existingPost->published_at) {
                        $fields['published_at'] = now();
                    } else {
                        $fields['published_at'] = null;
                    }
                    $existingPost->update($fields);
                } else {
                    if ($post->published) {
                        $fields['published_at'] = now();
                    } else {
                        $fields['published_at'] = null;
                    }
                    Post::create($fields);
                }
            });
    }
}

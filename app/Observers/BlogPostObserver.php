<?php

namespace App\Observers;

use App\BlogPost;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogPostObserver
{
    /**
     * Handle the blog post "created" event.
     *
     * @param \App\BlogPost $blogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
        //
    }

    public function creating(BlogPost $blogPost)
    {
        $this->setSlug($blogPost);
        $this->setHtml($blogPost);
        $this->setUser($blogPost);
    }

    /**
     * Handle the blog post "updated" event.
     *
     * @param \App\BlogPost $blogPost
     * @return void
     */
    public function updated(BlogPost $blogPost)
    {
        //
    }

    public function updating(BlogPost $blogPost)
    {
//        $test[] = $blogPost->isDirty();
//        $test[] = $blogPost->isDirty('is_published');
//        $test[] = $blogPost->isDirty('user_id');
//        //получить значение измененного аттрибута
//        $test[] = $blogPost->getAttribute('is_published');
//        $test[] = $blogPost->is_published;
//        //получить значение аттрибута из базы
//        $test[] = $blogPost->getOriginal('is_published');

        $this->setPublished($blogPost);
        $this->setSlug($blogPost);
    }

    protected function setPublished(BlogPost $blogPost)
    {
        if (empty($blogPost->published_at) && $blogPost->is_published) {
            $blogPost->published_at = Carbon::now();
        }
    }

    protected function setSlug($blogPost)
    {
        if (empty($blogPost->slug)) {
            $blogPost->slug = Str::slug($blogPost->title);
        }
    }

    public function setHtml($blogPost)
    {
        if ($blogPost->isDirty('content_raw')) {
            $blogPost->content_html = $blogPost->content_raw;
        }
    }

    public function setUser($blogPost)
    {
        $blogPost->user_id = Auth::id();
    }

    /**
     * Handle the blog post "deleted" event.
     *
     * @param \App\BlogPost $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "restored" event.
     *
     * @param \App\BlogPost $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "force deleted" event.
     *
     * @param \App\BlogPost $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }
}

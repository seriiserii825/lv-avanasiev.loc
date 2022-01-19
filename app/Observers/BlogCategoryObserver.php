<?php

namespace App\Observers;

use App\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Support\Str;

class BlogCategoryObserver
{
    /**
     * Handle the blgo category "created" event.
     *
     * @param \App\Models\BlogCategory $blgoCategory
     * @return void
     */
    public function created(BlogCategory $blgoCategory)
    {
        //
    }

    /**
     * Handle the blgo category "updated" event.
     *
     * @param \App\Models\BlogCategory $blgoCategory
     * @return void
     */
    public function updated(BlogCategory $blgoCategory)
    {
        //
    }

    public function updating(BlogCategory $blogCategory)
    {
        $this->setSlug($blogCategory);
    }

    protected function setSlug(BlogCategory $blogCategory)
    {
        if (empty($blogCategory->slug)) {
            $blogCategory->slug = Str::slug($blogCategory->name);
        }
    }

    /**
     * Handle the blgo category "deleted" event.
     *
     * @param \App\Models\BlogCategory $blgoCategory
     * @return void
     */
    public function deleted(BlogCategory $blgoCategory)
    {
        //
    }

    /**
     * Handle the blgo category "restored" event.
     *
     * @param \App\Models\BlogCategory $blgoCategory
     * @return void
     */
    public function restored(BlogCategory $blgoCategory)
    {
        //
    }

    /**
     * Handle the blgo category "force deleted" event.
     *
     * @param \App\Models\BlogCategory $blgoCategory
     * @return void
     */
    public function forceDeleted(BlogCategory $blgoCategory)
    {
        //
    }
}

<?php

namespace App\Observers;

use App\Models\BlogCategory;

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

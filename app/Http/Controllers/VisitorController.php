<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class VisitorController extends Controller
{
    /**
     * Display the home page for visitors with dynamic content from database.
     */
    public function home()
    {
        $headerContent = Content::getByKey('header');
        $storyContent = Content::getByKey('story');
        $visionContent = Content::getByKey('vision');

        return view('visitor.home', compact('headerContent', 'storyContent', 'visionContent'));
    }

    /**
     * Display the boot catalog page for visitors.
     */
    public function catalog()
    {
        return view('visitor.catalog');
    }
}

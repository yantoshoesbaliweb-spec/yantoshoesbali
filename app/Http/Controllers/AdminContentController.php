<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class AdminContentController extends Controller
{
    /**
     * Display Header Slider & Announcement Section settings.
     */
    public function header()
    {
        $content = Content::getByKey('header');
        return view('admin.content.header', compact('content'));
    }

    /**
     * Update Header Section content.
     */
    public function updateHeader(Request $request)
    {
        $data = $request->input('content', []);

        // Clean & ensure array format for slides
        if (isset($data['slides']) && is_array($data['slides'])) {
            $cleanSlides = [];
            foreach ($data['slides'] as $slide) {
                if (!empty($slide['title']) || !empty($slide['image']) || !empty($slide['subtitle'])) {
                    $cleanSlides[] = $slide;
                }
            }
            $data['slides'] = array_values($cleanSlides);
        }

        // Clean & ensure array format for announcements
        if (isset($data['announcements']) && is_string($data['announcements'])) {
            $data['announcements'] = array_values(array_filter(array_map('trim', explode("\n", $data['announcements']))));
        }

        // Clean & ensure array format for marquee
        if (isset($data['marquee']) && is_string($data['marquee'])) {
            $data['marquee'] = array_values(array_filter(array_map('trim', explode("\n", $data['marquee']))));
        }

        Content::setByKey('header', $data);

        return redirect()->route('admin.content.header')->with('success', 'Header Slider & Announcement settings updated successfully!');
    }

    /**
     * Display Story Narrative Section settings.
     */
    public function story()
    {
        $content = Content::getByKey('story');
        return view('admin.content.story', compact('content'));
    }

    /**
     * Update Story Section content.
     */
    public function updateStory(Request $request)
    {
        $data = $request->input('content', []);

        // Clean & ensure array format for paragraphs
        if (isset($data['paragraphs']) && is_string($data['paragraphs'])) {
            $data['paragraphs'] = array_values(array_filter(array_map('trim', explode("\n", $data['paragraphs']))));
        }

        // Clean & ensure array format for values items
        if (isset($data['values_items']) && is_string($data['values_items'])) {
            $data['values_items'] = array_values(array_filter(array_map('trim', explode("\n", $data['values_items']))));
        }

        Content::setByKey('story', $data);

        return redirect()->route('admin.content.story')->with('success', 'Story Narrative Section settings updated successfully!');
    }

    /**
     * Display Bespoke Custom Order (Vision) Section settings.
     */
    public function vision()
    {
        $content = Content::getByKey('vision');
        return view('admin.content.vision', compact('content'));
    }

    /**
     * Update Vision Section content.
     */
    public function updateVision(Request $request)
    {
        $data = $request->input('content', []);

        Content::setByKey('vision', $data);

        return redirect()->route('admin.content.vision')->with('success', 'Bespoke Custom Order (Vision) settings updated successfully!');
    }
}

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
        $request->validate([
            'slide_files.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
        ]);

        $data = $request->input('content', []);

        // Clean & ensure array format for slides
        if (isset($data['slides']) && is_array($data['slides'])) {
            $cleanSlides = [];
            foreach ($data['slides'] as $index => $slide) {
                // Check if an image file was uploaded for this slide
                if ($request->hasFile("slide_files.{$index}")) {
                    $file = $request->file("slide_files.{$index}");
                    if ($file->isValid()) {
                        $extension = $file->getClientOriginalExtension();
                        $filename = 'hero_' . time() . '_' . uniqid() . '.' . $extension;
                        $storedPath = $file->storeAs('hero', $filename, 'public');
                        $slide['image'] = 'storage/' . $storedPath;
                    }
                }

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

    /**
     * Display Testimonies management page.
     */
    public function testimonies()
    {
        $content = Content::getByKey('testimonies');
        return view('admin.content.testimonies', compact('content'));
    }

    /**
     * Update Testimonies content.
     */
    public function updateTestimonies(Request $request)
    {
        $data = $request->input('content', []);

        // Clean testimonies array
        if (isset($data['items']) && is_array($data['items'])) {
            $cleanItems = [];
            foreach ($data['items'] as $index => $item) {
                // Handle avatar upload
                if ($request->hasFile("avatar_files.{$index}")) {
                    $file = $request->file("avatar_files.{$index}");
                    if ($file->isValid()) {
                        $filename = 'reviewer_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $storedPath = $file->storeAs('reviewers', $filename, 'public');
                        $item['avatar'] = 'storage/' . $storedPath;
                    }
                }

                if (!empty($item['author']) || !empty($item['text'])) {
                    $cleanItems[] = $item;
                }
            }
            $data['items'] = array_values($cleanItems);
        }

        Content::setByKey('testimonies', $data);

        return redirect()->route('admin.content.testimonies')->with('success', 'Testimonies updated successfully!');
    }

    /**
     * Display Contact information management page.
     */
    public function contact()
    {
        $content = Content::getByKey('contact');
        return view('admin.about.contact', compact('content'));
    }

    /**
     * Update Contact information.
     */
    public function updateContact(Request $request)
    {
        $data = $request->input('content', []);

        Content::setByKey('contact', $data);

        return redirect()->route('admin.about.contact')->with('success', 'Contact information updated successfully!');
    }

    /**
     * Display Stores management page.
     */
    public function stores()
    {
        $content = Content::getByKey('stores');
        return view('admin.about.stores', compact('content'));
    }

    /**
     * Update Stores content.
     */
    public function updateStores(Request $request)
    {
        $data = $request->input('content', []);

        // Clean stores array
        if (isset($data['items']) && is_array($data['items'])) {
            $cleanItems = [];
            foreach ($data['items'] as $item) {
                if (!empty($item['name']) || !empty($item['address'])) {
                    $cleanItems[] = $item;
                }
            }
            $data['items'] = array_values($cleanItems);
        }

        Content::setByKey('stores', $data);

        return redirect()->route('admin.about.stores')->with('success', 'Store locations updated successfully!');
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Education;
use App\Models\Organization;
use App\Models\Skill;
use App\Models\WorkExperience;

class PageController extends Controller
{
    public function about()
    {
        return view('frontend.pages.about');
    }

    public function education()
    {
        $educations = Education::where('is_active', true)
            ->orderBy('start_year', 'asc')
            ->get();

        return view('frontend.pages.education', compact('educations'));
    }

    public function experience()
    {
        $experiences = WorkExperience::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('frontend.pages.experience', compact('experiences'));
    }

    public function organization()
    {
        $organizations = Organization::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('frontend.pages.organization', compact('organizations'));
    }

    public function skills()
    {
        $skills = Skill::where('is_active', true)
            ->orderBy('category', 'asc')
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('frontend.pages.skills', compact('skills'));
    }

    public function certificates()
    {
        $certificates = Certificate::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('frontend.pages.certificates', compact('certificates'));
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }
}
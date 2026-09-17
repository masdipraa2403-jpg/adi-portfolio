<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Education;
use App\Models\Organization;
use App\Models\Project;
use App\Models\Skill;
use App\Models\WorkExperience;

class HomeController extends Controller
{
    public function index()
    {
        $stats = [
            'educations' => Education::where('is_active', true)->count(),
            'experiences' => WorkExperience::where('is_active', true)->count(),
            'organizations' => Organization::where('is_active', true)->count(),
            'skills' => Skill::where('is_active', true)->count(),
            'certificates' => Certificate::where('is_active', true)->count(),
            'projects' => Project::where('status', 'published')->count(),
        ];

        $projects = Project::where('status', 'published')
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('frontend.home', compact('stats', 'projects'));
    }
}

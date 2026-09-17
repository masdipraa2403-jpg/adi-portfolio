<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('status', 'published')
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('frontend.pages.projects', compact('projects'));
    }

    public function show(Project $project)
    {
        abort_unless($project->status === 'published', 404);

        $project->load([
            'technologies',
            'images' => fn ($query) => $query->orderBy('sort_order'),
        ]);

        return view('frontend.project-show', compact('project'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\ContactMessage;
use App\Models\Education;
use App\Models\Organization;
use App\Models\Project;
use App\Models\Skill;
use App\Models\WorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ContentController extends Controller
{
    private array $map = [
        'educations' => Education::class,
        'experiences' => WorkExperience::class,
        'organizations' => Organization::class,
        'skills' => Skill::class,
        'certificates' => Certificate::class,
        'projects' => Project::class,
        'messages' => ContactMessage::class,
    ];

    private function model(string $type): string
    {
        abort_unless(isset($this->map[$type]), 404);

        return $this->map[$type];
    }

    public function index(string $type)
    {
        $class = $this->model($type);
        $query = $class::query();

        if ($type === 'projects') {
            $query->orderByDesc('is_featured')
                ->orderBy('sort_order')
                ->latest();
        } elseif ($type === 'messages') {
            $query->latest();
        } else {
            $query->orderBy('sort_order')->latest();
        }

        $items = $query->paginate(12)->withQueryString();

        return view('admin.content.index', compact('items', 'type'));
    }

    public function create(string $type)
    {
        abort_if($type === 'messages', 404);

        $this->model($type);

        return view('admin.content.form', [
            'item' => null,
            'type' => $type,
        ]);
    }

    public function store(Request $request, string $type)
    {
        $class = $this->model($type);
        abort_if($type === 'messages', 403);

        $data = $this->validateData($request, $type);

        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        if ($type === 'projects') {
            $data['is_featured'] = $request->boolean('is_featured');
        }

        if ($type === 'certificates' && $request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('certificates', 'public');
        }

        $class::create($data);

        return redirect()
            ->route('admin.content.index', $type)
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(string $type, int $id)
    {
        $class = $this->model($type);
        $item = $class::findOrFail($id);

        return view('admin.content.form', compact('item', 'type'));
    }

    public function update(Request $request, string $type, int $id)
    {
        $class = $this->model($type);
        abort_if($type === 'messages', 403);

        $item = $class::findOrFail($id);
        $data = $this->validateData($request, $type, $item->id);

        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        if ($type === 'projects') {
            $data['is_featured'] = $request->boolean('is_featured');
        }

        if ($type === 'certificates' && $request->hasFile('file')) {
            if ($item->file && Storage::disk('public')->exists($item->file)) {
                Storage::disk('public')->delete($item->file);
            }

            $data['file'] = $request->file('file')->store('certificates', 'public');
        }

        $item->update($data);

        return redirect()
            ->route('admin.content.index', $type)
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $type, int $id)
    {
        $class = $this->model($type);
        abort_if($type === 'messages', 403);

        $item = $class::findOrFail($id);

        if ($type === 'certificates' && $item->file && Storage::disk('public')->exists($item->file)) {
            Storage::disk('public')->delete($item->file);
        }

        $item->delete();

        return back()->with('success', 'Data berhasil dihapus.');
    }

    public function readMessage(int $id)
    {
        ContactMessage::findOrFail($id)->update(['is_read' => true]);

        return back()->with('success', 'Pesan ditandai sudah dibaca.');
    }

    private function validateData(Request $request, string $type, ?int $ignore = null): array
    {
        return match ($type) {
            'educations' => $request->validate([
                'institution' => ['required', 'string', 'max:255'],
                'major' => ['nullable', 'string', 'max:255'],
                'start_year' => ['nullable', 'string', 'max:10'],
                'end_year' => ['nullable', 'string', 'max:10'],
                'description' => ['nullable', 'string'],
                'is_active' => ['nullable', 'boolean'],
                'sort_order' => ['nullable', 'integer', 'min:0'],
            ]),

            'experiences' => $request->validate([
                'company' => ['required', 'string', 'max:255'],
                'position' => ['required', 'string', 'max:255'],
                'location' => ['nullable', 'string', 'max:255'],
                'start_date' => ['nullable', 'date'],
                'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
                'description' => ['nullable', 'string'],
                'logo' => ['nullable', 'string', 'max:255'],
                'is_active' => ['nullable', 'boolean'],
                'sort_order' => ['nullable', 'integer', 'min:0'],
            ]),

            'organizations' => $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'position' => ['nullable', 'string', 'max:255'],
                'period' => ['nullable', 'string', 'max:255'],
                'location' => ['nullable', 'string', 'max:255'],
                'description' => ['nullable', 'string'],
                'achievement' => ['nullable', 'string'],
                'logo' => ['nullable', 'string', 'max:255'],
                'is_active' => ['nullable', 'boolean'],
                'sort_order' => ['nullable', 'integer', 'min:0'],
            ]),

            'skills' => $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'category' => ['nullable', 'string', 'max:255'],
                'level' => ['required', 'integer', 'min:0', 'max:100'],
                'icon' => ['nullable', 'string', 'max:255'],
                'is_active' => ['nullable', 'boolean'],
                'sort_order' => ['nullable', 'integer', 'min:0'],
            ]),

            'certificates' => $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'issuer' => ['nullable', 'string', 'max:255'],
                'issued_at' => ['nullable', 'string', 'max:100'],
                'credential_id' => ['nullable', 'string', 'max:255'],
                'credential_url' => ['nullable', 'url', 'max:500'],
                'image' => ['nullable', 'string', 'max:500'],
                'file' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png,webp,gif', 'max:10240'],
                'description' => ['nullable', 'string'],
                'is_active' => ['nullable', 'boolean'],
                'sort_order' => ['nullable', 'integer', 'min:0'],
            ]),

            'projects' => $this->projectData($request, $ignore),

            default => [],
        };
    }

    private function projectData(Request $request, ?int $ignore = null): array
    {
        $slugRule = Rule::unique('projects', 'slug');

        if ($ignore) {
            $slugRule->ignore($ignore);
        }

        $request->merge([
            'slug' => Str::slug($request->input('slug') ?: $request->input('name')),
        ]);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', $slugRule],
            'category' => ['nullable', 'string', 'max:255'],
            'thumbnail' => ['nullable', 'string', 'max:500'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'year' => ['nullable', 'string', 'max:20'],
            'github_url' => ['nullable', 'url', 'max:500'],
            'demo_url' => ['nullable', 'url', 'max:500'],
            'status' => ['required', 'in:draft,published'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        return $data;
    }
}

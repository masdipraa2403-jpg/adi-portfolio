@extends('layouts.admin')

@php
    $titles = [
        'educations' => 'Education',
        'experiences' => 'Work Experience',
        'organizations' => 'Organization',
        'skills' => 'Skills',
        'certificates' => 'Certificates',
        'projects' => 'Projects',
    ];
    $label = $titles[$type] ?? ucfirst($type);
@endphp

@section('title', ($item ? 'Edit ' : 'Tambah ') . $label . ' — Admin')
@section('heading', ($item ? 'Edit ' : 'Tambah ') . $label)

@section('content')
<form
    class="admin-form"
    method="POST"
    action="{{ $item ? route('admin.content.update', [$type, $item->id]) : route('admin.content.store', $type) }}"
    @if($type === 'certificates') enctype="multipart/form-data" @endif
>
    @csrf
    @if($item) @method('PUT') @endif

    <div class="form-card">
        @if($type === 'educations')
            <div class="form-row">
                <label>Institusi
                    <input type="text" name="institution" value="{{ old('institution', $item->institution ?? '') }}" required>
                </label>
                <label>Jurusan
                    <input type="text" name="major" value="{{ old('major', $item->major ?? '') }}">
                </label>
            </div>
            <div class="form-row">
                <label>Tahun Mulai
                    <input type="text" name="start_year" value="{{ old('start_year', $item->start_year ?? '') }}" placeholder="2024">
                </label>
                <label>Tahun Selesai
                    <input type="text" name="end_year" value="{{ old('end_year', $item->end_year ?? '') }}" placeholder="Sekarang">
                </label>
            </div>
            <label>Logo Path <span class="optional">(opsional)</span>
                <input type="text" name="logo" value="{{ old('logo', $item->logo ?? '') }}" placeholder="assets/images/logo.png">
            </label>
            <label>Deskripsi
                <textarea name="description" rows="6">{{ old('description', $item->description ?? '') }}</textarea>
            </label>

        @elseif($type === 'experiences')
            <div class="form-row">
                <label>Perusahaan
                    <input type="text" name="company" value="{{ old('company', $item->company ?? '') }}" required>
                </label>
                <label>Posisi
                    <input type="text" name="position" value="{{ old('position', $item->position ?? '') }}" required>
                </label>
            </div>
            <div class="form-row">
                <label>Mulai
                    <input type="date" name="start_date" value="{{ old('start_date', isset($item->start_date) ? $item->start_date?->format('Y-m-d') : '') }}">
                </label>
                <label>Selesai
                    <input type="date" name="end_date" value="{{ old('end_date', isset($item->end_date) ? $item->end_date?->format('Y-m-d') : '') }}">
                </label>
            </div>
            <label>Lokasi
                <input type="text" name="location" value="{{ old('location', $item->location ?? '') }}">
            </label>
            <label>Logo Path <span class="optional">(opsional)</span>
                <input type="text" name="logo" value="{{ old('logo', $item->logo ?? '') }}" placeholder="assets/images/logo.png">
            </label>
            <label>Deskripsi
                <textarea name="description" rows="6">{{ old('description', $item->description ?? '') }}</textarea>
            </label>

        @elseif($type === 'organizations')
            <div class="form-row">
                <label>Organisasi
                    <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}" required>
                </label>
                <label>Jabatan
                    <input type="text" name="position" value="{{ old('position', $item->position ?? '') }}">
                </label>
            </div>
            <div class="form-row">
                <label>Periode
                    <input type="text" name="period" value="{{ old('period', $item->period ?? '') }}">
                </label>
                <label>Lokasi
                    <input type="text" name="location" value="{{ old('location', $item->location ?? '') }}">
                </label>
            </div>
            <label>Logo Path <span class="optional">(opsional)</span>
                <input type="text" name="logo" value="{{ old('logo', $item->logo ?? '') }}" placeholder="assets/images/logo.png">
            </label>
            <label>Deskripsi
                <textarea name="description" rows="5">{{ old('description', $item->description ?? '') }}</textarea>
            </label>
            <label>Pencapaian
                <textarea name="achievement" rows="4">{{ old('achievement', $item->achievement ?? '') }}</textarea>
            </label>

        @elseif($type === 'skills')
            <div class="form-row">
                <label>Nama Skill
                    <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}" required>
                </label>
                <label>Kategori
                    <input type="text" name="category" value="{{ old('category', $item->category ?? '') }}" placeholder="Web Development">
                </label>
            </div>
            <div class="form-row">
                <label>Level (0–100)
                    <input type="number" name="level" min="0" max="100" value="{{ old('level', $item->level ?? 70) }}" required>
                </label>
                <label>Icon <span class="optional">(opsional)</span>
                    <input type="text" name="icon" value="{{ old('icon', $item->icon ?? '') }}" placeholder="⌘">
                </label>
            </div>

        @elseif($type === 'certificates')
            <div class="form-row">
                <label>Nama Sertifikat
                    <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}" required>
                </label>
                <label>Penerbit
                    <input type="text" name="issuer" value="{{ old('issuer', $item->issuer ?? '') }}">
                </label>
            </div>
            <div class="form-row">
                <label>Tanggal / Tahun
                    <input type="text" name="issued_at" value="{{ old('issued_at', $item->issued_at ?? '') }}" placeholder="2026">
                </label>
                <label>Credential ID <span class="optional">(opsional)</span>
                    <input type="text" name="credential_id" value="{{ old('credential_id', $item->credential_id ?? '') }}">
                </label>
            </div>
            <label>Credential URL <span class="optional">(opsional)</span>
                <input type="url" name="credential_url" value="{{ old('credential_url', $item->credential_url ?? '') }}" placeholder="https://...">
            </label>

            <div class="certificate-upload-box">
                <div class="upload-heading">
                    <strong>File Sertifikat</strong>
                    <p class="upload-help">PDF, JPG, JPEG, PNG, WEBP, atau GIF · maksimal 10 MB.</p>
                </div>
                <label for="certificate_file" class="certificate-file-label">
                    <span class="upload-icon">↑</span>
                    <span><strong>Pilih file sertifikat</strong><small>Klik untuk memilih file</small></span>
                </label>
                <input id="certificate_file" type="file" name="file" accept=".pdf,.jpg,.jpeg,.png,.webp,.gif,application/pdf,image/jpeg,image/png,image/webp,image/gif">

                <div id="certificate-preview" class="certificate-preview" style="display:none;">
                    <div class="preview-header">
                        <strong>File baru</strong>
                        <button type="button" id="remove-certificate" class="preview-remove">Hapus</button>
                    </div>
                    <div id="certificate-preview-content"></div>
                </div>

                @if($item?->file)
                    @php
                        $ext = strtolower(pathinfo($item->file, PATHINFO_EXTENSION));
                        $certificateUrl = \Illuminate\Support\Str::startsWith($item->file, ['http://','https://','/'])
                            ? $item->file
                            : asset('storage/' . ltrim($item->file, '/'));
                        $isImage = in_array($ext, ['jpg','jpeg','png','webp','gif'], true);
                    @endphp
                    <div class="current-certificate">
                        <div class="current-certificate-header">
                            <strong>Sertifikat saat ini</strong>
                            <span class="current-file-type">{{ strtoupper($ext) }}</span>
                        </div>
                        @if($isImage)
                            <div class="current-certificate-image"><img src="{{ $certificateUrl }}" alt="{{ $item->name }}"></div>
                        @else
                            <div class="current-certificate-pdf">
                                <div class="pdf-icon">PDF</div>
                                <div><strong>File PDF Sertifikat</strong><small>{{ basename($item->file) }}</small></div>
                            </div>
                        @endif
                        <div class="current-certificate-actions">
                            <a class="certificate-view" href="{{ $certificateUrl }}" target="_blank" rel="noopener">Buka Sertifikat ↗</a>
                        </div>
                    </div>
                @endif
            </div>

            <label>Deskripsi
                <textarea name="description" rows="6">{{ old('description', $item->description ?? '') }}</textarea>
            </label>

        @elseif($type === 'projects')
            <div class="form-row">
                <label>Nama Project
                    <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}" required>
                </label>
                <label>Kategori
                    <input type="text" name="category" value="{{ old('category', $item->category ?? '') }}" placeholder="Web Development">
                </label>
            </div>
            <div class="form-row">
                <label>Tahun
                    <input type="text" name="year" value="{{ old('year', $item->year ?? '') }}" placeholder="2026">
                </label>
                <label>Slug
                    <input type="text" name="slug" value="{{ old('slug', $item->slug ?? '') }}" placeholder="Otomatis dari nama">
                </label>
            </div>
            <label>Short Description
                <input type="text" name="short_description" value="{{ old('short_description', $item->short_description ?? '') }}" placeholder="Ringkasan singkat project">
            </label>
            <label>Thumbnail Path
                <input type="text" name="thumbnail" value="{{ old('thumbnail', $item->thumbnail ?? '') }}" placeholder="images/projects/crud-pramil.png">
                <span class="optional">Gunakan path file dari folder public, tanpa / di awal.</span>
            </label>
            <div class="form-row">
                <label>GitHub URL <span class="optional">(opsional)</span>
                    <input type="url" name="github_url" value="{{ old('github_url', $item->github_url ?? '') }}" placeholder="https://github.com/...">
                </label>
                <label>Demo URL <span class="optional">(opsional)</span>
                    <input type="url" name="demo_url" value="{{ old('demo_url', $item->demo_url ?? '') }}" placeholder="https://...">
                </label>
            </div>
            <label>Deskripsi
                <textarea name="description" rows="10" placeholder="Jelaskan project, peran, fitur, dan hasilnya.">{{ old('description', $item->description ?? '') }}</textarea>
            </label>
            <div class="form-row">
                <label>Status
                    <select name="status">
                        <option value="draft" @selected(old('status', $item->status ?? 'draft') === 'draft')>Draft</option>
                        <option value="published" @selected(old('status', $item->status ?? '') === 'published')>Published</option>
                    </select>
                </label>
                <label>Urutan
                    <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $item->sort_order ?? 0) }}">
                </label>
            </div>
        @endif

        <div class="form-checks">
            <label>
                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $item->is_active ?? true))>
                Aktif / tampil di website
            </label>

            @if($type === 'projects')
                <label>
                    <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $item->is_featured ?? false))>
                    Featured project
                </label>
            @endif
        </div>
    </div>

    <div class="form-actions">
        <a class="btn btn-ghost" href="{{ route('admin.content.index', $type) }}">Batal</a>
        <button class="btn btn-primary" type="submit">{{ $item ? 'Simpan Perubahan' : 'Simpan Data' }} ↗</button>
    </div>
</form>
@endsection

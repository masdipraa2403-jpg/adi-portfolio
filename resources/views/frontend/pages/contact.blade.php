@extends('layouts.frontend')
@section('title','Contact — Adi Prasetyo')
@section('content')
@include('frontend.partials.page-hero',[
    'kicker'=>'Contact',
    'title'=>'Mari membuat sesuatu yang <span>hebat.</span>',
    'description'=>'Punya ide website, desain, editing, atau sekadar ingin ngobrol? Kirim pesan melalui form di bawah.'
])
<section class="section contact-section">
    <div class="container contact-grid">
        <div>
            <span class="section-kicker">GET IN TOUCH</span>
            <h2>Let's talk about your <span>next idea.</span></h2>
            <p>Sampaikan kebutuhan atau ide project kamu. Pesan akan masuk langsung ke dashboard admin portfolio.</p>

            <div class="contact-points">
                <div><span>✉</span><div><small>Email</small><b>masdipraa2403@gmail.com</b></div></div>
                <div><span>⌁</span><div><small>WhatsApp</small><b>083895786587</b></div></div>
                <div><span>⌁</span><div><small>Instagram</small><b>@masdipraaaprsty24</b></div></div>
                <div><span>⌁</span><div><small>Fokus</small><b>Web · Design · Editing</b></div></div>
                <div><span>↗</span><div><small>Response</small><b>Pesan dibaca melalui dashboard</b></div></div>
            </div>
        </div>

        <form class="contact-form" method="POST" action="{{ route('contact.store') }}">
            @csrf
            @if($errors->any())
                <div class="alert error">{{ $errors->first() }}</div>
            @endif

            <div class="form-row">
                <label>Nama
                    <input name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nama kamu">
                </label>
                <label>Email
                    <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email@example.com">
                </label>
            </div>

            <label>Subjek
                <input name="subject" value="{{ old('subject') }}" required placeholder="Tentang apa?">
            </label>

            <label>Pesan
                <textarea name="message" rows="7" required placeholder="Tulis pesan kamu...">{{ old('message') }}</textarea>
            </label>

            <button class="btn btn-primary" type="submit">Kirim Pesan <span>↗</span></button>
        </form>
    </div>
</section>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @php
            $activeTab = request('tab', 'hero');
        @endphp

        <ul class="nav nav-tabs" id="mainTabs">
            <li class="nav-item">
                <a class="nav-link {{ $activeTab === 'hero' ? 'active' : '' }}" id="hero-tab" href="{{ route('admin.content', ['tab' => 'hero']) }}">
                    <i class="bi bi-people"></i> Hero/Startseite
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeTab === 'about' ? 'active' : '' }}" id="general-tab" href="{{ route('admin.content', ['tab' => 'about']) }}">
                    <i class="bi bi-gear"></i> Über uns
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeTab === 'clients' ? 'active' : '' }}" id="content-tab" href="{{ route('admin.content', ['tab' => 'clients']) }}">
                    <i class="bi bi-file-text"></i> Klienten
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeTab === 'projects' ? 'active' : '' }}" id="content-tab" href="{{ route('admin.content', ['tab' => 'projects']) }}">
                    <i class="bi bi-file-text"></i> Projekte
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeTab === 'services' ? 'active' : '' }}" id="content-tab" href="{{ route('admin.content', ['tab' => 'services']) }}">
                    <i class="bi bi-file-text"></i> Leistungen
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeTab === 'team' ? 'active' : '' }}" id="content-tab" href="{{ route('admin.content', ['tab' => 'team']) }}">
                    <i class="bi bi-file-text"></i> Team
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeTab === 'contact' ? 'active' : '' }}" id="content-tab" href="{{ route('admin.content', ['tab' => 'contact']) }}">
                    <i class="bi bi-file-text"></i> Kontakt
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeTab === 'form' ? 'active' : '' }}" id="content-tab" href="{{ route('admin.content', ['tab' => 'form']) }}">
                    <i class="bi bi-file-text"></i> Kontakt-Formular
                </a>
            </li>
        </ul>

        <div class="tab-content mt-3">
            <div class="tab-pane fade {{ $activeTab === 'hero' ? 'show active' : '' }}" id="hero">
                @include('admin.tabs.hero')
            </div>
            <div class="tab-pane fade {{ $activeTab === 'about' ? 'show active' : '' }}" id="about">
                @include('admin.tabs.about')
            </div>
            <div class="tab-pane fade {{ $activeTab === 'clients' ? 'show active' : '' }}" id="clients">
                @include('admin.tabs.clients')
            </div>
            <div class="tab-pane fade {{ $activeTab === 'projects' ? 'show active' : '' }}" id="projects">
                @include('admin.tabs.projects')
            </div>
            <div class="tab-pane fade {{ $activeTab === 'services' ? 'show active' : '' }}" id="services">
                @include('admin.tabs.services')
            </div>
            <div class="tab-pane fade {{ $activeTab === 'team' ? 'show active' : '' }}" id="team">
                @include('admin.tabs.team')
            </div>
            <div class="tab-pane fade {{ $activeTab === 'contact' ? 'show active' : '' }}" id="contact">
                @include('admin.tabs.contact')
            </div>
            <div class="tab-pane fade {{ $activeTab === 'form' ? 'show active' : '' }}" id="form">
                @include('admin.tabs.form')
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', (\App\Models\Setting::getValue('site_title') ?? 'Website') . ' - Administration')

@section('content')
    <div class="container mt-4">
        @php
            // Standard-Tab setzen, wenn keiner über die URL kommt
            $activeTab = request('tab', 'general');
        @endphp

        <ul class="nav nav-tabs" id="mainTabs">
            @if (auth()->user()->role === 'admin')
                <li class="nav-item">
                    <a class="nav-link {{ $activeTab === 'users' ? 'active' : '' }}" id="users-tab" data-bs-toggle="tab" href="#users">
                        <i class="bi bi-people"></i> Benutzerverwaltung
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link {{ $activeTab === 'general' ? 'active' : '' }}" id="general-tab" data-bs-toggle="tab" href="#general">
                    <i class="bi bi-gear"></i> Allgemeine Einstellungen
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeTab === 'content' ? 'active' : '' }}" id="content-tab" data-bs-toggle="tab" href="#content">
                    <i class="bi bi-file-text"></i> Seiteninhalte
                </a>
            </li>
        </ul>

        <div class="tab-content mt-3">
            <!-- Allgemeine Einstellungen -->
            <div class="tab-pane fade {{ $activeTab === 'general' ? 'show active' : '' }}" id="general">
                @include('admin.tabs.general')
            </div>

            <!-- Seiteninhalte -->
            <div class="tab-pane fade {{ $activeTab === 'content' ? 'show active' : '' }}" id="content">
                @include('admin.tabs.content')
            </div>

            <!-- Benutzerverwaltung -->
            @if (auth()->user()->role === 'admin')
                <div class="tab-pane fade {{ $activeTab === 'users' ? 'show active' : '' }}" id="users">
                    @include('admin.tabs.users')
                </div>
            @endif
        </div>
    </div>
@endsection

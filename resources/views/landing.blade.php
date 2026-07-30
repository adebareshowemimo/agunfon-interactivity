@extends('layouts.app')

@section('title', 'Agunfon - Enterprise Learning Solutions & Premium Moodle Plugins')
@section('description', 'Agunfon delivers adaptive LMS platforms, expert learning content, and premium Moodle plugins that turn training activity into measurable, auditable outcomes.')

@section('content')
    @include('components.hero')
    @include('components.trusted-by')
    @include('components.features-accordion')
    @include('components.lms-features')
    @include('components.testimonials')
    @include('components.cta-section')
@endsection

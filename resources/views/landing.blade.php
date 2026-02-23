@extends('layouts.app')

@section('content')
    @include('components.hero')
    @include('components.trusted-by')
    @include('components.features-accordion')
    @include('components.lms-features')
    @include('components.testimonials')
    @include('components.cta-section')
@endsection

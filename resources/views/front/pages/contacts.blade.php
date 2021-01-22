@extends('front.layouts.without_header_image')

@section('content')
    @include('front.partials.contact_with_us', ['contacts_page' => true])
@endsection

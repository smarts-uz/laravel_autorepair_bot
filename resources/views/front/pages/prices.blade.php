@extends('front.layouts.without_header_image')

@section('content')
    <div class="service-container bg-gray-100">
        <div class="service-holder flex-col pb-8">

            <div class="price-content flex-wrap flex-row justify-center items-center mt-8 font-thin">
                @foreach($categories as $category)
                <h1 class="text-start text-4xl pt-8">{{ $category->name }}</h1>
                    @foreach($category->services as $service)
                        <div class="price-info  flex flex-wrap  border-2 bg-white py-4 px-4 justify-evenly items-center my-6 ">
                            <p>{{ $service->name }}</p>
                            <p class='font-extrabold  ml-4'>от {{ $service->price }} руб.</p>
                            <a class='text-blue-500 font-bold underline pr-4 ml-4' href="#">Заказать</a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

    @include('front.partials.contact_with_us')
@endsection

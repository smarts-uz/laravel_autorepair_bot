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

{{--                <div class="price-content flex-wrap flex-row justify-center items-center mt-8 font-thin">--}}
{{--                    <h1 class="text-start text-4xl pt-8">Цены на работы</h1>--}}
{{--                    <div class="price-info  flex flex-wrap  border-2 bg-white py-4 px-4 justify-evenly items-center my-6 ">--}}
{{--                        <p>Вскрытие авто</p>--}}
{{--                        <p class='font-extrabold  ml-4'>от 600 руб.</p>--}}
{{--                        <a class='text-blue-500 font-bold underline pr-4 ml-4' href="#">Заказать</a>--}}
{{--                    </div>--}}
{{--                    <div class="price-info  flex flex-wrap  border-2 bg-white py-4 px-4 justify-evenly items-center my-6 ">--}}
{{--                        <p>Вскрытие авто</p>--}}
{{--                        <p class='font-extrabold  ml-4'>от 600 руб.</p>--}}
{{--                        <a class='text-blue-500 font-bold underline pr-4 ml-4' href="#">Заказать</a>--}}
{{--                    </div>--}}

{{--                    <div class="price-content flex-wrap flex-row justify-center items-center mt-8 font-thin">--}}
{{--                        <h1 class="text-start text-4xl pt-8">Цены на работы</h1>--}}
{{--                        <div class="price-info  flex flex-wrap  border-2 bg-white py-4 px-4 justify-evenly items-center my-6 ">--}}
{{--                            <p>Вскрытие авто</p>--}}
{{--                            <p class='font-extrabold  ml-4'>от 600 руб.</p>--}}
{{--                            <a class='text-blue-500 font-bold underline pr-4 ml-4' href="#">Заказать</a>--}}
{{--                        </div>--}}
{{--                        <div class="price-info  flex flex-wrap  border-2 bg-white py-4 px-4 justify-evenly items-center my-6 ">--}}
{{--                            <p>Вскрытие авто</p>--}}
{{--                            <p class='font-extrabold  ml-4'>от 600 руб.</p>--}}
{{--                            <a class='text-blue-500 font-bold underline pr-4 ml-4' href="#">Заказать</a>--}}
{{--                        </div>--}}

{{--                        <div class="price-content flex-wrap flex-row justify-center items-center mt-8 font-thin">--}}
{{--                            <h1 class="text-start text-4xl pt-8">Цены на работы</h1>--}}
{{--                            <div class="price-info  flex flex-wrap  border-2 bg-white py-4 px-4 justify-evenly items-center my-6 ">--}}
{{--                                <p>Вскрытие авто</p>--}}
{{--                                <p class='font-extrabold  ml-4'>от 600 руб.</p>--}}
{{--                                <a class='text-blue-500 font-bold underline pr-4 ml-4' href="#">Заказать</a>--}}
{{--                            </div>--}}
{{--                            <div class="price-info  flex flex-wrap  border-2 bg-white py-4 px-4 justify-evenly items-center my-6 ">--}}
{{--                                <p>Вскрытие авто</p>--}}
{{--                                <p class='font-extrabold  ml-4'>от 600 руб.</p>--}}
{{--                                <a class='text-blue-500 font-bold underline pr-4 ml-4' href="#">Заказать</a>--}}
{{--                            </div>--}}




{{--                            <div class="paragraph-price flex-col bg-blue-600 p-4 text-white">--}}
{{--                                <p>--}}
{{--                                    Цена озвученная диспетчером, не увеличится на месте работ.--}}
{{--                                </p><br>--}}
{{--                                <p> При невозможности точно описать проблему диспетчеру, стоимость--}}
{{--                                    работ определяет мастер.--}}
{{--                                </p><br>--}}
{{--                                <p>--}}
{{--                                    Стоимость зависит от сложности и условий--}}
{{--                                    проведения работ.--}}
{{--                                    Вы заплатите на 10-20% меньше средней цены по рынку.--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

    @include('front.partials.contact_with_us')
@endsection

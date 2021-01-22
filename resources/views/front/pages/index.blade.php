@extends('front.layouts.with_header_image')

@section('content')
    <!-- Offer partial -->
    @include('front.partials.offer')

    {{--  Messangers  --}}
    @include('front.partials.messengers')

    <div class="info-container flex-row items-center bg-white py-16">
        <div class="flex-col">
            {!! $category->inner_description !!}
{{--            TODO optimize getting url --}}
            <img class="mt-8" src="{{ '/storage/' . $category->inner_description_image }}" alt="">
        </div>
    </div>

    <!-- service container -->
    <h1 class="text-center text-4xl pt-8">Цены на работы</h1>
    <div class="price-content flex-wrap flex-row justify-center items-center mt-8 font-thin">

        @foreach($category->services as $service)
            <div class="price-info  flex flex-wrap  border-2 bg-white py-4 px-4 justify-evenly items-center my-6 ">
                <p>{{ $service->name }}</p>
                <p class='font-extrabold  ml-4'>от {{ $service->price }} руб.</p>
                <p onclick="priceOpen()" class='price-click text-blue-500 font-bold underline pr-4 ml-4 cursor-pointer'>Заказать</p>
            </div>
        @endforeach

        <div class="service-container bg-gray-100">
            <div class="service-holder flex-col pb-8">
                <div id="orderContainer" class="hidden">
                    <div class="callContainer bg-white text-center border-4 border-black  py-8 flex-col items-center justify-center absolute">
                        <i id="closeOrder" style=" font-size: 24px; right: 20px;" class="fas fa-times absolute top-1 cursor-pointer "></i>
                        <h1 class="mt-6 mb-4 font-extrabold text-2xl">Заказать</h1>
                        <p>Ремонт и отключение сигнализации / иммобилайзера</p>
                        <form action="" class="flex-col flex-wrap justify-center items-center">
                            <input class="formBtn-input bg-gray-300 p-2 pr-16 outline-none m-4 " type="text" placeholder="Ваше имя">
                            <input class="formBtn-input bg-gray-300 p-2 pr-16 outline-none m-4" type="tel" name="" id="" placeholder="Ваш телефон*">
                            <textarea style="height: 100px;" class="bg-gray-300 p-2 pr-16 ml-4 outline-none m-4" name="" id="" cols="30" rows="10" placeholder="Ваше сообщение"></textarea>
                            <input class="formBtn-input bg-blue-700 text-white hover:bg-blue-900 m-4  p-2 px-6 outline-none" type="submit" value="Отправить">
                        </form>

                    </div>
                </div>
                <div class="paragraph-price flex-col bg-blue-600 p-4 text-white">
                    <p>
                        Цена озвученная диспетчером, не увеличится на месте работ.
                    </p><br>
                    <p> При невозможности точно описать проблему диспетчеру, стоимость
                        работ определяет мастер.
                    </p><br>
                    <p>
                        Стоимость зависит от сложности и условий
                        проведения работ.
                        Вы заплатите на 10-20% меньше средней цены по рынку.
                    </p>
                </div>
            </div>

        </div>
    </div>

    {{--  how we works partial  --}}
    @include('front.partials.how_we_works')

    <div class=" bg-gray-100 py-12">
        <div class="flex-col content2">
            <h1 class="title text-center font-extrabold text-4xl py-6">
                {{ $category->bottom_description_title }}
            </h1>
            <div class="flex flex-wrap">
                {!! $category->bottom_description !!}
            </div>
        </div>
    </div>

    @include('front.partials.categories')

    <div class="application-form-image">
        <div class="application-form-container bg-white my-10 text-center py-8">
            <h1 class="mt-6 mb-4 font-extrabold text-2xl">Оставьте заявку</h1>
            <p class="pb-4">Можем предложить специальные условия именно для вас!</p>
            <form action="" class="flex flex-wrap justify-center items-center">
                <input class="bg-gray-300 p-2 pr-16 ml-4 outline-none m-4" type="text" placeholder="Ваше имя">
                <input class="bg-gray-300 p-2 pr-16 ml-4 outline-none m-4" type="tel" name="" id="" placeholder="Ваш телефон*">
                <input class="bg-blue-700 text-white hover:bg-blue-900 m-4 p-2 px-6 ml-4 outline-none" type="submit" value="Узнать стоимость">
            </form>

        </div>
    </div>

    <div class=" bg-gray-100">
        <div class="flex-col mx-12 py-8 flex-wrap">
            <h1 class="text-center font-extrabold text-4xl py-12">
                {{ $category->process_title }}
            </h1>
            <div class="flex mx-4 justify-center">
                {!! $category->process_description !!}
            </div>
        </div>
    </div>

    @if($category->show_our_works)
        <div class="repair-container bg-white-100 lg:mx-24 md:mx-12 ">
            <h1 class="text-center font-extrabold text-4xl py-12">
                Наши работы
            </h1>
            <div>
                <div class="image-repair-container grid grid-cols-4 grid-rows-2 gap-8 flex pb-16">
                    @foreach($category->our_works as $work)
                        <div
                            class="
                                @if($work->column != null || $work->column != '')
                                    col-span-{{ $work->column }}
                                @endif
                                @if($work->row != null || $work->row != '')
                                    row-span-{{ $work->row }}
                                @endif
                                cursor-pointer
                                flex-wrap
                                flex
                            "
                        >
                            <img
                                style="width: 100%;"
                                class="hover:scale-125"
                                src="{{ '/storage/' . $work->image }}"
                                alt=""
                            >
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    <!-- Наши работы section end -->
    @endif

    @if($category->show_contact_form)
        @include('front.partials.contact_with_us')
    @endif
@endsection

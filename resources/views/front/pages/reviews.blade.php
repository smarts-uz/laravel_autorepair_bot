@extends('front.layouts.without_header_image')

@section('content')
    <div id="reviewContainer" @if(!$errors->any()) class="hidden" @endif>
        <div class="formBtn-container border-4 z-10 w-96 border-black  bg-white text-center  py-8 flex-col items-center justify-center absolute">
            <i id="closeBtnReview" style=" font-size: 24px; right: 20px;" class="fas fa-times fixed top-1 cursor-pointer "></i>
            <h1 class="mt-6 mb-4 font-extrabold text-2xl">Заказать звонок</h1>

            <form
                action="{{ route('website.reviews.save') }}"
                class="flex-col flex-wrap justify-center items-center"
                method="post"
            >
                @csrf

                <input
                    class="formBtn-input bg-gray-300 p-2 pr-16 outline-none m-4"
                    type="text"
                    name="name"
                    placeholder="Ваше имя*"
                    value="{{ old('name') }}"
                >

                <input
                    class="formBtn-input bg-gray-300 p-2 pr-16 outline-none m-4"
                    type="tel"
                    name="phone_number"
                    id=""
                    placeholder="Ваш телефон*"
                    value="{{ old('phone_number') }}"
                >

                <textarea
                    class="formBtn-input bg-gray-300 p-2 pr-16 outline-none m-4"
                    placeholder="Ваш отзыв*"
                    name="message"
                    id=""
                    cols="30"
                    rows="10"
                >{{ old('message') }}</textarea>

                <input
                    class="formBtn-input bg-blue-700 text-white hover:bg-blue-900 m-4 p-2 px-6 outline-none"
                    type="submit"
                    value="Отправить"
                >
            </form>

        </div>
    </div>

    <div class="mx-12 my-12">
        <h1 class="text-center mb-6 font-extrabold text-4xl">Отзывы наших клиентов</h1>
        <p>Мы - дорожим своей репутацией и отвечаем за качество
            выполненных работ! Наша команда опытных профессионалов
            поможет в любой ситуации 24/7! Если вы стали нашим клиентом,
            то му будем рады вашему отзыву о нашей работе!</p>
        <button id="reviewBtn" class="py-4 px-8 bg-blue-600 text-white mt-6">Оставить отзыв</button>
    </div>


    <div class="flex flex-wrap mx-24 justify-center items-center">
        @foreach($reviews as $review)
        <div class="bg-white shadow-2xl  p-12 mb-10">
            <div class="">
                <img src="https://auto-help-spb.ru/images/feedback-icon.svg" alt="">
                <p class="my-6">
                    {{ $review->message }}
                </p>
            </div>
            <div class="mt-24">
                <p class="font-extrabold">{{ $review->name }}</p>
                <p>{{ $review->created_at->format('d.m.Y') }}</p>
            </div>
        </div>
        @endforeach
    </div>

    @include('front.partials.contact_with_us')
@endsection

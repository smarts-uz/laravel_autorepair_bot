@extends('layouts.app')

@section('title', $category->seo_title)
@section('description', $category->seo_description)
@section('keywords', $category->seo_keywords)

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-4">{!! $category->inner_title !!}</h1>
                    <p class="lead">От {{ $category->price_from }} рублей</p>

                    @foreach($category->lists as $list)
                        <p> -- {{ $list->text }}</p>
                    @endforeach
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="#" role="button">Заказать</a>
                    </p>
                    <hr class="my-4">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div>
                    {!! $category->inner_description !!}
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ '/storage/' . $category->inner_description_image }}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="list-group">
                    @forelse($category->services as $service)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>{{ $service->name }}</div>
                        <div>
                            От {{ $service->price }} руб.
                        </div>
                        <div>
                            <a href="#" class="btn btn-primary">
                                Заказать
                            </a>
                        </div>
                    </li>
                    @empty
                        <li class="list-group-item">
                            Пусто
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 text-center">
                {!! $category->category_description_title !!}
            </div>
            <div class="col-md-12 mt-3">
                {!! $category->catebory_description !!}
            </div>
        </div>
    </div>
@endsection

<div
    id="navContainer"
    style="height: 100vh; width: 50vw;"
    class="flex-col justify-center items-center bg-black text-white w-25 p-3 absolute left-0 top-0 hidden"
>
    <ul
        class="text-white"
    >
        Услуги
        <div style="right: 20px; top: 0px;" id="cancel" class="text-xl header-nav__close absolute ">x</div>
        <div id="plus" class="absolute ml-16 mt-2  top-0 text-xl">+</div>
        <div id="minus" class="absolute ml-16 mt-2 top-0 hidden text-xl">-</div>
        <div id="navMenu" class="hidden pl-8">
            @forelse($categories as $category)
                <a href="{{ route('website.category', $category->slug) }}"><li>{{ $category->name }}</li></a>
            @empty
                <a href="#"><li>Пока пусто</li></a>
            @endforelse
        </div>
    </ul>
    <a href="#">
        <ul>Цена</ul>
    </a>
    <a href="#">
        <ul>Отзывы</ul>
    </a>
    <a href="#">
        <ul>Контакты</ul>
    </a>
</div>

<div class="bg-white py-12">
    <div class="our-offers flex-col">
        <h1 class="font-extrabold text-4xl text-center py-6">Наши услуги</h1>
        <div class="flex text-center justify-center items-center flex-wrap">
            @foreach($categories as $category)
                <div class="offers-align p-6 mt-4 mx-3">
                    <img class='rounded-full' src="https://auto-help-spb.ru/assets/cache_image/images/top/buksirovka-avtomobilya_90x90_be4.jpg" alt="">
                    <p class="py-4">{{ $category->name }}</p>
                    <p  class=" py-4 font-extrabold text-lg">от {{ $category->price_from }} руб.</p>
                    <button onclick="priceOpen2()" class="font-extrabold text-blue-500 border-2 border-blue-500 py-2 px-10 hover:bg-blue-500 hover:text-white transition duration-300">Заказать</button>
                </div>
            @endforeach
        </div>
        <div id="orderContainer2" class="hidden">
            <div class="callContainer bg-white text-center border-4 border-black  py-8 flex-col items-center justify-center absolute">
                <i id="closeOrder2" style=" font-size: 24px; right: 20px;" class="fas fa-times absolute top-1 cursor-pointer "></i>
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
    </div>

</div>

<x-template>
    <div class="wrapper">
        <main class="main-content">
            <div class="my-profile">
                <h2 class="heading">Мой профиль</h2>
                <div class="profile">
                    <div class="avatar">
                        <img src="{{asset(auth()->user()->avatar)}}" alt="Аватар" class="avatar__pic">
                    </div>
                    <div class="information">
                        <div class="nickname">{{auth()->user()->nickname}}</div>
                        <div class="user-name">
                            <span class="name">{{auth()->user()->name}}</span>
                            <span class="surname">{{auth()->user()->surname}}</span>
                        </div>
                        <a href='tel:{{$phone}}' class="phone">{{$phone->formatE164()}}</a>
                    </div>
                </div>
                <form action="/article/create" class="form" method="post">
                    @csrf
                    <label class="form__label" for="text">Напишите пост!!!</label>
                    <textarea id="text" name="text" class="form__textarea" required></textarea> <br>
                    <x-error name="text"/>
                    <button type="submit" class="form__button">Отправить</button>
                </form>
            </div>
        </main>
    </div>
    <x-footer class="footer_forms"/>
</x-template>

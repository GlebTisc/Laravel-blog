<x-template>
    <div class="wrapper">
        <main class="main-content">
            <div class='edit-profile'>
                <h2 class="heading">Редактировать профиль</h2>
                <form class='form' id='form' method='POST' action="/profile" enctype='multipart/form-data'>
                    @csrf
                    <ul class="form__list">
                        <li class="form__item">
                            <label class='form__label' for="nickname">Никнейм:</label>
                            <input class='form__input' name="nickname" id='nickname' value="{{old('nickname')}}" type="text">
                        </li>
                        <x-error name="nickname"/>
                        <li class="form__item">
                            <label class='form__label' for="name">Имя:</label>
                            <input class='form__input' name="name" id='name' value="{{old('name')}}" type="text">
                        </li>
                        <x-error name="name"/>
                        <li class="form__item">
                            <label class='form__label' for="surname">Фамилия:</label>
                            <input class='form__input' name="surname" id='surname' value="{{old('surname')}}" type="text">
                        </li>
                        <x-error name="surname"/>
                        <li class="form__item">
                            <label class='form__inline-label' for="avatar">Аватар:</label>
                            <input class='form__inline-input' name="avatar" id='avatar' type="file" value='image/jpeg,image/png'>
                        </li>
                        <x-error name="avatar"/>
                        <li class="form__item">
                            <label class='form__label' for="phone">Телефон:</label>
                            <input class='form__input' name="phone" id='phone' value="{{old('phone')}}" type="text">
                        </li>
                        <x-error name="phone"/>
                        <li class="form__item">
                            <div class="form__title">Пол:</div>
                            <label class='form__inline-label' for="male">Мужской</label>
                            <input class='form__inline-input' name='sex' value="male" id='male' type="radio"
                                {{old('sex') == 'male'  ? 'checked' : ''}}>
                            <label class='form__inline-label' for="female">Женский</label>
                            <input class='form__inline-input' name='sex' value="female" id='female' type="radio"
                                {{old('sex') == 'female'  ? 'checked' : ''}}>
                        </li>
                        <x-error name="sex"/>
                        <li class="form__item">
                            <label class='form__inline-label' for="showPhone">Я согласен получать email-рассылку</label>
                            <input class='form__inline-input' name="showPhone" id='showPhone' value="1" type="checkbox"
                            {{old('showPhone') ? 'checked' : ''}}>
                        </li>
                        <li class="form__item">
                            <button class='form__button' type="submit">Отправить</button>
                        </li>
                    </ul>
                </form>
            </div>
        </main>
    </div>
    <x-footer class="footer_forms"/>
</x-template>


<x-template>
    <div class="wrapper">
        <main class="main-content">
            <h2 class="heading">Опыт пользователя</h2>
            <div class="form">
                @csrf
                <ul class="form__list">
                    <label class='form__label' for="user_id">ID пользователя</label>
                    <li class="form__item">
                        <input type="number" name="user_id" id="user_id">
                    </li>
                    <li class="form__item" id="experience_form">
                        <p class="heading">Опыт: <span id="current_experience"></span></p>
                    </li>
                </ul>
                <div class="buttons">
                    <button class="restore_button" id="start_button">Старт</button>
                    <button class="delete_button" id="stop_button">Стоп</button>
                </div>
            </div>
        </main>
    </div>
    <x-footer class="footer_forms"/>
    <script src="{{asset('/js/script.js')}}"></script>
</x-template>

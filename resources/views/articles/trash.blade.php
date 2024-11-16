<x-template>
    <div class="articles_main">
        @foreach($articles as $article)
            <article>
                <p>{{$article->text}}</p>
                <p>Authors:
                    @foreach($article->users as $user)
                        <a href="/author/{{$user->nickname}}" class="author-link">{{$user->name}}</a>
                    @endforeach
                </p>
                <form action="/article/{{$article->id}}/erase" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="delete_button">Удалить</button>
                </form>
                <form action="/article/{{$article->id}}/restore" method="post">
                    @csrf
                    @method("PATCH")
                    <button type="submit" class="restore_button">Восстановить</button>
                </form>
            </article>
        @endforeach
        @if($articles->isEmpty())
            <div class="nothing_here">
                <h1>Здесь ничего нет....</h1>
            </div>
        @endif
    </div>
    {{$articles->links()}}
    <x-footer class="footer_main"/>
</x-template>

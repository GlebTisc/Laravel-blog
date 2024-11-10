<x-template>
    <div class="articles_main">
        @foreach($articles as $article)
            <article>
                <p>{{$article->text}}</p>
                <p>Authors:
                    @foreach($article->users as $user)
                        <a href="/author/{{$user->name}}" class="author-link">{{$user->name}}</a>
                    @endforeach
                </p>
                @auth
                    @if($article->users()->find(auth()->user()->id))
                        <form action="/article/{{$article->id}}/delete" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="delete_button">Удалить</button>
                        </form>
                    @endif
                @endauth
            </article>
        @endforeach
    </div>
    {{$articles->links()}}
    <x-footer class="footer_main"/>
</x-template>

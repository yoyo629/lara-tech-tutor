@component('mail::message')

# 昨日は{{$count}}件のつぶやきが追加されました!

{{$toUser->name}}さんこんにちは!

昨日{{$count}}件のつぶやきが追加されましたよ。最新のつぶやきを見にいきましょう。

@component('mail::button', ['url' => route('tweet.index')])
    つぶやきを見に行く
@endcomponent

@endcomponent

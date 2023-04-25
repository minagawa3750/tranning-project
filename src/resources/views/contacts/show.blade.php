@extends('layout')
@section('title')
    お問い合わせ詳細
@endsection
@section('content')
    <div>
        <h4>部署</h4>
        <p>{{ $contact->department->name }}</p>
    </div>
    <div>
        <h4>お名前</h4>
        <p>{{ $contact->name }}</p>
    </div>
    <div>
        <h4>メールアドレス</h4>
        <p>{{ $contact->email }}</p>
    </div>
    <div>
        <h4>年齢</h4>
        <p>{{ $contact->age }}</p>
    </div>
    <div>
        <h4>性別</h4>
        @if ( $contact->gender === 1)
            <p>男性</p>
        @elseif ( $contact->gender === 2)
            <p>女性</p>
        @else
            <p>その他</p>
        @endif
    </div>
    <div>
        <h4>お問い合わせ内容</h4>
        <p>{{ $contact->content }}</p>
    </div>
    <a href="/contact">一覧ページ</a>
@endsection
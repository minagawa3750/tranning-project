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
        <p>{{ $contact->gender }}</p>
    </div>
    <div>
        <h4>お問い合わせ内容</h4>
        <p>{{ $contact->content }}</p>
    </div>
    <a href="/contact">一覧ページ</a>
@endsection
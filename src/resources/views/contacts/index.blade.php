@extends('layout')
@section('title')
    お問い合わせ一覧
@endsection
@section('content')
    <h3>お問い合わせ一覧</h3>
    <div>
        <table>
            <thead>
                <tr>
                    <th>部署名</th>
                    <th>お名前</th>
                    <th>メールアドレス</th>
                    <th>年齢</th>
                    <th>性別</th>
                    <th>詳細</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->department->name }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->age }}</td>
                        <td>{{ $contact->gender }}</td>
                        <td><a href="/contact/{{ $contact->id }}">詳細</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <a href="/contact/confirm">お問い合わせフォーム</a>
    </div>
@endsection
@extends('layout')
@section('title')
    お問い合わせフォーム
@endsection
@section('content')
<h3>お問い合わせ</h3>
<form action="{{ route('contacts.store') }}" method="post">
    @csrf
    <div class="contact_form">
        <div>
            <label for="department">部署名</label>
            <select name="department_id" id="department_id" value="{{ old('department_id') }}">
                <option value="">-- 選択してください --</option>
                @foreach ($departments as $id => $name)
                    <option value="{{ $id }}" {{ old('department_id') ==  $id ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
            @error('department_id')
                <div class="validation">
                    <p class="validation_message" >
                        {{ $message }}
                    </p>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">お名前</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <div class="validation">
                    <p class="validation_message">
                        {{ $message }}
                    </p>
                </div>
            @enderror
        </div>
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <div class="validation">
                    <p class="validation_message">
                        {{ $message }}
                    </p>
                </div>
            @enderror
        </div>
        <div>
            <label for="age">年齢</label>
            <input type="text" name="age" id="age" value="{{ old('age') }}">
            @error('age')
                <div class="validation">
                    <p class="validation_message">
                        {{ $message }}
                    </p>
                </div>
            @enderror
        </div>
        <div>
            <label for="gender">性別</label>
            <select name="gender" id="gender">
                <option value="">-- 選択してください --</option>
                <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>男性</option>
                <option value="2" {{ old('gender') == 2 ? 'selected' : '' }}>女性</option>
                <option value="3" {{ old('gender') == 3 ? 'selected' : '' }}>その他</option>
            </select>
            @error('gender')
                <div class="validation">
                    <p class="validation_message">
                        {{ $message }}
                    </p>
                </div>
            @enderror
        </div>
        <div>
            <label for="content">お問い合わせ内容</label>
            <textarea name="content" id="content">{{ old('content') }}</textarea>
            @error('content')
                <div class="validation">
                    <p class="validation_message">
                        {{ $message }}
                    </p>
                </div>
            @enderror
        </div>
        <button type="submit">送信する</button>
    </div>
</form>
@endsection
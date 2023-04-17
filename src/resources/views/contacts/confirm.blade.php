<h3>お問い合わせ</h3>
<form action="{{ route('contacts.index') }}" method="post">
    @csrf
    @method("POST")
    <div class="contact_form">
        <div>
            <label for="department">部署名</label>
            <select name="department_id" id="department_id">
                <option value="">-- 選択してください --</option>
                @foreach ($departments as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">お名前</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="content">お問い合わせ内容</label>
            <textarea name="content"></textarea>
        </div>
    </div>
</form>
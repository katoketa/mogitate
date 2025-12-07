<form action="/products/register" method="post" enctype="multipart/form-data" class="register-form" novalidate>
    @csrf
    <label class="register-form__header">
        <span class="register-form__header-title">商品名</span>
        <span class="register-form__header-required">必須</span>
    </label>
    <input type="text" name="name" class="register-form__input" placeholder="商品名を入力" value="{{ old('name') }}">
    @if ($errors->has('name'))
    <ul class="register-form__error">
        @foreach ($errors->get('name') as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <label class="register-form__header">
        <span class="register-form__header-title">値段</span>
        <span class="register-form__header-required">必須</span>
    </label>
    <input type="text" name="price" class="register-form__input" placeholder="値段を入力" value="{{ old('price') }}">
    @if ($errors->has('price'))
    <ul class="register-form__error">
        @foreach ($errors->get('price') as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <label class="register-form__header">
        <span class="register-form__header-title">商品画像</span>
        <span class="register-form__header-required">必須</span>
    </label>
    @if ($upload_image)
    <img src="{{ $upload_image->temporaryUrl() }}" class="register-form__image-img">
    @endif
    <input type="file" name="image" wire:model="upload_image" accept="image/png,image/jpeg">
    @if ($errors->has('image'))
    <ul class="register-form__error">
        @foreach ($errors->get('image') as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <label class="register-form__header">
        <span class="register-form__header-title">季節</span>
        <span class="register-form__header-required">必須</span>
        <span class="register-form__header-multiple">複数選択可</span>
    </label>
    @foreach ($seasons as $season)
    <input type="checkbox" name="seasons[]" id="season{{ $season['id'] }}" class="register-form__input-checkbox" value="{{ $season['id'] }}" @if (old('seasons')) @foreach( old('seasons') as $old_season) @if ($old_season == $season['id']) checked @endif @endforeach @endif>
    <label for="season{{ $season['id'] }}" class="register-form__label-checkbox">{{ $season['name'] }}</label>
    @endforeach
    @if ($errors->has('seasons'))
    <ul class="register-form__error">
        @foreach ($errors->get('seasons') as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <label class="register-form__header">
        <span class="register-form__header-title">商品説明</span>
        <span class="register-form__header-required">必須</span>
    </label>
    <textarea name="description" class="register-form__textarea" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
    @if ($errors->has('description'))
    <ul class="register-form__error">
        @foreach ($errors->get('description') as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="register-form__button">
        <a href="/products" class="register-form__button-back">戻る</a>
        <button type="submit" class="register-form__button-submit">登録</button>
    </div>
</form>
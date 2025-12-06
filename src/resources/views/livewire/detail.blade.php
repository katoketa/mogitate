<div class="detail-page__content">

    <form action="/products/{{ $product['id'] }}/update" class="product-form" method="post" enctype="multipart/form-data">
        @csrf
        <div class="product-form__content">
            <div class="product-image">
                @if ($product_image)
                <img src="{{ $product_image->temporaryUrl() }}" alt="" class="product-image__img">
                @else
                <img src="{{ asset($product['image']) }}" alt="" class="product-image__img">
                @endif
                <input type="file" wire:model="product_image" accept="image/png,image/jpeg" class="product-image__input" name="image">
                @if ($errors->has('image'))
                <ul class="product-image__error">
                    @foreach ($errors->get('image') as $error)
                    <li class="product-image__error-list">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div class="product-items">
                <label class="product-item__header">商品名</label>
                <input type="text" class="product-item__input-text" name="name" value="{{ $product['name'] }}">
                @if ($errors->has('name'))
                <ul class="product-image__error">
                    @foreach ($errors->get('name') as $error)
                    <li class="product-image__error-list">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <label class="product-item__header">値段</label>
                <input type="text" class="product-item__input-text" name="price" value="{{ $product['price'] }}">
                @if ($errors->has('price'))
                <ul class="product-image__error">
                    @foreach ($errors->get('price') as $error)
                    <li class="product-image__error-list">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <label class="product-item__header">季節</label>
                @foreach ($seasons as $season)
                <input type="checkbox" name="seasons[]" id="season{{ $season['id'] }}" class="product-item__input-checkbox" value="{{ $season['id'] }}" @foreach ($product['seasons'] as $product_season) @if ($season['id']===$product_season['id']) checked @endif @endforeach>
                <label for="season{{ $season['id'] }}" class="product-item__checkbox-label">{{ $season['name'] }}</label>
                @endforeach
                @if ($errors->has('seasons'))
                <ul class="product-image__error">
                    @foreach ($errors->get('seasons') as $error)
                    <li class="product-image__error-list">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <label class="product-item__header-description">商品説明</label>
            <textarea name="description" class="product-description">{{ $product['description'] }}</textarea>
            @if ($errors->has('description'))
            <ul class="product-image__error">
                @foreach ($errors->get('description') as $error)
                <li class="product-image__error-list">{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="product-form__buttons">
            <a href="/products" class="product-form__button-back">戻る</a>
            <button type="submit" class="product-form__button-submit">変更を保存</button>
        </div>
    </form>
    <form action="/products/{{ $product['id'] }}/delete" method="post" class="delete_form">
        @method('DELETE')
        @csrf
        <button class="delete_form__button">削除</button>
    </form>
</div>
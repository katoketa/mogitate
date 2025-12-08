<div class="detail-page__content">

    <form action="/products/{{ $product['id'] }}/update" class="product-form" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="product-form__content">
            <div class="product-image">
                @if ($product_image)
                <img src="{{ $product_image->temporaryUrl() }}" alt="" class="product-image__img">
                @else
                <img src="{{ asset($product['image']) }}" alt="" class="product-image__img">
                @endif
                <input type="file" wire:model="product_image" accept="image/png,image/jpeg" name="image">
                @if ($errors->has('image'))
                <ul class="product-form__error">
                    @foreach ($errors->get('image') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div class="product-items">
                <div class="product-item">
                    <label class="product-item__header">商品名</label>
                    <input type="text" class="product-item__input-text" name="name" value="{{ $product['name'] }}">
                    @if ($errors->has('name'))
                    <ul class="product-form__error">
                        @foreach ($errors->get('name') as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="product-item">
                    <label class="product-item__header">値段</label>
                    <input type="text" class="product-item__input-text" name="price" value="{{ $product['price'] }}">
                    @if ($errors->has('price'))
                    <ul class="product-form__error">
                        @foreach ($errors->get('price') as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="product-item">
                    <label class="product-item__header">季節</label>
                    @foreach ($seasons as $season)
                    <input type="checkbox" name="seasons[]" id="season{{ $season['id'] }}" class="product-item__input-checkbox" value="{{ $season['id'] }}" @foreach ($product['seasons'] as $product_season) @if ($season['id']===$product_season['id']) checked @endif @endforeach>
                    <label for="season{{ $season['id'] }}" class="product-item__checkbox-label">{{ $season['name'] }}</label>
                    @endforeach
                    @if ($errors->has('seasons'))
                    <ul class="product-form__error">
                        @foreach ($errors->get('seasons') as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
        <label class="product-form__description-header">商品説明</label>
        <textarea name="description" class="product-form__description-textarea">{{ $product['description'] }}</textarea>
        @if ($errors->has('description'))
        <ul class="product-form__error">
            @foreach ($errors->get('description') as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <div class="product-form__buttons">
            <a href="/products" class="product-form__button">戻る</a>
            <button type="submit" class="product-form__button product-form__button--orange">変更を保存</button>
        </div>
    </form>
    <form action="/products/{{ $product['id'] }}/delete" method="post" class="delete-form">
        @method('DELETE')
        @csrf
        <button class="delete-form__button">
            <i class="fa-regular fa-trash-can"></i>
        </button>
    </form>
</div>
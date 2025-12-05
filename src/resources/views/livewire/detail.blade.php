<form action="/products/{{ $product['id'] }}/update" class="detail-page__content" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $product['id'] }}">
    <div class="content__product">
        <div class="product-image">
            @if ($product_image)
                <img src="{{ $product_image->temporaryUrl() }}" alt="" class="product-image__img">
            @else
                <img src="{{ asset($product['image']) }}" alt="" class="product-image__img">
            @endif
            <input type="file" wire:model="product_image" accept="image/png,image/jpeg" class="product-image__input">
        </div>
        <div class="product-items">
            <label class="product-item__header">商品名</label>
            <input type="text" class="product-item__input" name="name" value="{{ $product['name'] }}">
            <label class="product-item__header">値段</label>
            <input type="text" class="product-item__input" name="price" value="{{ $product['price'] }}">
            <label class="product-item__header">季節</label>
            @foreach ($seasons as $season)
                <input type="checkbox" name="season{{ $season['id'] }}" id="season{{ $season['id'] }}" class="product-item__input-season" @foreach ($product['seasons'] as $product_season) @if ($season['id'] === $product_season['id']) checked @endif @endforeach>
                <label for="season{{ $season['id'] }}" class="product-item__season-label">{{ $season['name'] }}</label>
            @endforeach
        </div>
    </div>
</form>
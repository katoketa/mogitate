<div class="products-page__items">
    <div class="utilities">
        <form action="/products/search" method="get" class="utilities__search">
            <input type="text" class="search__input" placeholder="商品名で検索">
            <button type="submit" class="search__button">検索</button>
        </form>
        <div class="utilities__sort">
            <h4 class="sort__header">価格順で表示</h4>
            <div class="sort__select">
                <select name="sort" class="sort__select--inner">
                    <option value="" selected hidden>価格で並び替え</option>
                    <option value="1">高い順に表示</option>
                    <option value="2">低い順に表示</option>
                </select>
            </div>
        </div>
    </div>
    <div class="products">
        @foreach ($products as $product)
        <a href="/products/detail/{{ $product['id'] }}" class="product-card">
            <div class="product-card__img">
                <img class="product-card__img-inner" src="{{ asset($product['image']) }}" alt="写真">
            </div>
            <div class="product-card__content">
                <span class="product-card__content-name">{{ $product['name'] }}</span>
                <span class="product-card__content-price">¥{{ $product['price'] }}</span>
            </div>
        </a>
        @endforeach
    </div>
</div>
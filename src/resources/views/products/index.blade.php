@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products/index.css') }}">
@endsection

@section('content')
<div class="products-page">
    <div class="products-page__header">
        <h2 class="products-header__title">商品一覧</h2>
        <a href="/products/register" class="products-header__register">+ 商品を追加</a>
    </div>
    @if (isset($old_data))
    @livewire('products', ['products' => $products->all(), 'sort_status' => $old_data['sort_status'], 'keyword' => $old_data['keyword']])
    @else
    @livewire('products', ['products' => $products->all()])
    @endif
    <div class="products-page__paginate">
        {{ $products->links() }}
    </div>
</div>
@endsection
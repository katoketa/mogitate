@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products/detail.css') }}">
@endsection

@section('content')
<div class="detail-page">
    <a href="/products" class="detail-page__back-index">商品一覧</a>
    >
    <span class="detail-page__name">{{ $product['name'] }}</span>
    @livewire('detail', ['product' => $product, 'seasons' => $seasons->all()])
</div>
@endsection
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products/detail.css') }}">
<script src="https://kit.fontawesome.com/077045ae67.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="detail-page">
    <a href="/products" class="detail-page__back-index">商品一覧</a>
    >
    <span class="detail-page__name">{{ $product['name'] }}</span>
    @livewire('detail', ['product' => $product, 'seasons' => $seasons->all()])
</div>
@endsection
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products/register.css') }}">
@endsection

@section('content')
<div class="register-page">
    <h3 class="register-page__header-title">商品登録</h3>
    @livewire('register', ['seasons' => $seasons->all()])
</div>
@endsection
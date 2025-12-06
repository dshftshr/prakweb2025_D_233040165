@extends('layouts.dashboard')

@section('container')
<div class="flex justify-between items-center pb-4 mb-4 border-b border-gray-200">
    <h1 class="text-2xl font-bold text-gray-800">Selamat datang kembali, {{ auth()->user()->name }}</h1>
</div>
@endsection
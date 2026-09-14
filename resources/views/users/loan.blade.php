@extends('layout.users.app')
@section('title')
    Free Loan
@endsection
@section('main')
    <section class="w-full align-center column g-10px">
        <img src="{{ asset('photos/IMG_1709.png') }}" alt="" class="max-w-300px no-select no-pointer">
   <strong style="font-family:Bricolage;" class="font-size-1-5rem text-align-center font-weight-900">You are not yet qualified for <span class="c-primary">{{ config('app.name') }} Free Loan</span></strong>
    <span class="text-align-center">Refer more users and keep earning to qualify for {{ config('app.name') }} Free Loan</span>
</section>
@endsection
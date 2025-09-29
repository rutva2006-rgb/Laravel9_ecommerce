@extends('layouts.app')
@section('title','Thank You for Shopping')

@section('content')
<style>
    .thank-you-page {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 70vh;
        text-align: center;
        background: white;
        padding: 50px 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .thank-you-page h1 {
        font-size: 3rem;
        color: black;
        margin-bottom: 20px;
        animation: popIn 0.8s ease;
    }

    .thank-you-page p {
        font-size: 1.2rem;
        color: black;
        margin-bottom: 30px;
    }

    .thank-you-page .btn-home {
        background-color: black;
        color: #fff;
        padding: 12px 30px;
        border-radius: 50px;
        text-decoration: none;
        transition: 0.3s;
    }

    .thank-you-page .btn-home:hover {
        background-color: blue;
    }

    @keyframes popIn {
        0% { transform: scale(0.5); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }
</style>

     <div class="thank-you-page">
        <div col-md-12 text-center>
            @if(session('message'))
                <h5 class="alert alert-success">{{ session('message') }}</h5>
            @endif
                <h1>THANK YOU FOR SHOPPING!</h1>
                <p>We appreciate your purchase. Your order is being processed and you will receive a confirmation email shortly.</p>
                <a href="{{ url('/collections') }}" class="btn-home">Continue Shopping</a>
        </div>
    </div>



@endsection

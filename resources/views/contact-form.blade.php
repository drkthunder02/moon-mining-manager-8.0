@extends('layouts.master-public', ['page' => 'contact-form'])

@section('title', 'Contact Form')
@section('body-class', 'contact-form')

@section('content')

    <h1>Contact Form</h1>

    <form action="/contact-form" method="post">
        {{ csrf_field() }}
        <label>
            <textarea name="text" rows="12" maxlength="9000"></textarea>
        </label>
        <br>
        <button>Send</button>
        <small style="float: right; color: grey;">max. length 9,000 characters</small>
    </form>

@endsection

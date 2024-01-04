@extends('layouts.index')

@section('content')
    <center>
        <h1 class="mt-5">
            Contact Form
        </h1>
    </center>
    <div class="row" style="margin-right: 10px">
        <livewire:contact-form />
        <livewire:contact-list />
    </div>
@endsection

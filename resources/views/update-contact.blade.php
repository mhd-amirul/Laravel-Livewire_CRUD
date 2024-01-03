@extends('layouts.index')

@section('content')
    <div class="row" style="margin-right: 10px">
        <livewire:contact-form-update :contact="$contact" />
    </div>
@endsection

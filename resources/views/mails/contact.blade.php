@extends('layouts.index')

@section('content')
<div class="row mt-5">
    <div class="col-4">
        <table class="table table-striped table-hover" style="margin-left: 20px">
            <tbody>
                <tr>
                  <th scope="row">Name</th>
                  <td>{{ $name ?? "" }}</td>
                </tr>
                <tr>
                  <th scope="row">Email</th>
                  <td>{{ $email ?? "" }}</td>
                </tr>
                <tr>
                  <th scope="row">Phone</th>
                  <td>{{ $phone ?? "" }}</td>
                </tr>
                <tr>
                  <th scope="row">Comment</th>
                  <td>{{ $comment ?? "" }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

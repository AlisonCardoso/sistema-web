@extends('layout.header')

@section('content')



<div class="bg-gray py-4">
    <h3>{{ $title }}</h3>
</div>
<div class="container">
    <div class="row d-flex justify-content-center mt-4">
        <div class="col md-10 d-flex justify-content-end">
            <a href="{{route('workshops.index')}}" class="btn btn-dark"> voltar</a>
        </div>
    </div>






                    <table class="table">
                        <thead>
                          <tr>



                            <th scope="col">id</th>
                            <th scope="col">id do Usuario</th>
                            <th scope="col">nome do usario</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>

                          </tr>
                        </thead>
                        <tbody>


                                @foreach ( $customers as $customer )

                                @php
                                    $user= $customer->find($customer->id)->user;
                                @endphp
                                <tr>
                                <th scope="row">{{$customer->id}}</th>
                                <th scope="row">{{$customer->user_id}}</th>
                                <th scope="row">{{$user->name}}</th>
                                <th scope="row">{{$customer->name}}</th>
                                <th scope="row">{{$customer->email}}</th>
                                <th scope="row">
                            </tr>


                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

@endsection

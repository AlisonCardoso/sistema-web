@extends('layout.header')
@section('content')
<div class="container">

    <div class="text-end mb-5">
        <a href="{{ route('users.create') }}" class="btn btn-primary float-end">novo Usuario</a>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="table table-bordered table-striped text-center">
        <table class="table table-hover">
            <thead class="table-dark">
                <th>#</th>
                <th>Nome</th>
                <th>Nivel de Acesso</th>
                <th>Email</th>
                <th>Foto</th>
                <th>Ação</th>
            </thead>
            <tbody>
                @forelse($users as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->acess_level }}</td>

                    <td>{{ $row->email }}</td>
                    <td>
                        <div class="showPhoto">
                            <div id="imagePreview" style="@if ($row->photo != '') background-image:url('{{ url('/') }}/uploads/{{ $row->photo }}')@else background-image: url('{{ url('/img/avatar.png') }}') @endif;">
                            </div>
                        </div>
                    </td>
                    <td>

                        <a class="btn btn-dark" href="{{ route('users.edit', $row->id) }}">{{ __('Editar') }}</a>
                        <button class="btn btn-danger" onClick="deleteFunction('{{ $row->id }}')">{{ __('Delete') }}</button>


                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Sem Usuarios cadastrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection



<style>
    .showPhoto {
        width: 51%;
        height: 54px;
        margin: auto;
    }

    .showPhoto>div {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>

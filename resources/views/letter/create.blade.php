@extends('layouts.template')

@section('content')
    <form action="{{ route('letter.store') }}" method="POST" class="card p-5">
        @csrf

        @if(Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }} </div>
        @endif

        @if ($errors->any())
            <ul class="alert alert-danger">
             @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
             @endforeach
            </ul>
        @endif  
        <div class="mb-3 row">
            <label for="letter_type_id" class="col-sm-2 col-form-label">Nomor Surat:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="letter_type_id" name="letter_type_id" value="{{ old ('letter_type_id')}}">
            </div>
        </div>


        <div class="mb-3 row">
            <label for="letter_perihal" class="col-sm-2 col-form-label">Perihal:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="letter_perihal" name="letter_perihal" value="{{ old ('letter_perihal')}}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="recepients" class="col-sm-2 col-form-label">Penerima surat:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="recepients" name="recepients" value="{{ old ('recepients')}}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="content" class="col-sm-2 col-form-label">Content:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="content" name="content" value="{{ old ('content')}}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="attachment" class="col-sm-2 col-form-label">Lampiran    :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="attachment" name="attachment" value="{{ old ('attachment')}}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="notulis" class="col-sm-2 col-form-label">notulis:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="notulis" name="notulis" value="{{ old ('notulis')}}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
    </form>
@endsection

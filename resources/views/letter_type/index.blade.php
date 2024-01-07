@extends('layouts.template')

@section('content')

    @if(Session::get('success'))
        <div class="alert alert-success"> {{ Session::get('success') }} </div>
    @endif
    @if(Session::get('delete'))
        <div class="alert alert-warning"> {{ Session::get('delete') }} </div>
    @endif

    <a href="{{ route('letter_type.create') }}" class="btn btn-secondary mb-4" style="float: right">Tambah</a>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>               
                <th>Kode Surat</th>
                <th>Klasifikasi Surat</th>
                <th>Surat Tertaut</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($letter_types as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item['letter_code'] }}</td>
                <td>{{ $item['name_type'] }}</td>
                <td>-</td>
                
                <td class="d-flex justify-content-center">

                <a href="#" class="btn btn-primary me-3">Lihat</a>
                    <a href="{{ route('letter_type.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>
                    <form action="{{ route('letter_type.delete', $item['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        <!-- jika data ada atau > 0 -->
        @if($letter_types->count())
        <!-- munculkan tampilan pagination -->
            {{ $letter_types->links() }}
        @endif
    </div>
@endsection

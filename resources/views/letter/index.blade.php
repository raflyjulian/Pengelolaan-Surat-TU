@extends('layouts.template')

@section('content')

    @if(Session::get('success'))
        <div class="alert alert-success"> {{ Session::get('success') }} </div>
    @endif
    @if(Session::get('delete'))
        <div class="alert alert-warning"> {{ Session::get('delete') }} </div>
    @endif

    <a href="{{ route('letter.create') }}" class="btn btn-secondary mb-4" style="float: right">Tambah</a>

    <table class="table table-striped table-sm">

        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Surat</th>
                <th scope="col">Perihal</th>
                <th scope="col">Tanggal Keluar</th>
                <th scope="col">Penerima Surat</th>
                <th scope="col">Notulis</th>
                <th scope="col">Hasil Rapat</th>
                <th scope="col" class="d-flex justify-content-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            
            @php $no = 1; @endphp
            @foreach ($letters as $letter)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $letter->letterType->letter_code }}</td>

                <td>{{ $letter->letter_perihal }}</td>
                <td>{{ date('d F Y', strtotime($letter->created_at)) }}</td>
                <td>
                    @if($letter->recipients)
                    @foreach(json_decode($letter->recipients) as $recipientId)
                    {{ \App\Models\User::find($recipientId)->name }},
                    @endforeach
                    @else
                    Penerima Surat Tidak Ditemukan
                    @endif
                </td>
                <td>{{ $letter->notulisUser ? $letter->notulisUser->name : 'Notulis Tidak Ditemukan' }}</td>

               
                <td>
                    
                    @if ($letter->meeting_result)
                    <span class="btn btn-outline-primary">Sudah Dibuat</span>
                    @else
                    <a href=""
                        class="btn btn-outline-warning">Buat Hasil
                        Rapat</a>
                    @endif
                   
                
                </td>
              

                <td class="d-flex justify-content-center">
                   
                    <a href="{{ route('letter.edit', $letter->id) }}" class="btn btn-primary me-3">Edit</a>
                    <button type="button" class="btn btn-danger delete-button" data-toggle="modal"
                        data-target="#deleteModal" data-id="{{ $letter->id }}">
                        Hapus
                    </button>
                  
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>


</div>
</div>

<!-- Bootstrap Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    {{-- <span aria-hidden="true">&times;</span> --}}
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus Data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
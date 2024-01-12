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
        <div class="mb-3">
            <label for="letter_perihal" class="form-label">Perihal</label>
            <input type="text" class="form-control @error('letter_perihal') is-invalid @enderror" id="letter_perihal"
                name="letter_perihal" required autofocus value="{{ old('letter_perihal') }}">
        </div>


        <div class="mb-3">
            <label for="slug" class="form-label">Klasifikasi Surat :</label>
            <select class="form-select" aria-label="Default select example" name="letter_type_id">
                <option selected>Pilih</option>
                @foreach($letters as $lt)
                <option value="{{ $lt->id }}">{{ $lt->name_type }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
                <label for="content" class="form-label">Isi Surat</label>
                
                <input id="content" type="text" name="content" value="{{ old('content') }}">
                <trix-editor input="content"></trix-editor>

                @section('scripts')
                    <script>
                        document.addEventListener('trix-change', function (e) {
                            var contentValue = e.target.editor.value;
                            document.getElementById('content').value = contentValue;
                        });
                    </script>
                @endsection

        </div>

        {{-- <div class="mb-3">
            <label for="image" class="form-label">Lampiran</label>
            <img src="" class="img-preview img-fluid mb-3" id="frame" style="max-height: 500px; overflow:hidden">
            <input class="form-control " type="file" id="attachment" name="attachment" onchange="preview()">
        </div> --}}

        <div class="mb-3">
            <label for="recipients" class="form-label">Peserta Rapat</label><br>
            
            <!-- <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Dinda" id="recipients"
                    name="recipients[]"> 
                <label class="form-check-label" for="recipients">
                    
                </label>
            </div> -->

            <!-- <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Rafly" id="recipients_rafly"
                    name="recipients[]">
                <label class="form-check-label" for="recipients_rafly">Rafly</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Julian" id="recipients_julian"
                    name="recipients[]">
                <label class="form-check-label" for="recipients_julian">Julian</label>
            </div> -->

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Peserta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Rafly</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="8" id="recipients_rafly"
                                        name="recipients[]">
                                    <label class="form-check-label" for="recipients_rafly"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Julian</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="recipients_julian"
                                        name="recipients[]">
                                    <label class="form-check-label" for="recipients_julian"></label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            
        </div>

        <div class="mb-3">
            <label for="notulis" class="form-label">Notulis</label>
            <select class="form-select" id="notulis" name="notulis" required>
                <option selected>Pilih</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
    </form>
@endsection

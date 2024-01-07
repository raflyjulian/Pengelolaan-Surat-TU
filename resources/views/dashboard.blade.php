@extends('layouts.template')
@section('content')

<body>
    <main class="content px-3 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h4 class="teks">Dashboard</h4>
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="card flex-fill border-0 illustration">
                        <div class="card-body p-0 d-flex flex-fill">
                            <div class="row g-0 w-100">
                                <div class="col-6">
                                    <div class="p-3 m-1">
                                        <h4 class="mb-2">Surat Keluar</h4>
                                        <i class="fa-regular fa-newspaper"></i>
                                        <p class="mb-0">1</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card flex-fill border-0">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                <h4 class="mb-2">Klasifikasi Surat</h4>
                                <i class="fa-regular fa-newspaper"></i>
                                <p class="mb-2">1</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="card flex-fill border-0">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <h4 class="mb-2">Staff Tata Usaha</h4>
                                    <i class="fa-regular fa-newspaper"></i>
                                    <p class="mb-2">1</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card flex-fill border-0 illustration">
                        <div class="card-body p-0 d-flex flex-fill">
                            <div class="row g-0 w-100">
                                <div class="col-6">
                                    <div class="p-3 m-1">
                                        <h4 class="mb-2">Guru</h4>
                                        <i class="fa-regular fa-newspaper"></i>
                                        <p class="mb-0">2</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
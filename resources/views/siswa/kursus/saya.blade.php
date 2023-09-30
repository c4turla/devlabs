@extends('partials.layout')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Kursus Saya</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('siswa.course' )}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Kursus Saya</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<!-- end page title -->
<div class="row">
    <div class="col-xl-12">
        <div class="card border shadow-none">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div>
                            <h5>Kursus Saya</h5>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>Materi</th>
                                        <th>Praktikum</th>
                                        <th>Kuis</th>
                                        <th>Skor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($materiSaya as $materi)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td><a href="{{ route('siswa.materi',$materi->id) }}">{{ $materi->judul
                                                }}</a><br />
                                            <small>{{$materi->kelasid->description }}</small>
                                        </td>
                                        <td>
                                            @if ($materi->praktikumid)
                                            <form method="POST"
                                                action="{{ route('siswa.mulaipraktikum', $materi->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm">Mulai
                                                    Praktikum</button>
                                            </form>
                                            @else
                                            <button class="btn btn-warning btn-sm">Belum Ada Praktikum</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($materi->kuisid)
                                            <form method="POST" action="{{ route('siswa.mulaikuis', $materi->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Kerjakan</button>
                                            </form>
                                            @else
                                            <button class="btn btn-danger btn-sm">Belum Ada Kuis</button>
                                            @endif
                                        </td>
                                        <td> @foreach ($skor as $item)
                                            @if ($item->id_materi === $materi->id)
                                            {{ $item->skor ?? 'N/A' }}
                                            @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br />
                            <nav aria-label="..." class="mb-5">
                                <ul class="pagination pagination-sm mb-0">
                                    <li class="page-item">
                                        {{ $materiSaya->links() }}
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- end row -->
@endsection
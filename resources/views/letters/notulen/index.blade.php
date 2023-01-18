<x-auth title="E Office | Notulen">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="d-flex">
                        <a href="{{ route('notulens.create') }}" class="btn btn-primary ms-2">
                            Tambah Notulen
                        </a>
                    </form>
                </div>
                <h4 class="page-title">Notulen</h4>
            </div>
        </div>
    </div>
    <!-- /Page Title -->

    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="header-title">Notulen</div>
                    <div class="table-responsive">
                        <table class="table table-centered whitespace-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Notulen</th>
                                    <th>Judul Notulen</th>
                                    <th>Pembuat</th>
                                    <th>Rapat</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs">
                                @foreach ($letters as $letter)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $letter->letter_number ?? "Belum Digenerate" }}</td>
                                    <td>{{ $letter->note_title }}</td>
                                    <td>{{ $letter->creator ? $letter->creator->user->name : "Tidak Ada" }}</td>
                                    <td>{{ $letter->meeting->meeting_agenda }}</td>
                                    <td>{{ $letter->date_of_letter }}</td>
                                    <td>{{ $letter->status }}</td>
                                    <td>
                                        <div class="table-action flex justify-center items-center gap-3">
                                            <a href="{{ route('notulens.show', ['id' => $letter->id]) }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                            @role('admin')
                                            <form action="{{ route('notulens.destroy', ['id' => $letter->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action-icon" onclick="return confirm('Yakin ingin menghapus surat ini?')"><i class="mdi mdi-delete"></i></button>
                                            </form>
                                            @endrole
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth>

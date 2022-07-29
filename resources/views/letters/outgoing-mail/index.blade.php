<x-auth title="E Office | Surat Keluar">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="d-flex">
                        <a href="{{ route('outgoing-mails.create') }}" class="btn btn-primary ms-2">
                            Tambah Surat Keluar
                        </a>
                    </form>
                </div>
                <h4 class="page-title">Surat Keluar</h4>
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
                    <div class="header-title">Surat Keluar</div>
                    <div class="table-responsive">
                        <table class="table table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Surat</th>
                                    <th>Asal Surat / Pengirim</th>
                                    <th>Tujuan</th>
                                    <th>Perihal</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Status Surat</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs">
                                @foreach ($letters as $letter)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $letter->letter_number ?? "Belum Digenerate" }}</td>
                                        <td>{{ $letter->creator ? $letter->creator->job->name : "Tidak Ada" }}</td>
                                        <td>{{ $letter->company->name }}</td>
                                        <td>{{ $letter->regarding }}</td>
                                        <td>{{ $letter->date_of_letter }}</td>
                                        <td>{{ $letter->status }}</td>
                                        <td>
                                            <div class="table-action flex justify-center items-center gap-3">
                                                <a href="{{ route('outgoing-mails.show', ['id' => $letter->id]) }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                <form action="{{ route('outgoing-mails.destroy', ['id' => $letter->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-icon" onclick="return confirm('Yakin ingin menghapus surat ini?')"><i class="mdi mdi-delete"></i></button>
                                                </form>
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

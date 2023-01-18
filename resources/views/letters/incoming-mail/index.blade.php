<x-auth title="E Office | Surat Masuk">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="d-flex">
                        <a href="{{ route('incoming-mails.create') }}" class="btn btn-primary ms-2">
                            Tambah Surat Masuk
                        </a>
                    </form>
                </div>
                <h4 class="page-title">Surat Masuk</h4>
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
                    <div class="header-title">Surat Masuk</div>
                    <div class="table-responsive">
                        <table class="table table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Surat</th>
                                    <th>Asal Surat / Pengirim</th>
                                    <th>Perihal</th>
                                    <th>Tanggal Surat</th>
                                    <th>Tanggal Masuk</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs">
                                @foreach ($letters as $letter)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $letter->letter_number }}</td>
                                    <td>{{ $letter->sender_name }}</td>
                                    <td>{{ $letter->regarding }}</td>
                                    <td>{{ $letter->date_of_letter }}</td>
                                    <td>{{ $letter->date_of_entry }}</td>
                                    <td>
                                        <div class="table-action flex justify-center items-center gap-3">
                                            <a href="{{ route('incoming-mails.show', ['id' => $letter->id]) }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                            @role('admin')
                                            <form action="{{ route('incoming-mails.destroy', ['id' => $letter->id]) }}" method="POST">
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

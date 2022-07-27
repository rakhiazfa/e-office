<x-auth title="E Office | Data Jabatan">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="d-flex">
                        <a href="{{ route('jobs.create') }}" class="btn btn-primary ms-2">
                            Tambah Data Jabatan
                        </a>
                    </form>
                </div>
                <h4 class="page-title">Data Jabatan</h4>
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
        @foreach ($jobLevels as $jobLevel)
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="header-title">{{ $jobLevel->name }}</div>
                        <div class="table-responsive">
                            <table class="table table-centered whitespace-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Jabatan</th>
                                        @if ($jobLevel->parent)
                                            <td>{{ $jobLevel->parent->name }}</td>
                                        @endif
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobLevel->jobs as $job)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $job->name }}</td>
                                            @if ($job->parent)
                                                <td>{{ $job->parent->name }}</td>
                                            @endif
                                            <td class="table-action flex justify-center items-center gap-3">
                                                <a href="{{ route('jobs.edit', ['id' => $job->id]) }}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                                <form action="{{ route('jobs.destroy', ['id' => $job->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-icon" onclick="return confirm('Yakin ingin menghapus jabatan ini?')"><i class="mdi mdi-delete"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-auth>

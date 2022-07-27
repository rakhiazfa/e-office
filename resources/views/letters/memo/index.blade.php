<x-auth title="E Office | E-Memo">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="d-flex">
                        <a href="{{ route('memos.create') }}" class="btn btn-primary ms-2">
                            Tambah E-Memo
                        </a>
                    </form>
                </div>
                <h4 class="page-title">E-Memo</h4>
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
                    <div class="header-title">E-Memo</div>
                    <div class="table-responsive">
                        <table class="table table-centered whitespace-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Memo</th>
                                    <th>Pengirim</th>
                                    <th>Tujuan</th>
                                    <th>Perihal</th>
                                    <th>Tanggal</th>
                                    <th>Status Memo</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth>

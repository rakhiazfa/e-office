<x-auth title="E Office | Tambah Surat Keluar">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Tambah Surat Keluar</h4>
            </div>
        </div>
    </div>
    <!-- /Page Title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('outgoing-mails.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div>
                                <select type="text" class="field" name="letter_type">
                                    <option selected disabled>Pilih Jenis Surat</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="button bg-blue-500 text-white">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-auth>

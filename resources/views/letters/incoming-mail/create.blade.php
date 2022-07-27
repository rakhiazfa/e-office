<x-auth title="E Office | Tambah Surat Masuk">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Tambah Surat Masuk</h4>
            </div>
        </div>
    </div>
    <!-- /Page Title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('incoming-mails.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="text-xs ml-1">Jenis Surat</label>
                                <select type="text" class="field" name="letter_type">
                                    <option selected disabled>Pilih Jenis Surat</option>
                                    @foreach ($letterTypes as $letterType)
                                        <option value="{{ $letterType->id }}">{{ $letterType->name }}</option>
                                    @endforeach
                                </select>
                                @error('letter_type')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-xs ml-1">Nama Pengirim</label>
                                <input type="text" class="field" name="sender_name" placeholder="Masukan nama pengirim">
                                @error('sender_name')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-xs ml-1">Perihal</label>
                                <input type="text" class="field" name="regarding" placeholder="Masukan perihal surat">
                                @error('regarding')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-xs ml-1">Nomor Surat</label>
                                <input type="text" class="field" name="letter_number" placeholder="Masukan nomor surat">
                                @error('letter_number')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-xs ml-1">Tanggal Surat</label>
                                <input type="date" class="field" name="date_of_letter" placeholder="Masukan tanggal surat">
                                @error('date_of_letter')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-xs ml-1">Tanggal Masuk</label>
                                <input type="date" class="field" name="date_of_entry" placeholder="Masukan tanggal masuk">
                                @error('date_of_entry')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-xs ml-1">Tujuan</label>
                                <select type="text" class="field" name="destination">
                                    <option selected disabled>Pilih Tujuan Surat</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->job->name }} | {{ $employee->user->name }}</option>
                                    @endforeach
                                </select>
                                @error('destination')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-xs ml-1">Pegawai ( CC )</label>
                                <select type="text" class="field" name="copy">
                                    <option selected disabled>Pilih Pegawai ( CC )</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->user->name }}</option>
                                    @endforeach
                                </select>
                                @error('copy')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label class="text-xs ml-1">File Attachment</label>
                                <input type="file" class="form-control" name="attachment">
                                @error('attachment')
                                    <p class="invalid">{{ $message }}</p>
                                @enderror
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

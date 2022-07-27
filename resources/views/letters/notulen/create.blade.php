<x-auth title="E Office | Tambah Notulen">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Tambah Notulen</h4>
            </div>
        </div>
    </div>
    <!-- /Page Title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('notulens.store') }}" method="POST">
                        @csrf
                        
                        <div class="flex justify-end">
                            <button type="submit" class="button bg-blue-500 text-white">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-auth>

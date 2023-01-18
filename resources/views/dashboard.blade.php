<x-auth title="E Office | Dashboard">

    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- /Page Title -->

    <div class="row">

        @foreach ($letterCategories as $letterCategory)

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="header-title text-center">{{ $letterCategory->name }}</div>
                    <p class="text-3xl text-center font-semibold">{{ count($letterCategory->letters) }}</p>
                </div>
            </div>
        </div>

        @endforeach

    </div>

</x-auth>

<x-app-layout title="Stok Barang">
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Stok Barang detail start-->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Edit Stok Barang</h5>
                                </div>
                                <div class="card-body">
                                    <form class="theme-form mega-form" id="form_input" method="POST"
                                        action="{{ route('admin.stokbarang.update', $stokBarang->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Barang</label>
                                                    <input class="form-control" type="text" placeholder="Nama Barang"
                                                        name="title" value="{{ $stokBarang->title }}" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Kode Barang</label>
                                                    <input type="text" name="kode_barang"
                                                        value="{{ $stokBarang->kode_barang }}" class="form-control"
                                                        placeholder="Masukkan Kode Barang">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Stok</label>
                                                    <input type="number" name="stock" value="{{ $stokBarang->stok }}"
                                                        class="form-control" placeholder="Masukkan Stok">
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button class="btn btn-primary" type="submit">Update Stok
                                                    Barang</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary me-3" type="submit">Edit</button>
                                    <button class="btn btn-outline-primary" type="button">Cancel</button>
                                </div>
                            </div>
                            <!-- Stok Barang detail end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>

    @section('custom_js')
        <script src="{{ asset('js/FormControls.js') }}"></script>
        <script>
            const btnSubmit = document.querySelector('button[type="submit"]');
            const formEl = $('#form_input');
            btnSubmit.addEventListener('click', function(e) {
                e.preventDefault();
                KTFormControls.onSubmitForm(formEl);
            });
        </script>
    @endsection
</x-app-layout>

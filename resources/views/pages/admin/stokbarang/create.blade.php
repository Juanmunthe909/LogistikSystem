<x-app-layout title="Data Stok Barang">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Stok Barang</h4>
        </div>
    </div>
    <form id="form_input" method="POST" action="{{ route('admin.stokbarang.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Nama Barang</label>
                    <input type="text" name="title" class="form-control" placeholder="Masukkan Nama Barang"
                        required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control" placeholder="Masukkan Kode Barang"
                        required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Stok</label>
                    <input type="number" name="stock" class="form-control" placeholder="Masukkan Jumlah Stok"
                        required>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Tambah Stok Barang</button>
            </div>
        </div>
    </form>
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

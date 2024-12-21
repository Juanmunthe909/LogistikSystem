<x-app-layout title="Data Produk">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Produk</h4>
        </div>
    </div>
    <form id="form_input" method="POST" action="{{ route('admin.barangmasuk.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="" class="form-label">Nama Barang</label>
                    <input type="text" name="title" class="form-control" placeholder="Masukkan Nama Product">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control" placeholder="Masukkan Kode Barang">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Barang</label>
                    <input type="number" name="quantity" class="form-control" placeholder="Masukkan Jumlah Barang">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tujuan</label>
                    <input type="text" name="destination" class="form-control" placeholder="Masukkan Tujuan">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control">
                </div>
                {{-- <div class="mb-3">
                    <label class="form-label">Cover</label>
                    <input type="file" name="cover" class="form-control">
                </div> --}}
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Tambah Barang Masuk</button>
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

<x-app-layout title="barangmasuk">
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <!--Hotel detail start-->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Edit Restaurant</h5>
                                </div>
                                <div class="card-body">form class="theme-form mega-form"
                                    <form class="theme-form mega-form" id="form_input" method="POST"
                                        action="{{ route('admin.barangmasuk.update', $barangmasuk->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label-title">Nama Barang</label>
                                                    <input class="form-control" type="text" placeholder="Hotal Name"
                                                        name="title" value="{{ $barnagKeluar->title }}" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Kode Barang</label>
                                                    <input type="text" name="kode_barang"
                                                        value="{{ $barangmasuk->kode_barang }}" class="form-control"
                                                        placeholder="Masukkan Kode Barang">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Jumlah Barang</label>
                                                    <input type="number" name="quantity"
                                                        value="{{ $barangmasuk->quantity }}" class="form-control"
                                                        placeholder="Masukkan Jumlah Barang">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tujuan</label>
                                                    <input type="text" name="destination"
                                                        value="{{ $barangmasuk->destination }}" class="form-control"
                                                        placeholder="Masukkan Tujuan">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tanggal Keluar</label>
                                                    <input type="date" name="tanggal_keluar"
                                                        value="{{ $barangmasuk->tanggal_keluar }}" class="form-control">
                                                </div>
                                                {{-- <div class="mb-3">
                                                    <label class="form-label">Cover</label>
                                                    <input type="file" name="cover" class="form-control">
                                                    <img src="{{ asset('images/barangmasuk/' . $barangmasuk->cover) }}"
                                                        alt="Cover" width="100">
                                                </div> --}}
                                            </div>
                                            <div class="card-footer">
                                                <button class="btn btn-primary" type="submit">Update Barang
                                                    Keluar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary me-3" type="submit">Edit</button>
                                    <button class="btn btn-outline-primary" type="button">Cancel</button>
                                </div>
                            </div>
                            <!--Hotel detail end-->
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

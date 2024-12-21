<div class="card-body">
    <div>
        <div class="table-responsive table-card mb-1">
            <table class="table align-middle">
                <thead class="table-light text-muted">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kode Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Tujuan</th>
                        <th>Tanggal Keluar</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangKeluar as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->kode_barang }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->destination }}</td>
                            <td>{{ $item->tanggal_keluar }}</td>
                            {{-- <td><img src="{{ asset('images/barangkeluar/' . $item->cover) }}" alt="Cover"
                                    width="100"></td> --}}
                            <td>
                                <ul class="list-inline hstack gap-2 mb-0">

                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        data-bs-placement="top" title="" data-bs-original-title="Remove">
                                        <a href="javascript:;"
                                            onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','DELETE','{{ route('admin.barangkeluar.destroy', $item->id) }}');"
                                            class="text-danger d-inline-block remove-item-btn">
                                            <i class="ri-delete-bin-5-fill fs-16"></i>
                                        </a>
                                    </li>
                                </ul>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{ $barangKeluar->links('theme.app.pagination') }}

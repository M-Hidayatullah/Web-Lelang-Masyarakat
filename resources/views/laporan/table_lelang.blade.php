<table id="dataTable" class="table table-bordered" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga Awal</th>
                        <th>Harga Akhir</th>
                        <th>Pemenang</th>
                        <th>Penginput</th>
                        <th>Tanggal Lelang</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lelang as $i => $u)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$u->nama_barang}}</td>
                        <td>{{$u->harga_awal}}</td>
                        <td>{{$u->harga_akhir}}</td>
                        <td>{{$u->nama_lengkap }}</td>
                        <td>{{$u->nama_petugas}}</td>
                        <td>{{$u->tgl_lelang}}</td>
                        <td>{{$u->status}}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
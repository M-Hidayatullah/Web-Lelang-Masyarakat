<table class="table table-bordered"  id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Pelelang</th>
                    <th>No Telp</th>
                    <th>Harga Penawaran</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($history_lelang as $i => $u)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$u->nama_barang}}</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->telp}}</td>
                    <td>{{$u->penawaran_harga}}</td>
                    <td>{{$u->status_lelang}}</td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
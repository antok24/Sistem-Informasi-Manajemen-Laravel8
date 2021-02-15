<div>
    <div class="card border-light shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0">Masa</th>
                            <th class="border-0">Nim</th>
                            <th class="border-0">Nama Mahasiswa</th>
                            <th class="border-0">Program Studi</th>
                            <th class="border-0">Mr Awal</th>
                            <th class="border-0">Mr Akhir</th>
                            <th class="border-0">Options</th>
                        </tr>
                    </thead>
                    <tbody class="text-info">
                        @foreach ($mahasiswas as $mahasiswa)
                        <tr>
                            <td class="border-0">          
                                {{ $mahasiswa->masa }}
                            </td>
                            <td class="border-0">
                                {{ $mahasiswa->nim }}
                            </td>
                            <td class="border-0">
                                {{ $mahasiswa->nama_mahasiswa  }}
                            </td>
                            <td class="border-0">
                               {{ $mahasiswa->program_studi }}
                            </td>
                            <td class="border-0">
                               {{ $mahasiswa->mr_awal }}  
                            </td>
                            <td class="border-0">
                                {{ $mahasiswa->mr_akhir }}
                            </td>
                            <td class="border-0">
                                edit|cetak
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

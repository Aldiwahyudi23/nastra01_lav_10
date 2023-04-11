 <thead>
     <tr class="bg-light">
         <th>Nama</th>
         <th>Kas</th>
         @if (Auth::user()->role == "Admin" || Auth::user()->role == "Bendahara" || Auth::user()->role == "Sekertaris")
         <th>Tabungan</th>
         @endif
     </tr>
 </thead>
 <tbody>
     <?php

        use Illuminate\Support\Facades\DB;

        $no = 0; ?>
     @foreach($data_anggota as $anggota)
     <?php $no++; ?>
     <tr>
         <td>{{$anggota->name}}</td>
         <?php
            $id = $anggota->id;

            $setor = DB::table('pemasukans')->where('pemasukans.kategori', '=', "Kas");
            $total_setor = $setor->where('pemasukans.anggota_id', '=', $id)
                ->sum('pemasukans.jumlah');

            $tabungan = DB::table('pemasukans')->where('pemasukans.kategori', '=', "Tabungan");
            $total_tabungan = $tabungan->where('pemasukans.anggota_id', '=', $id)
                ->sum('pemasukans.jumlah');

            $jumlah = $total_setor;
            $jumlah_tabungan = $total_tabungan;
            ?>
         <td> <a href="{{route('detail.anggota.kas',Crypt::encrypt($anggota->id))}}"> {{ "Rp " . number_format( $jumlah,2,',','.') }} </a></td>
         @if (Auth::user()->role == "Admin" || Auth::user()->role == "Bendahara" || Auth::user()->role == "Sekertaris")
         <td><a href="{{route('detail.anggota.tabungan',Crypt::encrypt($anggota->id))}}">{{ "Rp " . number_format( $jumlah_tabungan,2,',','.') }} </a></td>
         @endif
     </tr>

     @endforeach
 </tbody>
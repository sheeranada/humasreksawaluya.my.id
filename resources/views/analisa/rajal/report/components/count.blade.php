{{round
(    // farmasi 4 0
((($px->kecepatan == 'lama' ? 0 : 1) +
($px->sikap_petugas == 'Tidak Baik' ? 0 : 1) +
($px->penjelasan_obat == 'Tidak Jelas' ? 0 : 1)+
($px->pelayanan_farmasi == 'Tidak Puas' ? 0 : 1)+
// administrasi 2 6
($px->pendaftaran == 'Tidak Puas' ? 0 : 1)+
($px->kasir == 'Tidak Puas' ? 0 : 1)+
// pelayanan 2 8
($px->kecepatan_pelayanan == 'Tidak Puas' ? 0 : 1)+
($px->kemudahan == 'Tidak Puas' ? 0 : 1)+
// ruang tunggu 2 10
($px->kenyamanan == 'Tidak Puas' ? 0 : 1)+
($px->kebersihan == 'Tidak Puas' ? 0 : 1)+
// sarpras 3 13
($px->sarana == 'tidak puas' ? 0 : 1)+
($px->prasarana == 'tidak puas' ? 0 : 1)+
($px->fasilitas_lain == 'tidak puas' ? 0 : 1 )+
// sdm 6 19
($px->parkir == 'Tidak Puas' ? 0 : 1)+
($px->security == 'Tidak Puas' ? 0 : 1)+
($px->dokter == 'Tidak Puas' ? 0 : 1)+
($px->perawat == 'Tidak Puas' ? 0 : 1)+
($px->radiologi == 'Tidak Puas' ? 0 : 1)+
($px->laboratorium == 'Tidak Puas' ? 0 : 1 )
)/19)*100),2
}}


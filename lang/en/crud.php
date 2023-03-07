<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'user' => [
        'name' => 'User',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],

    'administrasi' => [
        'name' => 'Administrasi',
        'index_title' => 'Administrasi List',
        'new_title' => 'New Administrasi',
        'create_title' => 'Create Administrasi',
        'edit_title' => 'Edit Administrasi',
        'show_title' => 'Show Administrasi',
        'inputs' => [
            'px_rajal_id' => 'Px Rajal',
            'pendaftaran' => 'Pendaftaran',
            'kasir' => 'Kasir',
        ],
    ],

    'farmasi' => [
        'name' => 'Farmasi',
        'index_title' => 'Farmasi List',
        'new_title' => 'New Farmasi',
        'create_title' => 'Create Farmasi',
        'edit_title' => 'Edit Farmasi',
        'show_title' => 'Show Farmasi',
        'inputs' => [
            'px_rajal_id' => 'Px Rajal',
            'kecepatan' => 'Kecepatan',
            'sikap_petugas' => 'Sikap Petugas',
            'penjelasan_obat' => 'Penjelasan Obat',
            'pelayanan_farmasi' => 'Pelayanan Farmasi',
        ],
    ],

    'pelayanan' => [
        'name' => 'Pelayanan',
        'index_title' => 'Pelayanan List',
        'new_title' => 'New Pelayanan',
        'create_title' => 'Create Pelayanan',
        'edit_title' => 'Edit Pelayanan',
        'show_title' => 'Show Pelayanan',
        'inputs' => [
            'px_rajal_id' => 'Px Rajal',
            'kecepatan' => 'Kecepatan',
            'kemudahan' => 'Kemudahan',
            'pelayanan_yang_perlu_dibenahi' => 'Pelayanan Yang Perlu Dibenahi',
        ],
    ],

    'px_rajal' => [
        'name' => 'Px Rajal',
        'index_title' => 'PxRajal List',
        'new_title' => 'New Px rajal',
        'create_title' => 'Create PxRajal',
        'edit_title' => 'Edit PxRajal',
        'show_title' => 'Show PxRajal',
        'inputs' => [
            'no_upf' => 'No Upf',
            'no_rm' => 'No Rm',
            'nama_pasien' => 'Nama Pasien',
            'klinik' => 'Klinik',
            'penjamin' => 'Penjamin',
            'no_hp' => 'No Hp',
            'tgl_daftar' => 'Tgl Daftar',
            'kategori_pasien' => 'Kategori Pasien',
        ],
    ],

    'ruang_tunggu' => [
        'name' => 'Ruang Tunggu',
        'index_title' => 'RuangTunggu List',
        'new_title' => 'New Ruang tunggu',
        'create_title' => 'Create RuangTunggu',
        'edit_title' => 'Edit RuangTunggu',
        'show_title' => 'Show RuangTunggu',
        'inputs' => [
            'px_rajal_id' => 'Px Rajal',
            'kenyamanan' => 'Kenyamanan',
            'kebersihan' => 'Kebersihan',
            'saran_kritik' => 'Saran Kritik',
        ],
    ],

    'sarpras' => [
        'name' => 'Sarpras',
        'index_title' => 'Sarpras List',
        'new_title' => 'New Sarpras',
        'create_title' => 'Create Sarpras',
        'edit_title' => 'Edit Sarpras',
        'show_title' => 'Show Sarpras',
        'inputs' => [
            'px_rajal_id' => 'Px Rajal',
            'sarana' => 'Sarana',
            'prasarana' => 'Prasarana',
            'fasilitas_lain' => 'Fasilitas Lain',
        ],
    ],

    'sdm' => [
        'name' => 'Sdm',
        'index_title' => 'Sdm List',
        'new_title' => 'New Sdm',
        'create_title' => 'Create Sdm',
        'edit_title' => 'Edit Sdm',
        'show_title' => 'Show Sdm',
        'inputs' => [
            'px_rajal_id' => 'Px Rajal',
            'parkir' => 'Parkir',
            'security' => 'Security',
            'dokter' => 'Dokter',
            'perawat' => 'Perawat',
            'radiologi' => 'Radiologi',
            'laboratorium' => 'Laboratorium',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];

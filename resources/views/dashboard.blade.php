<x-app-layout>
<x-slot name="header">
    <div>
        <h1 class="text-2xl font-bold text-white mt-2">Selamat Datang di Aplikasi Manajemen Data Sekolah</h1>
    </div>
    </x-slot>
    <div class="bg-[#3A3434] py-10 px-4 min-h-screen text-white">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Kolom Kiri --}}
            <div class="md:col-span-2 space-y-6">

                {{-- Statistik Guru --}}
                <div class="bg-[#D9D9D9] text-black rounded-2xl p-6 shadow-inner">
                    <h2 class="text-xl font-bold mb-4">Statistik Guru</h2>
                    <ul class="list-disc list-inside space-y-1">
                        <li>Total Guru: {{ $jumlahGuru }}</li>
                        @foreach ($guruPerGender as $data)
                            <li>{{ $data->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}: {{ $data->total }}</li>
                        @endforeach
                        @foreach ($guruPerStatus as $data)
                            <li>{{ $data->status_kepegawaian == 'PNS' ? 'PNS' : 'Non-PNS'}}: {{ $data->total }}</li>
                        @endforeach
                    </ul>
                    <div class="mt-6">
                        <canvas id="guruGenderChart" class="mb-4"></canvas>
                        <canvas id="guruMapelChart" class="mb-4"></canvas>
                        <canvas id="guruStatusChart"></canvas>
                    </div>
                </div>

                {{-- Statistik Siswa --}}
                <div class="bg-[#D9D9D9] text-black rounded-2xl p-6 shadow-inner">
                    <h2 class="text-xl font-bold mb-4">Statistik Siswa</h2>
                    <ul class="list-disc list-inside space-y-1">
                        <li>Total Siswa: {{ $jumlahSiswa }}</li>
                        @foreach ($siswaPerGender as $data)
                            <li>{{ $data->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}: {{ $data->total }}</li>
                        @endforeach
                        @foreach ($siswaPerKelas as $data)
                            <li>Kelas {{ substr($data->kelas, 0, 2) }}: {{ $data->total }}</li>
                        @endforeach
                    </ul>
                    <div class="mt-6">
                        <canvas id="siswaKelasChart" class="mb-4"></canvas>
                        <canvas id="siswaGenderChart"></canvas>
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan --}}
            <div class="space-y-6">
                <div class="bg-[#D9D9D9] text-black p-6 rounded-2xl">
                    <div>
                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'guru')
                        <a href="{{ route('guru.index') }}" class="btn btn-secondary btn-sm">Lihat Daftar Guru & Karyawan</a>
                    @endif
                    
                    <a href="{{ route('siswa.index') }}" class="btn btn-secondary btn-sm">Lihat Daftar Siswa</a>
                    </div>
                    <div>
                    <h2 class="text-lg font-semibold mt-3 mb-3">Berikut adalah fitur yang tersedia sesuai akun anda</h2>
                    </div>
                    <ul class="list-disc list-inside space-y-1 text-sm">
                        @if (Auth::user()->role == 'admin')
                            <li>Kelola Data Guru</li>
                            <li>Kelola Data Siswa</li>
                        @elseif (Auth::user()->role == 'guru')
                            <li>Lihat Daftar Guru</li>
                            <li>Lihat Daftar Siswa</li>
                            <li>Lihat Data Pribadi</li>
                            <li>Edit Data Pribadi</li>
                        @else
                            <li>Lihat Daftar Siswa</li>
                            <li>Lihat Data Pribadi</li>
                        @endif
                </div>

                <div class="bg-[#D9D9D9] text-black p-6 rounded-2xl">
                    <h2 class="text-lg font-semibold mb-3">ToDoList</h2>
                    <ul class="list-disc list-inside space-y-1 text-sm">
                        <li>Perbarui data guru terbaru</li>
                        <li>Pastikan data siswa sudah sesuai</li>
                        <li>Backup data setiap minggu</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data PHP ke JS
    const guruGenderData = @json($guruPerGender);
    const guruMapelData = @json($guruPerMapel);
    const guruStatusData = @json($guruPerStatus);
    const siswaGenderData = @json($siswaPerGender);
    const siswaKelasData = @json($siswaPerKelas);

    // Guru - Gender Chart
    new Chart(document.getElementById('guruGenderChart'), {
        type: 'bar',
        data: {
            labels: guruGenderData.map(g => g.jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan'),
            datasets: [{
                label: 'Jumlah Guru',
                data: guruGenderData.map(g => g.total),
                backgroundColor: ['#10b981', '#22d3ee'],
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Statistik Guru Berdasarkan Gender'
                },
                legend: { display: false }
            }
        }
    });

    // Guru - Mapel Chart
    new Chart(document.getElementById('guruMapelChart'), {
        type: 'bar',
        data: {
            labels: guruMapelData.map(m => m.mapel),
            datasets: [{
                label: 'Jumlah Guru per Mapel',
                data: guruMapelData.map(m => m.total),
                backgroundColor: '#6366f1',
                borderRadius: 6
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Jumlah Guru per Mata Pelajaran'
                },
                legend: { display: false }
            }
        }
    });

    // Guru - Status Chart
    new Chart(document.getElementById('guruStatusChart'), {
        type: 'bar',
        data: {
            labels: guruStatusData.map(g => g.status_kepegawaian === 'PNS' ? 'PNS' : 'Non-PNS'),
            datasets: [{
                label: 'Status Kepegawaian Guru',
                data: guruStatusData.map(g => g.total),
                backgroundColor: ['#10b981', '#22d3ee'],
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Status Kepegawaian Guru'
                },
                legend: { display: false }
            }
        }
    });


    // Siswa - Kelas Chart
    new Chart(document.getElementById('siswaKelasChart'), {
        type: 'doughnut',
        data: {
            labels: siswaKelasData.map(k => 'Kelas ' + k.kelas.substring(0, 2)),
            datasets: [{
                label: 'Jumlah Siswa',
                data: siswaKelasData.map(k => k.total),
                backgroundColor: ['#fbbf24', '#3b82f6', '#a78bfa'],
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Distribusi Siswa per Kelas'
                }
            }
        }
    });

    // Siswa - Gender Chart
    new Chart(document.getElementById('siswaGenderChart'), {
        type: 'pie',
        data: {
            labels: siswaGenderData.map(s => s.jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan'),
            datasets: [{
                data: siswaGenderData.map(s => s.total),
                backgroundColor: ['#34d399', '#818cf8'],
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Distribusi Siswa Berdasarkan Gender'
                }
            }
        }
    });
</script>

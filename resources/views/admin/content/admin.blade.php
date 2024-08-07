@extends('admin.main')

@section('Title', 'Dashboard Admin')

@section('content')
<div class="main-content p-4">
    <div class="dashboard-header text-center mb-8">
        <h2 class="text-2xl font-bold">Selamat datang Admin</h2>
    </div>
    <div class="flex justify-around">
        <div class="bg-yellow-400 text-white p-6 rounded-lg shadow-lg w-1/4">
            <div class="text-center">
                <h2 class="text-4xl font-bold">{{ $totalantrian }}</h2>
                <p class="text-lg mt-2">Management Lowongan</p>
                <a href="{{ route('antrian') }}" class="inline-block mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="bg-blue-400 text-white p-6 rounded-lg shadow-lg w-1/4">
            <div class="text-center">
                <h2 class="text-4xl font-bold">{{ $totalperusahaan }}</h2>
                <p class="text-lg mt-2">Daftar Perusahaan</p>
                <a href="{{ route('daftarperusahaan') }}" class="inline-block mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="bg-gray-400 text-white p-6 rounded-lg shadow-lg w-1/4">
            <div class="text-center">
                <h2 class="text-4xl font-bold">{{ $totalwisatawan }}</h2>
                <p class="text-lg mt-2">Daftar Wisatawan</p>
                <a href="{{ route('daftarwisatawan') }}" class="inline-block mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection

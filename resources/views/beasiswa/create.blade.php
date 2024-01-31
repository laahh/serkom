@extends('components.app')

@section('content')

{{-- <div class="mt-10">
    <hr class="border border-gray-700 shadow rounded  border-spacing-2 h-2 items-center mx-32">
</div> --}}

<h1 class="text-center mt-20 mb-5 self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Daftar Beasiswa
</h1>
<div class="flex items-center justify-center">




    <div
        class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-6" action="{{ route('beasiswa.store') }}" method="POST" enctype="multipart/form-data"
            id="beasiswaForm">
            @csrf
            <div>
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan
                    Nama</label>
                <input type="text" name="nama" id="nama"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Masukan Nama " required>
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukan
                    Email</label>
                <input type="email" name="email" id="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="mail@mail.com" required>
            </div>
            <div>
                <label for="nomor_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                    HP</label>
                <input type="text" name="nomor_hp" id="nomor_hp"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="" required>
            </div>

            <div>

                <label for="semester" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semester
                    Saat Ini</label>
                <select id="semester" name="semester"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Semester</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>

            </div>

            <div>
                <label for="ipk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">IPK</label>
                <input readonly type="text" name="ipk" id="ipk" value="{{ old('ipk', $defaultIPK) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="" required>
            </div>
            <div>

                <label for="jenis_beasiswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                    Beasiswa</label>
                <select id="jenis_beasiswa" name="jenis_beasiswa"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Pilih Beasiwa</option>
                    <option value="Beasiswa Paragon">Beasiswa Paragon</option>
                    <option value="Beasiswa Unggulan ">Beasiswa Unggulan </option>

                </select>

            </div>
            <div>

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                    Berkas Syarat</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="file_input" name="file_input" type="file">

            </div>



            <div class="flex justify-between">
                <div>
                    <button type="submit" onclick="swal('Good job!', 'Pendaftaran Telah Berhasil!', 'success')"
                        id="buttonSubmit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Daftar</button>
                </div>
                <div>
                    <button type="button"
                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-10 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Batal</button>
                </div>
            </div>


        </form>
    </div>

</div>





<script>
    //  IPK didapat dari sistem
    const IPK = {{ $defaultIPK }}; 
    
    function checkIPK() {
        var isEligible = IPK >= 3;
    
        document.getElementById('jenis_beasiswa').disabled = !isEligible;
        document.getElementById('file_input').disabled = !isEligible;
        document.getElementById('buttonSubmit').disabled = !isEligible;
    }
    
    // Memanggil fungsi checkIPK saat halaman dimuat
    document.addEventListener('DOMContentLoaded', (event) => {
        checkIPK();
    });
</script>



<script>
    document.getElementById('beasiswaForm').addEventListener('submit', function(e) {
        e.preventDefault(); 
    
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Periksa kembali data yang Anda masukkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, submit!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit(); // Submit form jika pengguna mengkonfirmasi
            }
        })
    });
</script>






@endsection
@extends('components.app')

@section('content')


<div class="items-center justify-center">
  <div class=" mx-10 mt-5 overflow-x-auto relative shadow-md sm:rounded-lg">


    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="py-3 px-6">
            Nama
          </th>
          <th scope="col" class="py-3 px-6">
            Ipk
          </th>
          <th scope="col" class="py-3 px-6">
            Semester
          </th>
          <th scope="col" class="py-3 px-6">
            Status
          </th>
          <th scope="col" class="py-3 px-6">
            Action
          </th>
        </tr>
      </thead>
      <tbody>




        @foreach($pendaftaran as $beasiswa)



        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
          <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $beasiswa->nama }}
          </th>
          <td class="py-4 px-6">
            {{ $beasiswa->ipk }}
          </td>
          <td class="py-4 px-6">
            {{ $beasiswa->semester }}
          </td>
          <td class="py-4 px-6">
            {{ $beasiswa->status }}
          </td>
          <td class="py-4 px-6">
            <div class="flex">
              <a href="">
                <span class="">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                    <path fill="#1f1717"
                      d="M.2 10a11 11 0 0 1 19.6 0A11 11 0 0 1 .2 10m9.8 4a4 4 0 1 0 0-8a4 4 0 0 0 0 8m0-2a2 2 0 1 1 0-4a2 2 0 0 1 0 4" />
                  </svg>

                </span>

              </a>

              <a href="" class="mx-2">
                <span class="">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <g fill="none" stroke="#1f1717" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                      <path stroke-dasharray="20" stroke-dashoffset="20" d="M3 21H21">
                        <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="20;0" />
                      </path>
                      <path stroke-dasharray="44" stroke-dashoffset="44" d="M7 17V13L17 3L21 7L11 17H7">
                        <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.4s" dur="0.6s"
                          values="44;0" />
                      </path>
                      <path stroke-dasharray="8" stroke-dashoffset="8" d="M14 6L18 10">
                        <animate fill="freeze" attributeName="stroke-dashoffset" begin="1s" dur="0.2s" values="8;0" />
                      </path>
                    </g>
                  </svg>

                </span>

              </a>

              <form action="" method="POST">
                @method('delete')
                @csrf


                <button id="delete" type="button" onclick=""><span class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                      <path fill="#b31312" d="M19 4h-3.5l-1-1h-5l-1 1H5v2h14M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6z" />
                    </svg>

                  </span></button>
              </form>

              {{-- <a href="admin-artikel/{{ $post->id }}">


              </a> --}}

            </div>



          </td>
        </tr>
        @endforeach



      </tbody>


    </table>

  </div>
</div>

<div class=" mx-10 mt-5">
  {{ $pendaftaran->links() }}

</div>


@endsection
<div
    class="w-[360px] flex flex-col items-center pt-10 bg-gradient-to-b from-[#1c2433] to-[#758fa1] rounded-tr-lg rounded-bl-lg text-white flex-shrink-0">
    <img src="./img/logo1.png" class="w-[118px] h-[118px] mb-6">
    <h1 class="text-xl font-bold">SISTEM PENDATAAN</h1>
    <h1 class="text-xl font-bold mb-20">KERJA SAMA</h1>

    {{-- MENU --}}
    <ul class="w-full mb-24">
        <li>
            <a href="/dashboardAdmin"
                class="{{ request()->is('dashboardAdmin') ? 'bg-[#3a536d] text-white border border-gray-700' : 'text-white hover:bg-[#3a536d]/70' }} flex items-center px-5 h-[60px] font-bold">
                <img src="./img/dashboard.png" class="w-8 h-8 mr-4">
                Dashboard
            </a>
        </li>

        <li>
            <details class="group">
                <summary
                    class="list-none cursor-pointer flex items-center px-5 h-[60px] font-bold text-white
            hover:bg-[#3a536d]/70
            {{ request()->is('managementData*') ? 'bg-[#3a536d] border border-gray-700' : '' }}">

                    <img src="./img/management data.png" class="w-8 h-8 mr-4">
                    Management Data
                </summary>

                <!-- SUB MENU -->
                <ul class="bg-[#2f435c]">
                    <li>
                        <a href="/pengajuan"
                            class="block px-16 py-3 text-sm
                    {{ request()->is('managementData/pengajuan') ? 'bg-[#3a536d] font-semibold' : 'hover:bg-[#3a536d]/70' }}">
                            Pengajuan
                        </a>
                    </li>

                    <li>
                        <a href="/data"
                            class="block px-16 py-3 text-sm
                    {{ request()->is('managementData/data') ? 'bg-[#3a536d] font-semibold' : 'hover:bg-[#3a536d]/70' }}">
                            Data
                        </a>
                    </li>
                </ul>
            </details>
        </li>

        <li>
            <a href="/informationAdmin"
                class="{{ request()->is('informationAdmin') ? 'bg-[#3a536d] text-white border border-gray-700' : 'text-white hover:bg-[#3a536d]/70' }} flex items-center px-5 h-[60px] font-bold">
                <img src="./img/info.png" class="w-8 h-8 mr-4">
                Information
            </a>
        </li>
    </ul>

    {{-- LOGOUT --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
            class="flex items-center justify-center gap-2 w-[237px] h-[50px] rounded-lg bg-[#263650]/60 hover:bg-[#4b6083]/60">
            <img src="./img/logout.png" class="w-9 h-9">
            Logout
        </button>
    </form>
</div>

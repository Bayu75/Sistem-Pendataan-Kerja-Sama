<header class="fixed top-0 w-full z-50 bg-gray-300 px-12 py-4 flex justify-between items-center shadow-md">
    <div class="flex items-center gap-4">
        <img src="../img/logo.png" alt="Logo" class="w-12   ">
        <div class="leading-tight font-bold text-gray-800">
            <h3>PENDATAAN</h3>
            <h3>KERJA SAMA</h3>
        </div>
    </div>

    <nav class="hidden md:block">
        <ul class="flex text-sm font-medium text-gray-700">
            <li><a class="{{ request()->is('homePage') ? 'bg-[#000000]/25 text-black' : 'text-black hover:bg-[#000000]/25'}} px-9 py-8" href="/homePage">Beranda</a></li>
            <li><a class="{{ request()->is('jabatan') ? 'bg-[#000000]/25 text-black' : 'text-black hover:bg-[#000000]/25'}} px-9 py-8" href="/jabatan">Jabatan</a></li>
            <li><a class="{{ request()->is('templateSurat') ? 'bg-[#000000]/25 text-black' : 'text-black hover:bg-[#000000]/25'}} px-9 py-8" href="/templateSurat">Template Surat</a></li>
            <li><a class="{{ request()->is('mitra') ? 'bg-[#000000]/25 text-black' : 'text-black hover:bg-[#000000]/25'}} px-9 py-8" href="/mitra">Mitra</a></li>
            <li><a class="{{ request()->is('informasi') ? 'bg-[#000000]/25 text-black' : 'text-black hover:bg-[#000000]/25'}} px-9 py-8" href="/informasi">Informasi</a></li>

        </ul>
    </nav>
</header>
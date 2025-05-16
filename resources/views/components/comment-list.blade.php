@php
    $allComments = collect([
        ['name' => 'Andi', 'message' => 'Selamat menempuh hidup baru!', 'created_at' => now()->subMinutes(10)],
        ['name' => 'Budi', 'message' => 'Semoga jadi keluarga sakinah mawaddah warahmah.', 'created_at' => now()->subMinutes(9)],
        ['name' => 'Citra', 'message' => 'Barakallah! Lancar sampai hari H.', 'created_at' => now()->subMinutes(8)],
        ['name' => 'Dewi', 'message' => 'Akhirnya nikah juga! Happy for you!', 'created_at' => now()->subMinutes(7)],
        ['name' => 'Eko', 'message' => 'Semoga bahagia selalu.', 'created_at' => now()->subMinutes(6)],
        ['name' => 'Fira', 'message' => 'Langgeng sampai jannah yaa.', 'created_at' => now()->subMinutes(5)],
        ['name' => 'Gina', 'message' => 'Doa terbaik untuk kalian berdua.', 'created_at' => now()->subMinutes(4)],
        ['name' => 'Hadi', 'message' => 'Congrats ya! Jangan lupa undangannya!', 'created_at' => now()->subMinutes(3)],
    ]);

    $perPage = 4;
    $page = request('page', 1);
    $comments = $allComments->slice(($page - 1) * $perPage, $perPage);
    $totalPages = ceil($allComments->count() / $perPage);
@endphp

<ul aria-label="list komentar" class="custom-scrollbar space-y-4 max-h-64 overflow-y-auto px-2">
    @forelse ($comments as $comment)
        <li class="bg-black bg-opacity-90 p-4 rounded-lg shadow border border-gold">
            <p class="text-sm font-bold text-gold">{{ $comment['name'] }}</p>
            <p class="text-gold">{{ $comment['message'] }}</p>
            <p class="text-xs text-gold text-right mt-1">
                {{ \Carbon\Carbon::parse($comment['created_at'])->format('d M Y H:i') }}
            </p>
        </li>
    @empty
        <li class="text-center text-gold">Belum ada ucapan.</li>
    @endforelse
</ul>

<hr class="border-t border-gold mt-6">

<div class="flex justify-center items-center gap-4 mt-4">
    <button
        id="prev-btn"
        class="px-4 py-2 border rounded-md flex items-center gap-1 {{ $page <= 1 ? 'bg-black text-gold cursor-not-allowed' : 'hover:bg-gold hover:text-black text-gold border-gold' }}"
        {{ $page <= 1 ? 'disabled' : '' }}
        onclick="loadPage({{ $page - 1 }})"
    >
        <i class="bx bxs-left-arrow-circle"></i> prev
    </button>

    <span id="page-indicator" class="font-semibold text-gold">Halaman {{ $page }} dari {{ $totalPages }}</span>

    <button
        id="next-btn"
        class="px-4 py-2 border rounded-md flex items-center gap-1 {{ $page >= $totalPages ? 'bg-black text-gray-500 cursor-not-allowed' : 'hover:bg-gold hover:text-black text-gold border-gold' }}"
        {{ $page >= $totalPages ? 'disabled' : '' }}
        onclick="loadPage({{ $page + 1 }})"
    >
        next <i class="bx bxs-right-arrow-circle"></i>
    </button>
</div>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<style>
  /* Untuk browser berbasis WebKit (Chrome, Edge, Safari) */
.custom-scrollbar::-webkit-scrollbar {
    width: 8px;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background-color: #FFD700; /* gold */
    border-radius: 8px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: transparent;
}

/* Firefox */
.custom-scrollbar {
    scrollbar-width: thin;
    scrollbar-color: #FFD700 transparent;
}

</style>

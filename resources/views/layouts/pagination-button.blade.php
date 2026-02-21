@props(['page' => 1])

<div class="px-6 py-4 bg-gray-50 dark:bg-gray-700/30 border-t border-gray-200 dark:border-gray-700 flex items-center justify-between">
    <div class="flex space-x-2 ml-auto">
        @if ($page > 1)
            <a href="{{ request()->fullUrlWithQuery(['page' => $page - 1]) }}" class="px-3 py-1 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-50 transition"><i class="ph-bold ph-arrow-left"></i> Prev</a>
        @endif
        @if ($lastPage > 20)
            <a href="{{ request()->fullUrlWithQuery(['page' => $page + 1]) }}" class="px-3 py-1 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-50 transition">Next <i class="ph-bold ph-arrow-right"></i></a>
        @endif
        @if ($page <= 1 && $lastPage < 20)
            <p class="rounded border border-gray-300 bg-white px-3 py-1 text-sm text-gray-600 transition dark:border-gray-600 dark:bg-gray-800 cursor-not-allowed"><i class="ph-bold ph-arrow-left"></i> Prev</p>

            <p class="rounded border border-gray-300 bg-white px-3 py-1 text-sm text-gray-600 transition dark:border-gray-600 dark:bg-gray-800 cursor-not-allowed">Next <i class="ph-bold ph-arrow-right"></i></p>
        @endif
    </div>
</div>

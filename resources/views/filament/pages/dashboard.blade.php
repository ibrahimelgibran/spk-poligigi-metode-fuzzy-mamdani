<x-filament::page>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        {{-- Total Alat Kesehatan --}}
        <div class="flex items-center space-x-5 p-4 bg-white rounded-xl shadow-sm">
            <x-icon name="heroicon-o-document-text" class="w-10 h-10 text-gray-700" />
            <div>
                <div class="text-sm font-semibold text-gray-700">Total</div>
                <div class="text-lg font-bold text-gray-700">Alat Kesehatan</div>
            </div>
        </div>

        {{-- Total Supplier --}}
        <div class="flex items-center space-x-5 p-4 bg-white rounded-xl shadow-sm">
            <x-icon name="heroicon-o-truck" class="w-10 h-10 text-gray-700" />
            <div>
                <div class="text-sm font-semibold text-gray-700">Total</div>
                <div class="text-lg font-bold text-gray-700">Supplier</div>
            </div>
        </div>

        {{-- Total Penilaian --}}
        <div class="flex items-center space-x-5 p-4 bg-white rounded-xl shadow-sm">
            <x-icon name="heroicon-o-clipboard-document-check" class="w-10 h-10 text-gray-700" />
            <div>
                <div class="text-sm font-semibold text-gray-700">Total</div>
                <div class="text-lg font-bold text-gray-700">Penilaian</div>
            </div>
        </div>
    </div>
</x-filament::page>

<div>
    <label class="mb-1 block text-sm font-medium text-gray-700">Nama Kategori</label>
    <input name="name" value="{{ old('name', $newsCategory->name ?? '') }}" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">
    @error('name')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
</div>
<div>
    <label class="mb-1 block text-sm font-medium text-gray-700">Warna Label</label>
    <input type="color" name="color" value="{{ old('color', $newsCategory->color ?? '#1D401F') }}" class="h-11 w-24 rounded-xl border border-gray-300 p-1">
    @error('color')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
</div>

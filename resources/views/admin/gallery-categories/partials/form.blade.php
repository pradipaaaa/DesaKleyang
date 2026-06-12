<div>
    <label class="mb-1 block text-sm font-medium text-gray-700">Nama Kategori</label>
    <input name="name" value="{{ old('name', $galleryCategory->name ?? '') }}" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">
    @error('name')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
</div>

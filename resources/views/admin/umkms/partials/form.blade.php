<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label class="mb-1 block text-sm font-medium text-gray-700">Nama UMKM</label>
        <input name="name" value="{{ old('name', $umkm->name ?? '') }}" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">
        @error('name')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-gray-700">Pemilik</label>
        <input name="owner" value="{{ old('owner', $umkm->owner ?? '') }}" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">
        @error('owner')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-gray-700">Produk</label>
        <input name="product" value="{{ old('product', $umkm->product ?? '') }}" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">
        @error('product')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-gray-700">WhatsApp</label>
        <input name="whatsapp" value="{{ old('whatsapp', $umkm->whatsapp ?? '') }}" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">
    </div>
    <div class="md:col-span-2">
        <label class="mb-1 block text-sm font-medium text-gray-700">Alamat</label>
        <input name="address" value="{{ old('address', $umkm->address ?? '') }}" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">
    </div>
    @if($umkm?->photo)
        <img src="{{ Storage::url($umkm->photo) }}" alt="{{ $umkm->name }}" class="h-48 w-full rounded-xl object-cover md:col-span-2">
    @endif
    <div class="md:col-span-2">
        <label class="mb-1 block text-sm font-medium text-gray-700">Foto</label>
        <input type="file" name="photo" accept="image/*" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">
    </div>
    <div class="md:col-span-2">
        <label class="mb-1 block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea name="description" rows="4" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">{{ old('description', $umkm->description ?? '') }}</textarea>
    </div>
    <label class="flex items-center gap-3 text-sm text-gray-700 md:col-span-2">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $umkm->is_active ?? true)) class="rounded border-gray-300 text-green-600">
        Tampilkan di website
    </label>
</div>

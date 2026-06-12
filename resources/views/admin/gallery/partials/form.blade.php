<div class="grid gap-5">
    <div>
        <label class="mb-1 block text-sm font-medium text-gray-700">Judul</label>
        <input name="title" value="{{ old('title', $gallery->title ?? '') }}" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">
        @error('title')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-gray-700">Kategori</label>
        <select name="gallery_category_id" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('gallery_category_id', $gallery->gallery_category_id ?? '') == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    @if($gallery?->image)
        <img src="{{ Storage::url($gallery->image) }}" alt="{{ $gallery->title }}" class="h-48 w-full rounded-xl object-cover">
    @endif
    <div>
        <label class="mb-1 block text-sm font-medium text-gray-700">Gambar</label>
        <input type="file" name="image" accept="image/*" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">
        @error('image')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea name="description" rows="4" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">{{ old('description', $gallery->description ?? '') }}</textarea>
    </div>
    <label class="flex items-center gap-3 text-sm text-gray-700">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $gallery->is_active ?? true)) class="rounded border-gray-300 text-green-600">
        Tampilkan di website
    </label>
</div>

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'features' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        // Обработка главного изображения
        $imagePath = $this->uploadImage($request->file('image'), 'products/main');

        // Обработка галереи
        $galleryPaths = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryImage) {
                $galleryPaths[] = $this->uploadImage($galleryImage, 'products/gallery');
            }
        }

        // Обработка характеристик
        $features = [];
        if ($request->features) {
            try {
                $features = json_decode($request->features, true);
            } catch (\Exception $e) {
                $features = [];
            }
        }

        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category' => $request->category,
            'image' => $imagePath,
            'gallery' => $galleryPaths,
            'features' => $features,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Товар успешно создан!');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'features' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category' => $request->category,
            'is_active' => $request->has('is_active'),
        ];

        // Обновление slug если изменилось имя
        if ($product->name !== $request->name) {
            $data['slug'] = Str::slug($request->name);
        }

        // Обновление главного изображения
        if ($request->hasFile('image')) {
            // Удаляем старое изображение
            if ($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }
            $data['image'] = $this->uploadImage($request->file('image'), 'products/main');
        }

        // Обновление галереи
        if ($request->hasFile('gallery')) {
            // Удаляем старые изображения галереи
            if ($product->gallery) {
                foreach ($product->gallery as $oldImage) {
                    if (Storage::exists($oldImage)) {
                        Storage::delete($oldImage);
                    }
                }
            }

            $galleryPaths = [];
            foreach ($request->file('gallery') as $galleryImage) {
                $galleryPaths[] = $this->uploadImage($galleryImage, 'products/gallery');
            }
            $data['gallery'] = $galleryPaths;
        }

        // Обновление характеристик
        if ($request->features) {
            try {
                $data['features'] = json_decode($request->features, true);
            } catch (\Exception $e) {
                // Если JSON невалидный, оставляем старые характеристики
            }
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Товар успешно обновлен!');
    }

    /**
     * Загрузка изображения
     */
    private function uploadImage($image, $folder)
    {
        $fileName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
        return $image->storeAs($folder, $fileName, 'public');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')
            ->with('success', 'Товар успешно удален!');
    }
}

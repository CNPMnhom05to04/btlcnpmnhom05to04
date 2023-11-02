<?php
namespace App\Traits;

use App\Models\ProductModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait ImageUploadTrait
{
    public function handleUploadImage($request, $fieldName, $foderName): ?string
    {
        if ($request->hasFile($fieldName)) {
            $image = $request->file($fieldName);
            $imageName = Str::random(10) . "_" . $image->getClientOriginalName();
            $path = $request->file($fieldName)->storeAs('public/' . $foderName, $imageName);
            $dataPath = Storage::url($path);
            return $dataPath;
        }
        return null;
    }

    public function handleUploadImageProduct($request, $fieldName, $foderName): array
    {
        $dataPath = [];
        if ($request->hasFile($fieldName)) {
            foreach ($request->$fieldName as $item) {
                $imageName = Str::random(10) . "_" . $item->getClientOriginalName();
                $path = $item->storeAs('public/' . $foderName, $imageName);

                $dataPath[$imageName] = Storage::url($path);
            }
        }
        return $dataPath;
    }

    public function handleUploadImageLogo($request, $fieldName, $folderName): ?string
    {
        if ($request->hasFile($fieldName)) {
            $image = $request->file($fieldName);
            $imageName = Str::random(10) . "_" . $image->getClientOriginalName();
            $path = $request->file($fieldName)->storeAs('public/' . $folderName, $imageName);

            $imagePath = storage_path("app/{$path}");
            $temporaryImage = Image::make($imagePath);
            $temporaryImage->fit(80, 80, function ($constraint) {
                $constraint->upsize();
            });
            $temporaryImage->save($imagePath);
            $dataPath = Storage::url($path);
            return $dataPath;
        }

        return null;
    }
}

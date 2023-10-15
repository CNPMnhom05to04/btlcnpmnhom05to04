<?php
namespace App\Traits;

use App\Models\ProductModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
}

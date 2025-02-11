<?php
declare(strict_types=1); // 型チェック

use Faker\Guesser\Name;

namespace App\Models\ImageUpload;

use Illuminate\Support\Facades\Storage;

class LocalImageManager implements ImageManagerInterface
{
    // 保存
    public function save($file): string
    {
        $path = (string) Storage::putFile('public/images', $file);
        $array = (array) explode("/", $path);
        return end($array);
    }
    // 削除
    public function delete(string $name): void
    {
        $filePath = 'public/images/' . $name;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
    }
}

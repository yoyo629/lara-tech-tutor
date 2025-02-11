<?php
declare(strict_types=1);

namespace App\Modules\ImageUpload;

interface ImageManagerInterface
{
    /**
     * @param \Illuminate\Http\File|\Illuminate\Http\UploadedFile|string $file
     * @return string
     */
    public function save($file): string;
    //保存

    public function delete(string $name): void;
    //削除
}

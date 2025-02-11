<?php
declare(strict_types=1);

namespace App\Modules\ImageUpload;

use Cloudinary\Cloudinary;
use Illuminate\Contracts\Filesystem\Cloud;

/**
 * Cloudinayライブラリを使用して画像アップロード・削除
 */
class CloudinaryImageManager implements ImageManagerInterface
{
    public function __construct(private Cloudinary $cloudinary)
    {
    }

    /**
     * @throws \Cloudinary\Api\Exception\ApiError
     */
    public function save($file): string
    {
        return $this->cloudinary
            ->uploadApi()
            ->upload(is_string($file) ? $file : $file->getRealPath())['public_id'];
    }

    /**
     * @throws \Cloudinary\Api\Exception\ApiError
     */
    public function delete(string $name): void
    {
        $this->cloudinary->uploadApi()->destroy($name);
    }
}

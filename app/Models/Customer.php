<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Customer extends Model
{
    use HasFactory;

    public static string $disk = 'public';


    protected $fillable = [
        'name', 'phone', 'email', 'note', 'image_path', 'birthday'
    ];


    public static function uploadCoverImage($file)
    {
        $path = $file->store('/covers', [
            'disk' => static::$disk,
        ]);
        return $path;
    }
    public static function deleteCoverImage($path)
    {
        if ($path) {
            return Storage::disk(Customer::$disk)->delete($path);
        }
    }
}

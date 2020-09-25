<?php 

namespace App\Traits;

trait InteractWithFiles
{
    /**
     * Store all request file with unique name
     * 
     * @param  array $fields
     * @param  array  $path
     * @return array
     */
    public function storeFiles($fields, $path = [])
    {
        $path['image'] = isset($path['image']) ? $path['image'] : 'uploads/images';
        $path['file'] = isset($path['file']) ? $path['file'] : 'uploads/files';

        foreach ($fields as $key => $file) {
            if (! request()->hasFile($key)) continue;

            $fileName = $file->hashName();
            $fields[$key] = $fileName;

            if ($this->isImage($file)) {
                // logic for image files
                $file->move(public_path($path['image']), $fileName);
            } else {
                // logic for other files
                $file->move(public_path($path['file']), $fileName);
            }
        }

        return $fields;
    }

    /**
     * Check the file type is image
     * 
     * @param  object $file
     * @return boolean
     */
    public function isImage($file)
    {
        return (bool) $file->getMimeType() == 'image/png' || $file->getMimeType() == 'image/jpeg';
    }
}

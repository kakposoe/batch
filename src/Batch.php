<?php namespace Batch;

use Batch\FS;
use Spatie\Image\Image;
use League\CLImate\CLImate;

class Batch {

    protected $c;

    public function __construct()
    {
        $this->c = new CLImate;
    }

    public function total() {
        $total = 0;
        foreach (new \DirectoryIterator(getcwd()) as $file) {
            if ($file->isFile() && $file->getExtension() == 'jpg') {
                $total++;
            }
        }

        return $total;
    }

    public function createLowRes($image, $folder, $count, $stats)
    {

        if ($stats) {
            $file_before = FS::convert($image);
            list($old_width, $old_height) = getimagesize($image);
        }

        $file_name = substr(strrchr($image, '/'), 1);

        Image::load($image)
            ->width(1000)
            ->quality(20)
            ->optimize()
            ->save($folder . 'i-' . $count . '.jpg');

        if ($stats) {
            $file_after = FS::convert($folder . 'i-' . $count . '.jpg');
            list($new_width, $new_height) = getimagesize($folder . 'i-' . $count . '.jpg');

            $memory = '[' . $file_before . '/' . $file_after . ']';
            $size = '[' . $old_width . 'x' . $old_height . ' -> ' . $new_width . 'x' .  $new_height . ']';
            $stats = $memory . ' ' . $size;
        }

        $this->c->out('<green>New Image: </green>' . $file_name . ' <yellow>-></yellow> ' . $folder . 'i-' . $count . '.jpg ' . $stats );
    }

    public function lowres($folder, $stats = false)
    {
        $i = 1;
        foreach (new \DirectoryIterator(getcwd()) as $file) {
            if ($file->isFile() && $file->getExtension() == 'jpg') {
                $this->createLowRes(getcwd() . '/' . $file, $folder, ($i++), $stats);
            }
        }

        $this->c->br()->backgroundGreenBlack(' Low Res Images Created (' . ($i - 1) . ') ')->br();
    }

    public function createThumbnail($image, $count, $stats = false)
    {

        global $folder;

        $new_name = 't-' . $count . '.jpg';

        $file_name = 'i-' . $count . '.jpg';

        if ($stats) {
            $file_before = FS::convert($image);
            list($old_width, $old_height) = getimagesize($image);
        }

        Image::load($image)
            ->width(320)
            ->quality(50)
            ->optimize()
            ->save(getcwd() . '/' . $folder . 'thumbs/' . $new_name);

        if ($stats) {
            list($new_width, $new_height) = getimagesize(getcwd() . '/' . $folder . 'thumbs/' . $new_name);
            $file_after = FS::convert($folder . 'i-' . $count . '.jpg');

            $size = '[' . $old_width . 'x' . $old_height . ' -> ' . $new_width . 'x' .  $new_height . ']';
            $memory = '[' . $file_before . '/' . $file_after . ']';
            $stats = $memory . ' ' . $size;
        }

        $this->c->out('<green>New Image: </green>' . $folder . $file_name . ' <yellow>-></yellow> ' . $folder . 'thumbs/' . $new_name . ' ' . $stats);
        /* $this->c */
        /*     ->green('New Image: ') */
        /*     ->out($folder . $file_name) */
        /*     ->yellow(' -> ') */
        /*     ->out($folder . 'thumbs/' . $new_name . ' ' . $stats); */
    }

    public function thumbnails($folder, $stats)
    {
        $i = 1;

        foreach (new \DirectoryIterator(getcwd()) as $file) {
            if ($file->isFile() && $file->getExtension() == 'jpg') {
                $this->createThumbnail(getcwd() . '/' . $folder . 'i-' . $i . '.jpg', $i, $stats);
                $i++;
            }
        }

        $this->c
            ->br()
            ->backgroundGreenBlack(' Thumbnails Created (' . ($i - 1) . ') ')
            ->br();
    }
}

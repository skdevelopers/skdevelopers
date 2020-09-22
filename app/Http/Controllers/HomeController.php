<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function Image()
    {
        $artwork = getcwd().'/'."artwork.jpg";
        $l_print_area = getcwd().'/'.'left_clip.png';
        $l_side = getcwd().'/'.'left_sneaker.png';
        // right artwork
        // create an image manager instance with favored driver
    $left_base = new \Imagick();
    $left_base->readImageBlob($store->get($artwork));
    //$img = new \Imagick(public_path("images/original/{$hero->filename}"));
    // $image = $manager->make('public/foo.jpg')->resize(300, 200);
    //$left_base = new Imagick($artwork);  //// design image
    $left_base->setImageFormat("png");
    if ($left_base->getImageColorspace() == \Imagick::COLORSPACE_CMYK) {
        $left_base->transformimagecolorspace(\Imagick::COLORSPACE_SRGB);
    }
    $left_base->rotateImage('none', 90);


//// right image resize and rotation
    $left_print_area= new Imagick($l_print_area);  //// print-ng area mask
    $left_print_area->resizeImage(1197, 500, Imagick::FILTER_LANCZOS, 1);
    $left_print_area->rotateImage('none', 22);
    $left_side = new Imagick($l_side); /// shoe image
    $left_side->resizeImage(1197, 500, Imagick::FILTER_LANCZOS, 1);


/// cut print area right
    if ($left_base->getImageMatte()) {
        $left_base->compositeImage($left_print_area, Imagick::COMPOSITE_DSTIN, 0, 205, Imagick::CHANNEL_ALPHA);
    } else {
        $left_base->compositeImage($left_print_area, Imagick::COMPOSITE_COPYOPACITY, 0, 201);
    }

// Copy opacity mask right
    $left_base->compositeImage($left_print_area, Imagick::COMPOSITE_DSTIN, 0, 201, Imagick::CHANNEL_ALPHA);
    $left_base->rotateImage('none', -22);


// Add overlay
    $left_base->compositeImage($left_side, Imagick::COMPOSITE_DEFAULT, 252, 566);
    $left_base->resizeImage(1100, 1000, Imagick::FILTER_LANCZOS, 1);

    header('Content-Type: image/jpg');
    echo $left_base;
    die;
        return view('home');
    }
}

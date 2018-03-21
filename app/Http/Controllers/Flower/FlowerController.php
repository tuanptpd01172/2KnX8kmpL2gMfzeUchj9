<?php
namespace App\Http\Controllers\Flower;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Flower\FlowerInterface;

class FlowerController extends Controller
{
    protected $flower;

    public function __construct(FlowerInterface $FlowerInterface)
    {
    	$this->flower = $FlowerInterface;
    }
    public function index()
    {
    	return $this->flower->home();
    }
}

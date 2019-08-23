<?php
namespace App\Parser;

use Symfony\Component\DomCrawler\Crawler;
//use App\ProductUser;

use Auth;
use App\Category;
class Onliner implements ParseContract
{
    private $url='';
    private $crawler;

    public function __construct()
    {
       $file =file_get_contents('https://catalog.onliner.by');
       $this->crawler=new Crawler($file);
    }

    public function getParse($country="Belarus")
    {
    }

    /**
     * @return mixed
     */
    public function catalog ()
    {
        $arr=[];
        echo 'test';
        $this->crawler->filter('.catalog-navigation-list__dropdown-item')->each(function (Crawler $node,$i){
            $text=$node->filter('.catalog-navigation-list__dropdown-title')->text();
            $url_str = $node->attr('href');
            $url_arr = explode('/', $url_str);
            $cat=Category::where('slug',end($url_arr))->first();
            echo $text.' - '.end($url_arr);
            if(!$cat){
                echo '<b> new </b>';
                $obj=new Category;
                $obj->name=$text;
                $obj->slug=end($url_arr);
                $obj->order='1';
                $obj->save();
            }

            echo '<br/>';
        });
    }
}
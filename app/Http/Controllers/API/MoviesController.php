<?php

namespace App\Http\Controllers\API;

use GuzzleHttp\Client;
use App\Events\SearchEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;

class MoviesController extends Controller
{

    //
    // ──────────────────────────────────────── I ──────────
    //
    //   MoviesController 
    //   functions to get Data from YTS api 
    //   
    // ──────────────────────────────────────────────────
    //



    //const BASE_URL = 'https://yts.ag';




    public function test()
    {
        $page = 1;
        $baseUrl = 'app/movies.json';
        $parameters = '?limit=' . $limit = 24 . '&page=' . $page . '&quality=' . $quality = 'All' . '&minimum_rating=' . $minimum_rating = 0 . '&genre=' . $genre = '' . '&sort_by=' . $sort_by = 'year' . '&order_by=' . $order_by = 'desc';
        $data = $this->getFromApi($baseUrl . $parameters);
        $jsonData = json_decode($data, true);
        $key = 'data';
        return $jsonData[$key];
    }




    /**
     * index function to return the movies view
     */

    public function index()
    {
        return redirect('/movies');
    }


    /**
     * 
     * listMovies function takes $page as a parameter (default = 1) and returns 24 movies
     * from the YTS api as a JSON format 
     * 
     */


    public function searchMovie($id)
    {
            $baseUrl = 'app/movies.json';
            $array = $this->getFromApi($baseUrl);
            $data = [];
            foreach ($array["movies"] as $val) {
                if ($val['id']== $id){
                    $data = $val;
                }
            }
        return  $data;
    }
    public function listMovies()
    {
            $baseUrl = 'app/movies.json';
            $data = $this->getFromApi($baseUrl);
        return  $data;
    }

    public function listPopularMovies($page)
    {
        $baseUrl = 'app/movies.json';
        $sort_by = 'download_count';
        $parameters = '?limit=' . $limit = 24 . '&page=' . $page . '&quality=' . $quality = 'All' . '&minimum_rating=' . $minimum_rating = 0 . '&genre=' . $genre = '' . '&sort_by=' . $sort_by . '&order_by=' . $order_by = 'desc';
        $data = $this->getFromApi($baseUrl . $parameters);
        return $data;
    }




    /**
     * 
     * movieDetail function takes $movie_id and $with_image,$with_cast are true by default 
     * the function takes the movie ID and returns details about the spicific movie
     * using YTS api in a JSON format
     * 
     */

    public function movieDetail($id, $with_images = true, $with_cast = true)
    {
        $baseUrl = 'app/movies.json';
        // $parameters = '?id=' . $movie_id . '&with_images' . $with_images . '&with_cast=' . $with_cast;
        $data = $this->getFromApi($baseUrl);
        return  $data;
    }

    /**
     * 
     * movieSuggestions function takes $movie_id as a parameter and returens
     * 4 movies in a JSON format
     * 
     */

    public function movieSuggestions($id)
    {

        $baseUrl = 'app/movies.json';
        $datas = $this->getFromApi($baseUrl);
        foreach ($datas as $data) {
            if ($data["id"] == $id) {
                $data = $data;
                //  dd($movie);
            }
        }
        return $data;
    }


    /**
     * 
     * getFromApi function takes $url as a parameter and returns the data in a json format 
     * this function uses Guzzle library
     * 
     */

    private function getFromApi($url)
    {
        // $path =  storage_path('app\movies.json');
        $path =  storage_path($url);
        $res = json_decode(file_get_contents($path), true);

        return $res;
    }
}

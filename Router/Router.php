<?php
class router{

    private $routs = [];

    public function add($method = null,$uri,$controller){

        $this->routs[] = [
            'uri'=>$uri,
            'controller'=>$controller,
            'method'=>$method
        ];

        return $this;

    }

    public function get($uri,$controller) {

        $this->add('GET',$uri,$controller);

    }

    public function post($uri,$controller){

        $this->add('POST',$uri,$controller);

    }

    public function route($uri,$method){



        foreach($this->routs as $route){
            if($route['uri'] === $uri && strtoupper($route['method'])){

                return require BASE_PATH. ($route['controller']);
              
            }
        }

       }


}

?>